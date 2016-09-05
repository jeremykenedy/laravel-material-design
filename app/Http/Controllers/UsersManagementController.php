<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Logic\User\UserRepository;
use App\Logic\User\CaptureIp;
use App\Models\UsersRole;
use App\Models\Profile;
use App\Http\Requests;
use App\Models\Social;
use App\Models\User;
use App\Models\Role;

use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades;
use Illuminate\Http\Request;

use Validator;
use Gravatar;
use Input;
use Image;

use File;

class UsersManagementController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Users Management Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "Show Users", "Edit Users",
	| and "Create User" pages. This class also
    | has the method to delete a user.
    |
	*/

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
     * @return void
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

	/**
	 * Show the Users Management Main Page to the Admin.
	 *
	 * @return Response
	 */
	public function showUsersMainPanel()
	{
        $user                   = \Auth::user();
        $users 			        = \DB::table('users')->get();
        $roles                  = \DB::table('role_user')->get();
        $total_users 	        = \DB::table('users')->count();

        $total_users_confirmed  = \DB::table('users')->count();
        $total_users_confirmed  = \DB::table('users')->where('active', '1')->count();
        $total_users_locked     = \DB::table('users')->where('resent', '>', 3)->count();

        $total_users_new        = \DB::table('users')->where('active', '0')->count();

        return view('admin.show-users', [
        		'user' 			          => $user,
                'users'                   => $users,
        		'total_users'             => $total_users,
                'total_users_confirmed'   => $total_users_confirmed,
                'total_users_locked'      => $total_users_locked,
                'total_users_new'         => $total_users_new,
                'roles'                   => $roles,
        	]
        );
	}

    /**
     * Get a validator for an incoming update user request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'name'          	=> 'required|max:255',
            'email'         	=> 'required|email|max:255',
            'location'          => '',
            'bio'               => '',
            'twitter_username'  => '',
            'github_username'   => ''
        ]);
    }

    /**
     * Get a validator for an incoming create user request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function create_new_validator(array $data)
    {
        return Validator::make($data, [
            'name'                  => 'required|alpha_num|min:5|max:255|unique:users',
            'email'                 => 'required|email|max:255|unique:users',
            'first_name'            => 'required|max:255',
            'last_name'             => 'required|max:255',
            'password'              => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6|same:pass',
            'user_level'            => 'required',
            'location'              => '',
            'bio'                   => '',
            'twitter_username'      => '',
            'github_username'       => ''
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        // GET THE USER
        $user               = User::find($id);
        $userRole           = $user->hasRole('user');
        $editorRole         = $user->hasRole('editor');
        $adminRole          = $user->hasRole('administrator');

        $access;

        if($userRole)
        {
            $access = 'User';
        } elseif ($editorRole) {
            $access = 'Editor';
        } elseif ($adminRole) {
            $access = 'Administrator';
        } else {
            $access = 'None';
        }

        return view('admin.edit-user', [
                'user'                      => $user,
                'access'                    => $access,
            ]
        )->with('status', 'Successfully updated user!');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $current_roles = array('3','2','1');

        $rules = array(
            'name'              => 'required',
            'email'             => 'required|email',
        );

        $validator = $this->validator($request->all(), $rules);

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        } else {
            $user 				        = User::find($id);
            $user->name                 = $request->input('name');
            $user->email                = $request->input('email');
            $user->profile->bio         = $request->input('bio');
            $input                      = Input::only('role_id');

            switch ($input['role_id']) {
                case 'User':
                    $input_role = '1';
                    break;

                case 'Editor':
                    $input_role = '2';
                    break;

                case 'Administrator':
                    $input_role = '3';
                    break;

                default:
                    $input_role = '1';
                    break;
            }

            $user->removeRole($current_roles);
            $user->assignRole($input_role);

            $profile = Profile::find($id);
            $profileInputs = Input::only(
                'location',
                'bio',
                'twitter_username',
                'github_username'
            );

            // CHECK IF PROFILE EXISTS THEN CREATE OR SAVE PROFILE
            if ($user->profile == null) {

                $profile = new Profile;
                $profile->fill($profileInputs);
                $user->profile()->save($profile);

            } else {

                $user->profile->fill($profileInputs)->save();

            }

            // SAVE USER CORE SETTINGS
            $user->save();

            // CHECK FOR USER BACKGROUND IMAGE FILE UPLOAD
            if(Input::file('user_profile_bg') != NULL){
                //$user_profile_bg = $request->file('user_profile_bg');
                $user_profile_bg = Input::file('user_profile_bg');
                $filename = time() . '.' . $user_profile_bg->getClientOriginalExtension();

                // CHANGE TO PROTECTED INDIVIDUAL USERS DIRECTORIES
                    Image::make($user_profile_bg)->resize(900, 300)->save( public_path('/uploads/user-backgrounds/' . $filename ) );
                // CHANGE TO PROTECTED INDIVIDUAL USERS DIRECTORIES

                $user->profile->user_profile_bg = $filename;
                $user->profile->save();
            }

            return redirect('users/' . $user->id . '/')->with('status', 'Successfully updated the user!');

        }
    }

    /**
     * Show the form for creating a new User
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create-user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $create_new_validator = $this->create_new_validator($request->all());

        if ($create_new_validator->fails()) {
            $this->throwValidationException(
                $request, $create_new_validator
            );
        }
        else
        {

            $activation_code        = str_random(60) . $request->input('email');
            $user                   = new User;
            $user->email            = $request->input('email');
            $user->name             = $request->input('name');
            $user->first_name       = $request->input('first_name');
            $user->last_name        = $request->input('last_name');
            $userAccessLevel        = $request->input('user_level');
            $user->password         = bcrypt($request->input('password'));

            // GET ACTIVATION CODE
            $user->activation_code  = $activation_code;
            $user->active           = '1';

            // GET IP ADDRESS
            $userIpAddress          = new CaptureIp;
            $user->admin_ip_address = $userIpAddress->getClientIp();

            // SAVE THE USER
            $user->save();

            // CONVERT ROLE FROM MATERIAL DESIGN INPUT
            switch ($userAccessLevel) {
                case 'User':
                    $input_role = '1';
                    break;

                case 'Editor':
                    $input_role = '2';
                    break;

                case 'Administrator':
                    $input_role = '3';
                    break;

                default:
                    $input_role = '1';
                    break;
            }

            // ADD ROLE
            $user->assignRole($input_role);

            // CREATE PROFILE LINK TO TABLE
            $profile = new Profile;

            $profileInputs = Input::only(
                'location',
                'bio',
                'twitter_username',
                'github_username'
            );
            $profile->fill($profileInputs);
            $user->profile()->save($profile);

            // THE SUCCESSFUL RETURN
            return redirect('users')->with('status', 'Successfully created user!');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	// GET USER
        $user = User::find($id);

        return view('admin.show-user')->withUser($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // DELETE USER
        $user = User::find($id);
        $user->delete();

        return redirect('users')->with('status', 'Successfully deleted the user!');
    }

}
