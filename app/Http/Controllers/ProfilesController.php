<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Logic\User\UserRepository;
use App\Models\Profile;
use App\Models\User;

use Validator;
use Input;
use Image;
use File;

class ProfilesController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | User Profiles Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders the "View Profile" and "Edit Profile" pages.
    |
    */

    protected $auth;
    protected $userRepository;

    // RUN VIEW THROUGH AUTH MIDDLWARE via the CONSTRUCTOR
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function profile_validator(array $data)
    {
        return Validator::make($data, [
            'location'          => '',
            'bio'               => '',
            'twitter_username'  => '',
            'github_username'   => '',
            'user_profile_bg'   => ''
        ]);
    }

    /**
     * /username
     *
     * @param $username
     * @return Response
     */
    public function show($username)
    {
        try {
            $user = $this->getUserByUsername($username);
            //dd($user->toArray());
        } catch (ModelNotFoundException $e) {
            return view('pages.status')
                ->with('error',\Lang::get('profile.notYourProfile'))
                ->with('error_title',\Lang::get('profile.notYourProfileTitle'));
        }
        return view('profiles.show')->withUser($user);
    }

    /**
     * Fetch user
     * (You can extract this to repository method)
     *
     * @param $username
     * @return mixed
     */
    public function getUserByUsername($username)
    {
        return User::with('profile')->wherename($username)->firstOrFail();
    }

    /**
     * /profiles/username/edit
     *
     * @param $username
     * @return mixed
     */
    public function edit($username)
    {
        try {
            $user = $this->getUserByUsername($username);
        } catch (ModelNotFoundException $e) {
            return view('pages.status')
                ->with('error',\Lang::get('profile.notYourProfile'))
                ->with('error_title',\Lang::get('profile.notYourProfileTitle'));
        }
        return view('profiles.edit')->withUser($user);
    }

    public function getProfileBGImage(){

        //return Storage::get($this->id.'/'.$this->id.'.jpeg');

        //return Storage::get('zimages/v1.png');

        return Image::make(storage_path('/zimages/'.$filename))->response();

    }

    /**
     * Update a user's profile
     *
     * @param $username
     * @return mixed
     * @throws Laracasts\Validation\FormValidationException
     */
    public function update($username, Request $request)
    {
        $user = $this->getUserByUsername($username);
        $input = Input::only('location', 'bio', 'twitter_username', 'github_username');
        $profile_validator = $this->profile_validator($request->all());

        if ($profile_validator->fails()) {

            $this->throwValidationException(
                $request, $profile_validator
            );
            return redirect('profile/'.$user->name.'/edit')->withErrors($validator)->withInput();
        }

        // CHECK IF PROFILE EXISTS JUST IN CASE
        if ($user->profile == null) {

            $profile = new Profile;
            $profile->fill($input);
            $user->profile()->save($profile);

        } else {
            $user->profile->fill($input)->save();
        }

        // CHECK FOR USER BACKGROUND IMAGE FILE UPLOAD
        if(Input::file('user_profile_bg') != NULL){

            $user_profile_bg    = Input::file('user_profile_bg');
            $filename           = 'user-background.' . $user_profile_bg->getClientOriginalExtension();
            $save_path          = storage_path() . '/users/id/' . $user->id . '/uploads/images/profile-backgrounds/';

            // MAKE USER FOLDER AND UPDATE PERMISSIONS
            File::makeDirectory($save_path, $mode = 0755, true, true);

            // SAVE FILE TO SERVER
            Image::make($user_profile_bg)->resize(900, 300)->save($save_path . $filename);

            // SAVE ROUTED PATH TO IMAGE TO DATABASE
            $user->profile->user_profile_bg = '/images/profile/' . $user->id . '/backgrounds/' . $filename;
            $user->profile->save();
        }

        return redirect('profile/'.$user->name.'/edit')->with('status', 'Profile updated!');

    }

    // FUNCTON TO RETURN USER PROFILE BACKGROUND IMAGE
    public function userProfileBackgroundImage($id, $image)
    {
        return Image::make(storage_path() . '/users/id/' . $id . '/uploads/images/profile-backgrounds/' . $image)->response();
    }

}

