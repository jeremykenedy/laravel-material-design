<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Activation;
use App\Models\Profile;
use App\Traits\ActivationTrait;
use App\Traits\CaptureIpTrait;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use jeremykenedy\LaravelRoles\Models\Role;

class ActivateController extends Controller
{
    use ActivationTrait;

    private static $userHomeRoute = 'public.home';
    private static $adminHomeRoute = 'public.home';
    private static $activationView = 'auth.activation';
    private static $activationRoute = 'activation-required';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public static function getUserHomeRoute()
    {
        return self::$userHomeRoute;
    }

    public static function getAdminHomeRoute()
    {
        return self::$adminHomeRoute;
    }

    public static function getActivationView()
    {
        return self::$activationView;
    }

    public static function getActivationRoute()
    {
        return self::$activationRoute;
    }

    public static function activeRedirect($user, $currentRoute)
    {
        if ($user->activated) {
            Log::info('Activated user attempted to visit '.$currentRoute.'. ', [$user]);

            if ($user->isAdmin()) {
                return redirect()->route(self::getAdminHomeRoute())
                ->with('status', 'info')
                ->with('message', trans('auth.alreadyActivated'));
            }

            return redirect()->route(self::getUserHomeRoute())
                ->with('status', 'info')
                ->with('message', trans('auth.alreadyActivated'));
        }

        return false;
    }

    public function initial()
    {
        $user = Auth::user();
        $lastActivation = Activation::where('user_id', $user->id)->get()->last();
        $currentRoute = Route::currentRouteName();

        $rCheck = $this->activeRedirect($user, $currentRoute);
        if ($rCheck) {
            return $rCheck;
        }

        $data = [
            'email' => $user->email,
            'date'  => $lastActivation->created_at->format('m/d/Y'),
        ];

        return view($this->getActivationView())->with($data);
    }

    public function activationRequired()
    {
        $user = Auth::user();
        $lastActivation = Activation::where('user_id', $user->id)->get()->last();
        $currentRoute = Route::currentRouteName();

        $rCheck = $this->activeRedirect($user, $currentRoute);
        if ($rCheck) {
            return $rCheck;
        }

        if ($user->activated == false) {
            $activationsCount = Activation::where('user_id', $user->id)
                ->where('created_at', '>=', Carbon::now()->subHours(config('settings.timePeriod')))
                ->count();

            if ($activationsCount > config('settings.timePeriod')) {
                Log::info('Exceded max resends in last '.config('settings.timePeriod').' hours. '.$currentRoute.'. ', [$user]);

                $data = [
                    'email' => $user->email,
                    'hours' => config('settings.timePeriod'),
                ];

                return view('auth.exceeded')->with($data);
            }
        }

        Log::info('Registered attempted to navigate while unactivate. '.$currentRoute.'. ', [$user]);

        $data = [
            'email' => $user->email,
            'date'  => $lastActivation->created_at->format('m/d/Y'), //
        ];

        return view($this->getActivationView())->with($data);
    }

    public function activate($token)
    {
        $user = Auth::user();
        $currentRoute = Route::currentRouteName();
        $ipAddress = new CaptureIpTrait();
        $role = Role::where('name', '=', 'user')->first();
        $profile = new Profile();

        $rCheck = $this->activeRedirect($user, $currentRoute);
        if ($rCheck) {
            return $rCheck;
        }

        $activation = Activation::where('token', $token)->get()
            ->where('user_id', $user->id)
            ->first();

        if (empty($activation)) {
            Log::info('Registered user attempted to activate with an invalid token: '.$currentRoute.'. ', [$user]);

            return redirect()->route(self::getActivationRoute())
                ->with('error', trans('auth.invalidToken'));
        }

        $user->activated = true;
        $user->detachAllRoles();
        $user->attachRole($role);
        $user->signup_confirmation_ip_address = $ipAddress->getClientIp();
        $user->profile()->save($profile);
        $user->save();

        $allActivations = Activation::where('user_id', $user->id)->get();
        foreach ($allActivations as $anActivation) {
            $anActivation->delete();
        }

        Log::info('Registered user successfully activated. '.$currentRoute.'. ', [$user]);

        if ($user->isAdmin()) {
            return redirect()->route(self::$getAdminHomeRoute())
            ->with('success', trans('auth.successActivated'));
        }

        return redirect()->route(self::getUserHomeRoute())
            ->with('success', trans('auth.successActivated'));
    }

    public function resend()
    {
        $user = Auth::user();
        $lastActivation = Activation::where('user_id', $user->id)->get()->last();
        $currentRoute = Route::currentRouteName();

        if ($user->activated == false) {
            $activationsCount = Activation::where('user_id', $user->id)
                ->where('created_at', '>=', Carbon::now()->subHours(config('settings.timePeriod')))
                ->count();

            if ($activationsCount >= config('settings.maxAttempts')) {
                Log::info('Exceded max resends in last '.config('settings.timePeriod').' hours. '.$currentRoute.'. ', [$user]);

                $data = [
                    'email' => $user->email,
                    'hours' => config('settings.timePeriod'),
                ];

                return view('auth.exceeded')->with($data);
            }

            $sendEmail = $this->initiateEmailActivation($user);

            Log::info('Activation resent to registered user. '.$currentRoute.'. ', [$user]);

            return redirect()->route(self::getActivationRoute())
                ->with('success', trans('auth.activationSent'));
        }

        Log::info('Activated user attempte to navigate to '.$currentRoute.'. ', [$user]);

        return $this->activeRedirect($user, $currentRoute)
            ->with('status', 'info')
            ->with('message', trans('auth.alreadyActivated'));
    }

    public function exceeded()
    {
        $user = Auth::user();
        $currentRoute = Route::currentRouteName();
        $timePeriod = config('settings.timePeriod');
        $lastActivation = Activation::where('user_id', $user->id)->get()->last();
        $activationsCount = Activation::where('user_id', $user->id)
            ->where('created_at', '>=', Carbon::now()->subHours($timePeriod))
            ->count();

        if ($activationsCount >= config('settings.maxAttempts')) {
            Log::info('Locked non-activated user attempted to visit '.$currentRoute.'. ', [$user]);

            $data = [
                'hours'     => config('settings.timePeriod'),
                'email'     => $user->email,
                'lastDate'  => $lastActivation->created_at->format('m/d/Y'),
            ];

            return view('auth.exceeded')->with($data);
        }

        return $this->activeRedirect($user, $currentRoute)
            ->with('status', 'info')
            ->with('message', trans('auth.alreadyActivated'));
    }
}
