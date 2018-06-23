# Laravel Material Design

### Laravel Material Design is a Complete Build of Laravel 5.6 and Google Material Design Lite 1.3 with Email Registration Verification, Social Authentication, User Roles and Permissions, User Profiles, and Admin restricted user management system.
[![Build Status](https://travis-ci.org/jeremykenedy/laravel-material-design.svg?branch=master)](https://travis-ci.org/jeremykenedy/laravel-material-design)
[![StyleCI](https://github.styleci.io/repos/65395310/shield?branch=master)](https://github.styleci.io/repos/65395310)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

#### Table of contents
- [About](#about)
- [Features](#features)
- [Installation Instructions](#installation-instructions)
    - [Build the Front End Assets with Mix](#build-front-end-assets-with-mix)
    - [Optionally Build Cache](#optionally-build-cache)
- [View the Project in Browser Using Artisan](#view-the-project-in-browser-using-artisan)
- [Seeds](#seeds)
    - [Seeded Roles](#seeded-roles)
    - [Seeded Permissions](#seeded-permissions)
    - [Seeded Users](#seeded-users)
- [Routes](#routes)
- [Socialite](#socialite)
    - [Get Socialite Login API Keys](#get-socialite-login-api-keys)
    - [Add More Socialite Logins](#add-more-socialite-logins)
- [Other API keys](#other-api-keys)
- [Environment File](#environment-file)
- [Helpful custom functions](#helpful-custom-functions)
    - [Dialogs](#Dialogs)
    - [Datatabes](#datatabes)
    - [SnackBar-Toast](#snackbar-toast)
- [Screenshots](#screenshots)
- [File Tree](#file-tree)
- [Laravel References](#laravel-references)
- [Opening an Issue](#opening-an-issue)
- [Laravel Material Design License](#laravel-material-design-license)

### About
Laravel 5.6 with user authentication, registration with email confirmation, social media authentication, password recovery, and captcha protection. This makes full use of Controllers for the routes, templates for the views, and makes use of middleware for routing. Uses laravel ORM modeling and has CRUD (Create Read Update Delete) functionality for all tasks. Quick setup, can be done in 5 minutes. It will take longer to obtain your Facebook, Twitter, and Google Plus API Keys than it will to set this up.

### Features
#### A [Laravel](http://laravel.com/) 5.6.x with [Material Design Lite](https://getmdl.io/) 1.3.0 project.
| Laravel Material Design Features  |
| :------------ |
|Built on [Laravel](http://laravel.com/) 5.6|
|Built on [Material Design Lite](https://getmdl.io/) 1.3.0|
|Uses [MySQL](https://github.com/mysql) Database (can be changed) and include migrations and seeds|
|Uses [Artisan](http://laravel.com/docs/5.6/artisan) to manage database migration, schema creations, and create/publish page controller templates|
|Dependencies are managed with [COMPOSER](https://getcomposer.org/)|
|Laravel Scaffolding **User** and **Administrator Authentication**|
|Uses [Socialite Logins](https://github.com/laravel/socialite) ready to go - See API list used below|
|[Google Maps API v3](https://developers.google.com/maps/documentation/javascript/) for User Location lookup and Geocoding|
|CRUD (Create, Read, Update, Delete) Tasks Management|
|CRUD (Create, Read, Update, Delete) User Management|
|Eloquent user profiles|
|Users can pick theme through dropdown or colorwheel|
|Users can upload profile background images|
|User Avatar Image AJAX Upload with [Dropzone.js](http://www.dropzonejs.com/#configuration)|
|User Gravatar using [Gravatar API](https://github.com/creativeorange/gravatar)|
|User Registration with email verification|
|Google [reCaptcha Protection with Google API](https://developers.google.com/recaptcha/)|
|Makes us of Laravel [Mix](https://laravel.com/docs/5.6/mix) to compile assets|
|Makes use of [Language Localization Files](https://laravel.com/docs/5.6/localization)|
|Active Nav states using [Laravel Requests](https://laravel.com/docs/5.6/requests)|
|Restrict User Email Activation Attempts|
|Capture IP to users table upon signup|
|User uploads are in protected storage API|
|Uses [Laravel Debugger](https://github.com/barryvdh/laravel-debugbar) for development|
|User Password Reset via Email Token|
|User Login with remember password|
|User Delete with Goodby email|
|User Restore Deleted Account|
|User [Roles/ACL Implementation](https://github.com/jeremykenedy/laravel-roles)|
|Configurable Email Notification via [Laravel-Exception-Notifier](https://github.com/jeremykenedy/laravel-exception-notifier)|
|Makes of [Laravel's Soft Delete Structure](https://laravel.com/docs/5.6/eloquent#soft-deleting)|
|Soft Deleted Users Management System|
|Permanently Delete Soft Deleted Users|
|User Delete Account with Goodbye email|
|User Restore Deleted Account Token|
|Restore Soft Deleted Users|
|View Soft Deleted Users|
|Captures Soft Delete Date|
|Captures Soft Delete IP|
|Admin Routing Details UI|
|Admin PHP Information UI|
|404 Page|

### Installation Instructions
1. Run `git clone https://github.com/jeremykenedy/laravel-material-design.git laravel-material-design`
2. Create a MySQL database for the project
    * ```mysql -u root -p```, if using Vagrant: ```mysql -u homestead -psecret```
    * ```create database laravel_material;```
    * ```\q```
3. From the projects root run `cp .env.example .env`
4. Configure your `.env` file // NOTE: Google API Key will prevent maps error
5. Run `composer install` from the projects root folder
6. From the projects root folder run: `php artisan vendor:publish --tag=laravelroles`
7. (Optional permissions step) From the projects root folder run `sudo chmod -R ug+rwx storage bootstrap/cache`
8. From the projects root folder run `php artisan key:generate`
9. From the projects root folder run `php artisan migrate`
10. From the projects root folder run `composer dump-autoload`
11. From the projects root folder run `php artisan db:seed`
12. Compile the front end assets with [npm steps](#using-npm) or [yarn steps](#using-yarn).

#### Build the Front End Assets with Mix
##### Using NPM:
1. From the projects root folder run `npm install`
2. From the projects root folder run `npm run dev` or `npm run production`
  * You can watch assets with `npm run watch`

##### Using Yarn:
1. From the projects root folder run `yarn install`
2. From the projects root folder run `yarn run dev` or `yarn run production`
  * You can watch assets with `yarn run watch`

#### Optionally Build Cache
1. From the projects root folder run `php artisan config:cache`

###### And thats it with the caveat of setting up and configuring your development environment. I recommend [Laravel Homestead](https://laravel.com/docs/5.6/homestead)

#### View the Project in Browser Using Artisan
1. From the projects root folder run `php artisan serve`
2. Open your web browser and go to `http://localhost`

### Seeds
##### Seeded Roles
  * Unverified - Level 0
  * User  - Level 1
  * Administrator - Level 5

##### Seeded Permissions
  * view.users
  * create.users
  * edit.users
  * delete.users

##### Seeded Users
|Email|Password|Access|
|:------------|:------------|:------------|
|user@user.com|password|User Access|
|admin@admin.com|password|Admin Access|

### Routes

```
+--------+---------------+----------------------------------------+---------------------------------+------------------------------------------------------------------------+----------------------------------------------+
| Domain | Method        | URI                                    | Name                            | Action                                                                 | Middleware                                   |
+--------+---------------+----------------------------------------+---------------------------------+------------------------------------------------------------------------+----------------------------------------------+
|        | GET|HEAD      | /                                      | public.home                     | App\Http\Controllers\UserController@index                              | web,auth,activated                           |
|        | GET|HEAD      | _debugbar/assets/javascript            | debugbar.assets.js              | Barryvdh\Debugbar\Controllers\AssetController@js                       | Barryvdh\Debugbar\Middleware\DebugbarEnabled |
|        | GET|HEAD      | _debugbar/assets/stylesheets           | debugbar.assets.css             | Barryvdh\Debugbar\Controllers\AssetController@css                      | Barryvdh\Debugbar\Middleware\DebugbarEnabled |
|        | DELETE        | _debugbar/cache/{key}/{tags?}          | debugbar.cache.delete           | Barryvdh\Debugbar\Controllers\CacheController@delete                   | Barryvdh\Debugbar\Middleware\DebugbarEnabled |
|        | GET|HEAD      | _debugbar/clockwork/{id}               | debugbar.clockwork              | Barryvdh\Debugbar\Controllers\OpenHandlerController@clockwork          | Barryvdh\Debugbar\Middleware\DebugbarEnabled |
|        | GET|HEAD      | _debugbar/open                         | debugbar.openhandler            | Barryvdh\Debugbar\Controllers\OpenHandlerController@handle             | Barryvdh\Debugbar\Middleware\DebugbarEnabled |
|        | GET|HEAD      | account                                | {username}                      | App\Http\Controllers\ProfilesController@account                        | web,auth,activated,currentUser               |
|        | GET|HEAD      | activate                               | activate                        | App\Http\Controllers\Auth\ActivateController@initial                   | web,auth                                     |
|        | GET|HEAD      | activate/{token}                       | authenticated.activate          | App\Http\Controllers\Auth\ActivateController@activate                  | web,auth                                     |
|        | GET|HEAD      | activation                             | authenticated.activation-resend | App\Http\Controllers\Auth\ActivateController@resend                    | web,auth                                     |
|        | GET|HEAD      | activation-required                    | activation-required             | App\Http\Controllers\Auth\ActivateController@activationRequired        | web,auth,activated                           |
|        | POST          | avatar/upload                          | avatar.upload                   | App\Http\Controllers\ProfilesController@upload                         | web,auth,activated,currentUser               |
|        | POST          | background/upload                      | background.upload               | App\Http\Controllers\ProfilesController@uploadBackground               | web,auth,activated,currentUser               |
|        | GET|POST|HEAD | broadcasting/auth                      |                                 | Illuminate\Broadcasting\BroadcastController@authenticate               | web                                          |
|        | GET|HEAD      | exceeded                               | exceeded                        | App\Http\Controllers\Auth\ActivateController@exceeded                  | web,auth                                     |
|        | GET|HEAD      | home                                   | public.home                     | App\Http\Controllers\UserController@index                              | web,auth,activated                           |
|        | GET|HEAD      | images/profile/{id}/avatar/{image}     |                                 | App\Http\Controllers\ProfilesController@userProfileAvatar              | web,auth,activated                           |
|        | GET|HEAD      | images/profile/{id}/background/{image} |                                 | App\Http\Controllers\ProfilesController@userProfileBackgroundImage     | web,auth,activated                           |
|        | POST          | login                                  |                                 | App\Http\Controllers\Auth\LoginController@login                        | web,guest                                    |
|        | GET|HEAD      | login                                  | login                           | App\Http\Controllers\Auth\LoginController@showLoginForm                | web,guest                                    |
|        | GET|HEAD      | logout                                 | logout                          | App\Http\Controllers\Auth\LoginController@logout                       | web,auth,activated                           |
|        | POST          | logout                                 | logout                          | App\Http\Controllers\Auth\LoginController@logout                       | web                                          |
|        | GET|HEAD      | logs                                   |                                 | Rap2hpoutre\LaravelLogViewer\LogViewerController@index                 | web,auth,activated,role:admin                |
|        | GET|HEAD      | material.min.css.template              |                                 | App\Http\Controllers\ThemesManagementController@template               | web,auth                                     |
|        | POST          | password/email                         | password.email                  | App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail  | web,guest                                    |
|        | GET|HEAD      | password/reset                         | password.request                | App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm | web,guest                                    |
|        | POST          | password/reset                         |                                 | App\Http\Controllers\Auth\ResetPasswordController@reset                | web,guest                                    |
|        | GET|HEAD      | password/reset/{token}                 | password.reset                  | App\Http\Controllers\Auth\ResetPasswordController@showResetForm        | web,guest                                    |
|        | GET|HEAD      | php                                    |                                 | App\Http\Controllers\AdminDetailsController@listPHPInfo                | web,auth,activated,role:admin                |
|        | GET|HEAD      | profile/create                         | profile.create                  | App\Http\Controllers\ProfilesController@create                         | web,auth,activated,currentUser               |
|        | GET|HEAD      | profile/{profile}                      | profile.show                    | App\Http\Controllers\ProfilesController@show                           | web,auth,activated,currentUser               |
|        | PUT|PATCH     | profile/{profile}                      | profile.update                  | App\Http\Controllers\ProfilesController@update                         | web,auth,activated,currentUser               |
|        | GET|HEAD      | profile/{profile}/edit                 | profile.edit                    | App\Http\Controllers\ProfilesController@edit                           | web,auth,activated,currentUser               |
|        | GET|HEAD      | profile/{username}                     | {username}                      | App\Http\Controllers\ProfilesController@show                           | web,auth,activated                           |
|        | DELETE        | profile/{username}/deleteUserAccount   | {username}                      | App\Http\Controllers\ProfilesController@deleteUserAccount              | web,auth,activated,currentUser               |
|        | POST          | profile/{username}/updateAjax          | {username}                      | App\Http\Controllers\ProfilesController@update                         | web,auth,activated,currentUser               |
|        | PUT           | profile/{username}/updateUserAccount   | {username}                      | App\Http\Controllers\ProfilesController@updateUserAccount              | web,auth,activated,currentUser               |
|        | PUT           | profile/{username}/updateUserPassword  | {username}                      | App\Http\Controllers\ProfilesController@updateUserPassword             | web,auth,activated,currentUser               |
|        | GET|HEAD      | re-activate/{token}                    | user.reactivate                 | App\Http\Controllers\RestoreUserController@userReActivate              | web                                          |
|        | GET|HEAD      | register                               | register                        | App\Http\Controllers\Auth\RegisterController@showRegistrationForm      | web,guest                                    |
|        | POST          | register                               |                                 | App\Http\Controllers\Auth\RegisterController@register                  | web,guest                                    |
|        | GET|HEAD      | routes                                 |                                 | App\Http\Controllers\AdminDetailsController@listRoutes                 | web,auth,activated,role:admin                |
|        | GET|HEAD      | social/handle/{provider}               | social.handle                   | App\Http\Controllers\Auth\SocialController@getSocialHandle             | web                                          |
|        | GET|HEAD      | social/redirect/{provider}             | social.redirect                 | App\Http\Controllers\Auth\SocialController@getSocialRedirect           | web                                          |
|        | GET|HEAD      | tasks                                  | tasks.index                     | App\Http\Controllers\TasksController@index                             | web,auth,activated,currentUser               |
|        | POST          | tasks                                  | tasks.store                     | App\Http\Controllers\TasksController@store                             | web,auth,activated,currentUser               |
|        | GET|HEAD      | tasks/create                           | tasks.create                    | App\Http\Controllers\TasksController@create                            | web,auth,activated,currentUser               |
|        | GET|HEAD      | tasks/{task}                           | tasks.show                      | App\Http\Controllers\TasksController@show                              | web,auth,activated,currentUser               |
|        | PUT|PATCH     | tasks/{task}                           | tasks.update                    | App\Http\Controllers\TasksController@update                            | web,auth,activated,currentUser               |
|        | DELETE        | tasks/{task}                           | tasks.destroy                   | App\Http\Controllers\TasksController@destroy                           | web,auth,activated,currentUser               |
|        | GET|HEAD      | tasks/{task}/edit                      | tasks.edit                      | App\Http\Controllers\TasksController@edit                              | web,auth,activated,currentUser               |
|        | POST          | themes                                 | themes.store                    | App\Http\Controllers\ThemesManagementController@store                  | web,auth,activated,role:admin                |
|        | GET|HEAD      | themes                                 | themes                          | App\Http\Controllers\ThemesManagementController@index                  | web,auth,activated,role:admin                |
|        | GET|HEAD      | themes/create                          | themes.create                   | App\Http\Controllers\ThemesManagementController@create                 | web,auth,activated,role:admin                |
|        | GET|HEAD      | themes/{theme}                         | themes.show                     | App\Http\Controllers\ThemesManagementController@show                   | web,auth,activated,role:admin                |
|        | DELETE        | themes/{theme}                         | themes.destroy                  | App\Http\Controllers\ThemesManagementController@destroy                | web,auth,activated,role:admin                |
|        | PUT|PATCH     | themes/{theme}                         | themes.update                   | App\Http\Controllers\ThemesManagementController@update                 | web,auth,activated,role:admin                |
|        | GET|HEAD      | themes/{theme}/edit                    | themes.edit                     | App\Http\Controllers\ThemesManagementController@edit                   | web,auth,activated,role:admin                |
|        | GET|HEAD      | users                                  | users                           | App\Http\Controllers\UsersManagementController@index                   | web,auth,activated,role:admin                |
|        | POST          | users                                  | users.store                     | App\Http\Controllers\UsersManagementController@store                   | web,auth,activated,role:admin                |
|        | GET|HEAD      | users/create                           | create                          | App\Http\Controllers\UsersManagementController@create                  | web,auth,activated,role:admin                |
|        | GET|HEAD      | users/deleted                          | deleted.index                   | App\Http\Controllers\SoftDeletesController@index                       | web,auth,activated,role:admin                |
|        | DELETE        | users/deleted/{deleted}                | deleted.destroy                 | App\Http\Controllers\SoftDeletesController@destroy                     | web,auth,activated,role:admin                |
|        | PUT|PATCH     | users/deleted/{deleted}                | deleted.update                  | App\Http\Controllers\SoftDeletesController@update                      | web,auth,activated,role:admin                |
|        | GET|HEAD      | users/deleted/{deleted}                | deleted.show                    | App\Http\Controllers\SoftDeletesController@show                        | web,auth,activated,role:admin                |
|        | DELETE        | users/{user}                           | user.destroy                    | App\Http\Controllers\UsersManagementController@destroy                 | web,auth,activated,role:admin                |
|        | PUT|PATCH     | users/{user}                           | users.update                    | App\Http\Controllers\UsersManagementController@update                  | web,auth,activated,role:admin                |
|        | GET|HEAD      | users/{user}                           | users.show                      | App\Http\Controllers\UsersManagementController@show                    | web,auth,activated,role:admin                |
|        | GET|HEAD      | users/{user}/edit                      | users.edit                      | App\Http\Controllers\UsersManagementController@edit                    | web,auth,activated,role:admin                |
+--------+---------------+----------------------------------------+---------------------------------+------------------------------------------------------------------------+----------------------------------------------+
```

### Socialite
#### Get Socialite Login API Keys:
* [Google Captcha API](https://www.google.com/recaptcha/admin#list)
* [Facebook API](https://developers.facebook.com/)
* [Twitter API](https://apps.twitter.com/)
* [Google &plus; API](https://console.developers.google.com/)
* [GitHub API](https://github.com/settings/applications/new)
* [YouTube API](https://developers.google.com/youtube/v3/getting-started)
* [Twitch TV API](http://www.twitch.tv/kraken/oauth2/clients/new)
* [Instagram API](https://instagram.com/developer/register/)
* [37 Signals API](https://github.com/basecamp/basecamp-classic-api)

#### Add More Socialite Logins
* See full list of providers: [http://socialiteproviders.github.io](http://socialiteproviders.github.io/#providers)
###### **Steps**:
  1. Go to [http://socialiteproviders.github.io](http://socialiteproviders.github.io/providers/twitch/) and select the provider to be added.
  2. From the projects root folder in terminal run composer command to get the needed package.
     * Example:

      ```
         composer require socialiteproviders/twitch
      ```

  3. From the projects root folder run ```composer update```
  4. Add the service provider to ```/config/services.php```
     * Example:

     ```
        'twitch' => [
            'client_id'   => env('TWITCH_KEY'),
            'client_secret' => env('TWITCH_SECRET'),
            'redirect'    => env('TWITCH_REDIRECT_URI'),
        ],
     ```

  5. Add the API credentials to ``` /.env  ```
     * Example:

      ```
         TWITCH_KEY=YOURKEYHERE
         TWITCH_SECRET=YOURSECRETHERE
         TWITCH_REDIRECT_URI=http://YOURWEBSITEURL.COM/social/handle/twitch
      ```

  6. Add the social media login link:
      * Example:
      In file ```/resources/views/auth/login.blade.php``` add ONE of the following:
         * Conventional HTML:
        ```
        <a href="{{ route('social.redirect', ['provider' => 'twitch']) }}" class="btn btn-lg btn-primary btn-block twitch">Twitch</a>
        ```
         * Use Laravel HTML Facade with [Laravel Collective](https://laravelcollective.com/):

        ```
        {!! HTML::link(route('social.redirect', ['provider' => 'twitch']), 'Twitch', array('class' => 'btn btn-lg btn-primary btn-block twitch')) !!}
        ```

### Other API keys
* [Google Maps API v3 Key](https://developers.google.com/maps/documentation/javascript/get-api-key#get-an-api-key)

### Environment File
Example `.env` file:

```bash

APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_LOG_LEVEL=debug
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_material
DB_USERNAME=homestead
DB_PASSWORD=secret

BROADCAST_DRIVER=log
CACHE_DRIVER=file
SESSION_DRIVER=file
SESSION_LIFETIME=120
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

MAIL_FROM_ADDRESS=
MAIL_FROM_NAME=''

EMAIL_EXCEPTION_ENABLED=false
EMAIL_EXCEPTION_FROM=email@email.com
EMAIL_EXCEPTION_TO='email1@gmail.com, email2@gmail.com'
EMAIL_EXCEPTION_CC=''
EMAIL_EXCEPTION_BCC=''
EMAIL_EXCEPTION_SUBJECT=''

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

ACTIVATION=true
ACTIVATION_LIMIT_TIME_PERIOD=24
ACTIVATION_LIMIT_MAX_ATTEMPTS=3

NULL_IP_ADDRESS=0.0.0.0

DEBUG_BAR_ENVIRONMENT=local

USER_RESTORE_CUTOFF_DAYS=31
USER_RESTORE_ENRYPTION_KEY=

DEFAULT_GRAVATAR_SIZE=80
DEFAULT_GRAVATAR_FALLBACK=http://c1940652.r52.cf0.rackcdn.com/51ce28d0fb4f442061000000/Screen-Shot-2013-06-28-at-5.22.23-PM.png
DEFAULT_GRAVATAR_SECURE=false
DEFAULT_GRAVATAR_MAX_RATING=g
DEFAULT_GRAVATAR_FORCE_DEFAULT=false
DEFAULT_GRAVATAR_FORCE_EXTENSION=jpg

// NOTE: YOU CAN REMOVE THE KEY CALL IN app.blade.php IF YOU GET A POP UP AND DO NOT WANT TO SETUP A KEY FOR DEV
# Google Maps API v3 Key - https://developers.google.com/maps/documentation/javascript/get-api-key#get-an-api-key
GOOGLEMAPS_API_KEY=YOURGOOGLEMAPSkeyHERE

# https://console.developers.google.com/ - NEED OAUTH CREDS
GOOGLE_ID=YOURGOOGLEPLUSidHERE
GOOGLE_SECRET=YOURGOOGLEPLUSsecretHERE
GOOGLE_REDIRECT=http://yourwebsiteURLhere.com/social/handle/google

# https://www.google.com/recaptcha/admin#list
ENABLE_RECAPTCHA=true
RE_CAP_SITE=YOURGOOGLECAPTCHAsitekeyHERE
RE_CAP_SECRET=YOURGOOGLECAPTCHAsecretHERE

# https://developers.facebook.com/
FB_ID=YOURFACEBOOKidHERE
FB_SECRET=YOURFACEBOOKsecretHERE
FB_REDIRECT=http://yourwebsiteURLhere.com/social/handle/facebook

# https://apps.twitter.com/
TW_ID=YOURTWITTERidHERE
TW_SECRET=YOURTWITTERkeyHERE
TW_REDIRECT=http://yourwebsiteURLhere.com/social/handle/twitter

# https://github.com/settings/applications/new
GITHUB_ID=YOURIDHERE
GITHUB_SECRET=YOURSECRETHERE
GITHUB_URL=https://larablog.io/social/handle/github

# https://developers.google.com/youtube/v3/getting-started
YOUTUBE_KEY=YOURKEYHERE
YOUTUBE_SECRET=YOURSECRETHERE
YOUTUBE_REDIRECT_URI=https://larablog.io/social/handle/youtube

# http://www.twitch.tv/kraken/oauth2/clients/new
TWITCH_KEY=YOURKEYHERE
TWITCH_SECRET=YOURSECRETHERE
TWITCH_REDIRECT_URI=http://laravel-authentication.local/social/handle/twitch

# https://instagram.com/developer/register/
INSTAGRAM_KEY=YOURKEYHERE
INSTAGRAM_SECRET=YOURSECRETHERE
INSTAGRAM_REDIRECT_URI=http://laravel-authentication.local/social/handle/instagram

# https://basecamp.com/
# https://github.com/basecamp/basecamp-classic-api
37SIGNALS_KEY=YOURKEYHERE
37SIGNALS_SECRET=YOURSECRETHERE
37SIGNALS_REDIRECT_URI=http://laravel-authentication.local/social/handle/37signals

```

### Helpful custom functions
#### Dialogs
1. Call Material Design Lite Dialog Box

```
mdl_dialog(trigger,close,dialog)
```

* The inputs are optional, the Defaults are as follows:

```
    var trigger = trigger || document.querySelector('.dialog-button');
    var close = close || document.querySelector('.dialog-close');
    var dialog = dialog || document.querySelector('#dialog');
```

2. Add the desired dialog view to your template view with:

```
    @include('dialogs.dialog-save')
```

* Substitute with the desired dialog blade.

3. Options
    a. DELETE DIALOG OPTIONS
    You can override the delete dialog title and save button text by passing your variables, otherwise the defaults will display.

    Example:

    ```
    @include('dialogs.dialog-delete', ['dialogTitle' => 'Confirm Task Deletion', 'dialogSaveBtnText' => 'Delete'])
    ```

#### Datatabes
Give a table functionality with [DataTables](https://datatables.net)

1. Within the ```@section('template_scripts')``` section call the view with:

```
@include('scripts.mdl-datatables')
```

2. Add class ```data-table``` to your ```<table>``` to instantiate it as a datatable.
3 You should add classes ```mdl-data-table``` and ```mdl-js-data-table``` for MDL styling (not required).
4. Optionally exclude/disable any column from being sortable by adding class ```no-sort``` to the ```<th>``` of the column.
5. Optionally exclude/disable any column from being searchable by adding class ```no-search``` to the ```<th>``` of the column.

#### SnackBar-Toast
Use Google Material Design Lite built in notificatons outlined below:

1. Include ```@include('scripts.mdl-snackbar')``` call in the ```@section('template_scripts')``` section
2. Include ```@include('partials.mdl-snackbar')``` in your template
3. Call Snackbar/Toast using JavaScript: EXAMPLES BELOW

    1. Snackbar
    ###### SNACKBAR ACTION(s)
    ```
    var someActions = function(event) {
        document.querySelector('.mdl-snackbar-trigger').style.backgroundColor = 'red';
    };

    ```

    ######  SNACKBAR CALL - WITH ACTION(s)
    ```
    mdl_snackbar({
        msg: 'Profile Updated',
        timout: 4000,                               // OPTIONAL
        snackBarTrigger: '.mdl-snackbar-trigger',   // OPTIONAL
        actionText: 'Undo',                         // OPTIONAL
        actionHandler: someActions,                 // OPTIONAL
    });

    ```

    2. Toast
    ###### TOAST CALL - NO ACTION
    ```
    mdl_snackbar({
        msg: 'Profile Updated',
        timout: 4000,
        snackBarTrigger: '.mdl-snackbar-trigger'
    });

    ```

    3. EXAMPLE CTA TO SnackBar/Toast

    ```
    <button class="mdl-button mdl-js-button mdl-button--raised mdl-snackbar-trigger" type="button">Show Toast</button>

    ```

### Screenshots
###### Login Desktop
![Login Screen](https://s3-us-west-2.amazonaws.com/laravel-material-design/screenshots/login-desktop.jpg "Laravel Material Design Login")

###### Login Mobile
![Login Screen](https://s3-us-west-2.amazonaws.com/laravel-material-design/screenshots/login-mobile.jpg "Laravel Material Design Login")

###### User Profile Menu
![User Profile Menu](https://s3-us-west-2.amazonaws.com/laravel-material-design/screenshots/user-menu-1.jpg "Laravel Material Design")

###### User Top Nav
![User Top Nav](https://s3-us-west-2.amazonaws.com/laravel-material-design/screenshots/user-nav.jpg "Laravel Material Design")

###### Mobile Drawer Nav
![Mobile Drawer Nav](https://s3-us-west-2.amazonaws.com/laravel-material-design/screenshots/mobile-nav-drawer.jpg "Laravel Material Design")

###### Admin View - User List Desktop
![Admin View - User List Desktop](https://s3-us-west-2.amazonaws.com/laravel-material-design/screenshots/user-list-desktop.jpg "Laravel Material Design")

###### Admin View - User List Mobile
![Admin View - User List Mobile](https://s3-us-west-2.amazonaws.com/laravel-material-design/screenshots/user-list-mobile.jpg "Laravel Material Design")

###### Alert Error Example
![Alert Error Example](https://s3-us-west-2.amazonaws.com/laravel-material-design/screenshots/alert-error.jpg "Laravel Material Design")

###### Alert Success Example
![Alert Success Example](https://s3-us-west-2.amazonaws.com/laravel-material-design/screenshots/alert-succes.jpg "Laravel Material Design")

### File Tree
```
laravel-material-design/
├── .env.example
├── .env.travis
├── .gitattributes
├── .gitignore
├── .travis.yml
├── LICENSE
├── README.md
├── app
│   ├── Console
│   │   ├── Commands
│   │   │   └── DeleteExpiredActivations.php
│   │   └── Kernel.php
│   ├── Exceptions
│   │   └── Handler.php
│   ├── Http
│   │   ├── Controllers
│   │   │   ├── AdminDetailsController.php
│   │   │   ├── Auth
│   │   │   │   ├── ActivateController.php
│   │   │   │   ├── ForgotPasswordController.php
│   │   │   │   ├── LoginController.php
│   │   │   │   ├── RegisterController.php
│   │   │   │   ├── ResetPasswordController.php
│   │   │   │   └── SocialController.php
│   │   │   ├── Controller.php
│   │   │   ├── ProfilesController.php
│   │   │   ├── RestoreUserController.php
│   │   │   ├── SoftDeletesController.php
│   │   │   ├── TasksController.php
│   │   │   ├── ThemesManagementController.php
│   │   │   ├── UserController.php
│   │   │   ├── UsersManagementController.php
│   │   │   └── WelcomeController.php
│   │   ├── Kernel.php
│   │   ├── Middleware
│   │   │   ├── Authenticate.php
│   │   │   ├── CheckCurrentUser.php
│   │   │   ├── CheckIsUserActivated.php
│   │   │   ├── EncryptCookies.php
│   │   │   ├── RedirectIfAuthenticated.php
│   │   │   ├── TrimStrings.php
│   │   │   └── VerifyCsrfToken.php
│   │   └── ViewComposers
│   │       ├── ThemeComposer.php
│   │       └── UsersComposer.php
│   ├── Logic
│   │   ├── Activation
│   │   │   └── ActivationRepository.php
│   │   └── Macros
│   │       └── HtmlMacros.php
│   ├── Mail
│   │   └── ExceptionOccured.php
│   ├── Models
│   │   ├── Activation.php
│   │   ├── Profile.php
│   │   ├── Social.php
│   │   ├── Task.php
│   │   ├── Theme.php
│   │   └── User.php
│   ├── Notifications
│   │   ├── SendActivationEmail.php
│   │   └── SendGoodbyeEmail.php
│   ├── Providers
│   │   ├── AppServiceProvider.php
│   │   ├── AuthServiceProvider.php
│   │   ├── BroadcastServiceProvider.php
│   │   ├── ComposerServiceProvider.php
│   │   ├── EventServiceProvider.php
│   │   ├── LocalEnvironmentServiceProvider.php
│   │   ├── MacroServiceProvider.php
│   │   └── RouteServiceProvider.php
│   └── Traits
│       ├── ActivationTrait.php
│       ├── CaptchaTrait.php
│       └── CaptureIpTrait.php
├── artisan
├── bootstrap
│   ├── app.php
│   ├── autoload.php
│   └── cache
│       ├── .gitignore
│       ├── packages.php
│       └── services.php
├── composer.json
├── config
│   ├── app.php
│   ├── auth.php
│   ├── broadcasting.php
│   ├── cache.php
│   ├── database.php
│   ├── debugbar.php
│   ├── exceptions.php
│   ├── filesystems.php
│   ├── gravatar.php
│   ├── hashing.php
│   ├── mail.php
│   ├── queue.php
│   ├── roles.php
│   ├── services.php
│   ├── session.php
│   ├── settings.php
│   └── view.php
├── database
│   ├── .gitignore
│   ├── factories
│   │   └── ModelFactory.php
│   ├── migrations
│   │   ├── 2014_10_12_000000_create_users_table.php
│   │   ├── 2014_10_12_100000_create_password_resets_table.php
│   │   ├── 2016_01_15_105324_create_roles_table.php
│   │   ├── 2016_01_15_114412_create_role_user_table.php
│   │   ├── 2016_01_26_115212_create_permissions_table.php
│   │   ├── 2016_01_26_115523_create_permission_role_table.php
│   │   ├── 2016_02_09_132439_create_permission_user_table.php
│   │   ├── 2017_03_09_082449_create_social_logins_table.php
│   │   ├── 2017_03_09_082526_create_activations_table.php
│   │   ├── 2017_03_20_213554_create_themes_table.php
│   │   ├── 2017_03_21_042918_create_profiles_table.php
│   │   └── 2017_05_20_095210_create_tasks_table.php
│   └── seeds
│       ├── ConnectRelationshipsSeeder.php
│       ├── DatabaseSeeder.php
│       ├── PermissionsTableSeeder.php
│       ├── RolesTableSeeder.php
│       ├── ThemesTableSeeder.php
│       └── UsersTableSeeder.php
├── favicon.png
├── license.svg
├── package.json
├── phpunit.xml
├── public
│   ├── .htaccess
│   ├── css
│   │   ├── app.css
│   │   └── mdl-themes
│   │       ├── material-grid.css
│   │       ├── material-grid.min.css
│   │       ├── material.amber-blue.min.css
│   │       ├── material.amber-cyan.min.css
│   │       ├── material.amber-deep_orange.min.css
│   │       ├── material.amber-deep_purple.min.css
│   │       ├── material.amber-green.min.css
│   │       ├── material.amber-indigo.min.css
│   │       ├── material.amber-light_blue.min.css
│   │       ├── material.amber-light_green.min.css
│   │       ├── material.amber-lime.min.css
│   │       ├── material.amber-orange.min.css
│   │       ├── material.amber-pink.min.css
│   │       ├── material.amber-purple.min.css
│   │       ├── material.amber-red.min.css
│   │       ├── material.amber-teal.min.css
│   │       ├── material.amber-yellow.min.css
│   │       ├── material.blue-amber.min.css
│   │       ├── material.blue-cyan.min.css
│   │       ├── material.blue-deep_orange.min.css
│   │       ├── material.blue-deep_purple.min.css
│   │       ├── material.blue-green.min.css
│   │       ├── material.blue-indigo.min.css
│   │       ├── material.blue-light_blue.min.css
│   │       ├── material.blue-light_green.min.css
│   │       ├── material.blue-lime.min.css
│   │       ├── material.blue-orange.min.css
│   │       ├── material.blue-pink.min.css
│   │       ├── material.blue-purple.min.css
│   │       ├── material.blue-red.min.css
│   │       ├── material.blue-teal.min.css
│   │       ├── material.blue-yellow.min.css
│   │       ├── material.blue_grey-amber.min.css
│   │       ├── material.blue_grey-blue.min.css
│   │       ├── material.blue_grey-cyan.min.css
│   │       ├── material.blue_grey-deep_orange.min.css
│   │       ├── material.blue_grey-deep_purple.min.css
│   │       ├── material.blue_grey-green.min.css
│   │       ├── material.blue_grey-indigo.min.css
│   │       ├── material.blue_grey-light_blue.min.css
│   │       ├── material.blue_grey-light_green.min.css
│   │       ├── material.blue_grey-lime.min.css
│   │       ├── material.blue_grey-orange.min.css
│   │       ├── material.blue_grey-pink.min.css
│   │       ├── material.blue_grey-purple.min.css
│   │       ├── material.blue_grey-red.min.css
│   │       ├── material.blue_grey-teal.min.css
│   │       ├── material.blue_grey-yellow.min.css
│   │       ├── material.brown-amber.min.css
│   │       ├── material.brown-blue.min.css
│   │       ├── material.brown-cyan.min.css
│   │       ├── material.brown-deep_orange.min.css
│   │       ├── material.brown-deep_purple.min.css
│   │       ├── material.brown-green.min.css
│   │       ├── material.brown-indigo.min.css
│   │       ├── material.brown-light_blue.min.css
│   │       ├── material.brown-light_green.min.css
│   │       ├── material.brown-lime.min.css
│   │       ├── material.brown-orange.min.css
│   │       ├── material.brown-pink.min.css
│   │       ├── material.brown-purple.min.css
│   │       ├── material.brown-red.min.css
│   │       ├── material.brown-teal.min.css
│   │       ├── material.brown-yellow.min.css
│   │       ├── material.css
│   │       ├── material.cyan-amber.min.css
│   │       ├── material.cyan-blue.min.css
│   │       ├── material.cyan-deep_orange.min.css
│   │       ├── material.cyan-deep_purple.min.css
│   │       ├── material.cyan-green.min.css
│   │       ├── material.cyan-indigo.min.css
│   │       ├── material.cyan-light_blue.min.css
│   │       ├── material.cyan-light_green.min.css
│   │       ├── material.cyan-lime.min.css
│   │       ├── material.cyan-orange.min.css
│   │       ├── material.cyan-pink.min.css
│   │       ├── material.cyan-purple.min.css
│   │       ├── material.cyan-red.min.css
│   │       ├── material.cyan-teal.min.css
│   │       ├── material.cyan-yellow.min.css
│   │       ├── material.deep_orange-amber.min.css
│   │       ├── material.deep_orange-blue.min.css
│   │       ├── material.deep_orange-cyan.min.css
│   │       ├── material.deep_orange-deep_purple.min.css
│   │       ├── material.deep_orange-green.min.css
│   │       ├── material.deep_orange-indigo.min.css
│   │       ├── material.deep_orange-light_blue.min.css
│   │       ├── material.deep_orange-light_green.min.css
│   │       ├── material.deep_orange-lime.min.css
│   │       ├── material.deep_orange-orange.min.css
│   │       ├── material.deep_orange-pink.min.css
│   │       ├── material.deep_orange-purple.min.css
│   │       ├── material.deep_orange-red.min.css
│   │       ├── material.deep_orange-teal.min.css
│   │       ├── material.deep_orange-yellow.min.css
│   │       ├── material.deep_purple-amber.min.css
│   │       ├── material.deep_purple-blue.min.css
│   │       ├── material.deep_purple-cyan.min.css
│   │       ├── material.deep_purple-deep_orange.min.css
│   │       ├── material.deep_purple-green.min.css
│   │       ├── material.deep_purple-indigo.min.css
│   │       ├── material.deep_purple-light_blue.min.css
│   │       ├── material.deep_purple-light_green.min.css
│   │       ├── material.deep_purple-lime.min.css
│   │       ├── material.deep_purple-orange.min.css
│   │       ├── material.deep_purple-pink.min.css
│   │       ├── material.deep_purple-purple.min.css
│   │       ├── material.deep_purple-red.min.css
│   │       ├── material.deep_purple-teal.min.css
│   │       ├── material.deep_purple-yellow.min.css
│   │       ├── material.green-amber.min.css
│   │       ├── material.green-blue.min.css
│   │       ├── material.green-cyan.min.css
│   │       ├── material.green-deep_orange.min.css
│   │       ├── material.green-deep_purple.min.css
│   │       ├── material.green-indigo.min.css
│   │       ├── material.green-light_blue.min.css
│   │       ├── material.green-light_green.min.css
│   │       ├── material.green-lime.min.css
│   │       ├── material.green-orange.min.css
│   │       ├── material.green-pink.min.css
│   │       ├── material.green-purple.min.css
│   │       ├── material.green-red.min.css
│   │       ├── material.green-teal.min.css
│   │       ├── material.green-yellow.min.css
│   │       ├── material.grey-amber.min.css
│   │       ├── material.grey-blue.min.css
│   │       ├── material.grey-cyan.min.css
│   │       ├── material.grey-deep_orange.min.css
│   │       ├── material.grey-deep_purple.min.css
│   │       ├── material.grey-green.min.css
│   │       ├── material.grey-indigo.min.css
│   │       ├── material.grey-light_blue.min.css
│   │       ├── material.grey-light_green.min.css
│   │       ├── material.grey-lime.min.css
│   │       ├── material.grey-orange.min.css
│   │       ├── material.grey-pink.min.css
│   │       ├── material.grey-purple.min.css
│   │       ├── material.grey-red.min.css
│   │       ├── material.grey-teal.min.css
│   │       ├── material.grey-yellow.min.css
│   │       ├── material.indigo-amber.min.css
│   │       ├── material.indigo-blue.min.css
│   │       ├── material.indigo-cyan.min.css
│   │       ├── material.indigo-deep_orange.min.css
│   │       ├── material.indigo-deep_purple.min.css
│   │       ├── material.indigo-green.min.css
│   │       ├── material.indigo-light_blue.min.css
│   │       ├── material.indigo-light_green.min.css
│   │       ├── material.indigo-lime.min.css
│   │       ├── material.indigo-orange.min.css
│   │       ├── material.indigo-pink.min.css
│   │       ├── material.indigo-purple.min.css
│   │       ├── material.indigo-red.min.css
│   │       ├── material.indigo-teal.min.css
│   │       ├── material.indigo-yellow.min.css
│   │       ├── material.light_blue-amber.min.css
│   │       ├── material.light_blue-blue.min.css
│   │       ├── material.light_blue-cyan.min.css
│   │       ├── material.light_blue-deep_orange.min.css
│   │       ├── material.light_blue-deep_purple.min.css
│   │       ├── material.light_blue-green.min.css
│   │       ├── material.light_blue-indigo.min.css
│   │       ├── material.light_blue-light_green.min.css
│   │       ├── material.light_blue-lime.min.css
│   │       ├── material.light_blue-orange.min.css
│   │       ├── material.light_blue-pink.min.css
│   │       ├── material.light_blue-purple.min.css
│   │       ├── material.light_blue-red.min.css
│   │       ├── material.light_blue-teal.min.css
│   │       ├── material.light_blue-yellow.min.css
│   │       ├── material.light_green-amber.min.css
│   │       ├── material.light_green-blue.min.css
│   │       ├── material.light_green-cyan.min.css
│   │       ├── material.light_green-deep_orange.min.css
│   │       ├── material.light_green-deep_purple.min.css
│   │       ├── material.light_green-green.min.css
│   │       ├── material.light_green-indigo.min.css
│   │       ├── material.light_green-light_blue.min.css
│   │       ├── material.light_green-lime.min.css
│   │       ├── material.light_green-orange.min.css
│   │       ├── material.light_green-pink.min.css
│   │       ├── material.light_green-purple.min.css
│   │       ├── material.light_green-red.min.css
│   │       ├── material.light_green-teal.min.css
│   │       ├── material.light_green-yellow.min.css
│   │       ├── material.lime-amber.min.css
│   │       ├── material.lime-blue.min.css
│   │       ├── material.lime-cyan.min.css
│   │       ├── material.lime-deep_orange.min.css
│   │       ├── material.lime-deep_purple.min.css
│   │       ├── material.lime-green.min.css
│   │       ├── material.lime-indigo.min.css
│   │       ├── material.lime-light_blue.min.css
│   │       ├── material.lime-light_green.min.css
│   │       ├── material.lime-orange.min.css
│   │       ├── material.lime-pink.min.css
│   │       ├── material.lime-purple.min.css
│   │       ├── material.lime-red.min.css
│   │       ├── material.lime-teal.min.css
│   │       ├── material.lime-yellow.min.css
│   │       ├── material.min.css
│   │       ├── material.orange-amber.min.css
│   │       ├── material.orange-blue.min.css
│   │       ├── material.orange-cyan.min.css
│   │       ├── material.orange-deep_orange.min.css
│   │       ├── material.orange-deep_purple.min.css
│   │       ├── material.orange-green.min.css
│   │       ├── material.orange-indigo.min.css
│   │       ├── material.orange-light_blue.min.css
│   │       ├── material.orange-light_green.min.css
│   │       ├── material.orange-lime.min.css
│   │       ├── material.orange-pink.min.css
│   │       ├── material.orange-purple.min.css
│   │       ├── material.orange-red.min.css
│   │       ├── material.orange-teal.min.css
│   │       ├── material.orange-yellow.min.css
│   │       ├── material.pink-amber.min.css
│   │       ├── material.pink-blue.min.css
│   │       ├── material.pink-cyan.min.css
│   │       ├── material.pink-deep_orange.min.css
│   │       ├── material.pink-deep_purple.min.css
│   │       ├── material.pink-green.min.css
│   │       ├── material.pink-indigo.min.css
│   │       ├── material.pink-light_blue.min.css
│   │       ├── material.pink-light_green.min.css
│   │       ├── material.pink-lime.min.css
│   │       ├── material.pink-orange.min.css
│   │       ├── material.pink-purple.min.css
│   │       ├── material.pink-red.min.css
│   │       ├── material.pink-teal.min.css
│   │       ├── material.pink-yellow.min.css
│   │       ├── material.purple-amber.min.css
│   │       ├── material.purple-blue.min.css
│   │       ├── material.purple-cyan.min.css
│   │       ├── material.purple-deep_orange.min.css
│   │       ├── material.purple-deep_purple.min.css
│   │       ├── material.purple-green.min.css
│   │       ├── material.purple-indigo.min.css
│   │       ├── material.purple-light_blue.min.css
│   │       ├── material.purple-light_green.min.css
│   │       ├── material.purple-lime.min.css
│   │       ├── material.purple-orange.min.css
│   │       ├── material.purple-pink.min.css
│   │       ├── material.purple-red.min.css
│   │       ├── material.purple-teal.min.css
│   │       ├── material.purple-yellow.min.css
│   │       ├── material.red-amber.min.css
│   │       ├── material.red-blue.min.css
│   │       ├── material.red-cyan.min.css
│   │       ├── material.red-deep_orange.min.css
│   │       ├── material.red-deep_purple.min.css
│   │       ├── material.red-green.min.css
│   │       ├── material.red-indigo.min.css
│   │       ├── material.red-light_blue.min.css
│   │       ├── material.red-light_green.min.css
│   │       ├── material.red-lime.min.css
│   │       ├── material.red-orange.min.css
│   │       ├── material.red-pink.min.css
│   │       ├── material.red-purple.min.css
│   │       ├── material.red-teal.min.css
│   │       ├── material.red-yellow.min.css
│   │       ├── material.teal-amber.min.css
│   │       ├── material.teal-blue.min.css
│   │       ├── material.teal-cyan.min.css
│   │       ├── material.teal-deep_orange.min.css
│   │       ├── material.teal-deep_purple.min.css
│   │       ├── material.teal-green.min.css
│   │       ├── material.teal-indigo.min.css
│   │       ├── material.teal-light_blue.min.css
│   │       ├── material.teal-light_green.min.css
│   │       ├── material.teal-lime.min.css
│   │       ├── material.teal-orange.min.css
│   │       ├── material.teal-pink.min.css
│   │       ├── material.teal-purple.min.css
│   │       ├── material.teal-red.min.css
│   │       ├── material.teal-yellow.min.css
│   │       ├── material.yellow-amber.min.css
│   │       ├── material.yellow-blue.min.css
│   │       ├── material.yellow-cyan.min.css
│   │       ├── material.yellow-deep_orange.min.css
│   │       ├── material.yellow-deep_purple.min.css
│   │       ├── material.yellow-green.min.css
│   │       ├── material.yellow-indigo.min.css
│   │       ├── material.yellow-light_blue.min.css
│   │       ├── material.yellow-light_green.min.css
│   │       ├── material.yellow-lime.min.css
│   │       ├── material.yellow-orange.min.css
│   │       ├── material.yellow-pink.min.css
│   │       ├── material.yellow-purple.min.css
│   │       ├── material.yellow-red.min.css
│   │       └── material.yellow-teal.min.css
│   ├── favicon.ico
│   ├── fonts
│   │   ├── fontawesome-webfont.eot
│   │   ├── fontawesome-webfont.svg
│   │   ├── fontawesome-webfont.ttf
│   │   ├── fontawesome-webfont.woff
│   │   ├── fontawesome-webfont.woff2
│   │   ├── glyphicons-halflings-regular.eot
│   │   ├── glyphicons-halflings-regular.svg
│   │   ├── glyphicons-halflings-regular.ttf
│   │   ├── glyphicons-halflings-regular.woff
│   │   ├── glyphicons-halflings-regular.woff2
│   │   └── weather-icons
│   │       ├── WeatherIcons-Regular.otf
│   │       ├── weathericons-regular-webfont.eot
│   │       ├── weathericons-regular-webfont.svg
│   │       ├── weathericons-regular-webfont.ttf
│   │       └── weathericons-regular-webfont.woff
│   ├── images
│   │   ├── buffer.svg
│   │   ├── default-user-bg.png
│   │   ├── tick-mask.svg
│   │   ├── tick.svg
│   │   ├── wink.png
│   │   └── wink.svg
│   ├── index.php
│   ├── js
│   │   ├── app.js
│   │   └── mdl.js
│   ├── mix-manifest.json
│   ├── robots.txt
│   └── web.config
├── resources
│   ├── assets
│   │   ├── js
│   │   │   ├── app.js
│   │   │   ├── bootstrap.js
│   │   │   ├── components
│   │   │   │   └── Example.vue
│   │   │   └── laravel-mdl
│   │   │       ├── alerts.js
│   │   │       ├── dialogs.js
│   │   │       ├── jQuery.animate-bg.js
│   │   │       ├── jQuery.simpleWeather.js
│   │   │       ├── mdl-colorwheel.js
│   │   │       ├── mdl-datatables.js
│   │   │       ├── mdl-selectfield.js
│   │   │       ├── mdl-snackbars.js
│   │   │       ├── select.js
│   │   │       └── spinners.js
│   │   └── sass
│   │       ├── app.scss
│   │       ├── components
│   │       │   ├── _alerts.scss
│   │       │   ├── _avatar.scss
│   │       │   ├── _badges.scss
│   │       │   ├── _breadcrumbs.scss
│   │       │   ├── _cards.scss
│   │       │   ├── _chips.scss
│   │       │   ├── _dialogs.scss
│   │       │   ├── _dropzone.scss
│   │       │   ├── _inputs.scss
│   │       │   ├── _labels.scss
│   │       │   ├── _lists.scss
│   │       │   ├── _material-icons.scss
│   │       │   ├── _mdl-color-wheel.scss
│   │       │   ├── _mdl-selectfield.scss
│   │       │   ├── _mdl-tabs.scss
│   │       │   ├── _mdl-toggle.scss
│   │       │   ├── _select.scss
│   │       │   ├── _social-icons.scss
│   │       │   ├── _spinners.scss
│   │       │   ├── _tables.scss
│   │       │   ├── _weather-card.scss
│   │       │   └── weather-icons
│   │       │       ├── icon-classes
│   │       │       │   ├── classes-beaufort.scss
│   │       │       │   ├── classes-day.scss
│   │       │       │   ├── classes-direction.scss
│   │       │       │   ├── classes-misc.scss
│   │       │       │   ├── classes-moon-aliases.scss
│   │       │       │   ├── classes-moon.scss
│   │       │       │   ├── classes-neutral.scss
│   │       │       │   ├── classes-night.scss
│   │       │       │   ├── classes-time.scss
│   │       │       │   ├── classes-wind-aliases.scss
│   │       │       │   ├── classes-wind-degrees.scss
│   │       │       │   └── classes-wind.scss
│   │       │       ├── icon-variables
│   │       │       │   ├── variables-beaufort.scss
│   │       │       │   ├── variables-day.scss
│   │       │       │   ├── variables-direction.scss
│   │       │       │   ├── variables-misc.scss
│   │       │       │   ├── variables-moon.scss
│   │       │       │   ├── variables-neutral.scss
│   │       │       │   ├── variables-night.scss
│   │       │       │   ├── variables-time.scss
│   │       │       │   └── variables-wind-names.scss
│   │       │       ├── mappings
│   │       │       │   ├── simpleweather-js.scss
│   │       │       │   ├── wi-forecast-io.scss
│   │       │       │   ├── wi-owm.scss
│   │       │       │   ├── wi-wmo4680.scss
│   │       │       │   ├── wi-wunderground.scss
│   │       │       │   └── wi-yahoo.scss
│   │       │       ├── weather-icons-classes.scss
│   │       │       ├── weather-icons-core.scss
│   │       │       ├── weather-icons-variables.scss
│   │       │       ├── weather-icons-wind.min.scss
│   │       │       ├── weather-icons-wind.scss
│   │       │       ├── weather-icons.min.scss
│   │       │       └── weather-icons.scss
│   │       ├── layouts
│   │       │   ├── _auth.scss
│   │       │   └── _dashboard.scss
│   │       ├── original
│   │       │   ├── _badges.scss
│   │       │   ├── _buttons.scss
│   │       │   ├── _forms.scss
│   │       │   ├── _helpers.scss
│   │       │   ├── _hideShowPassword.scss
│   │       │   ├── _lists.scss
│   │       │   ├── _logs.scss
│   │       │   ├── _margins.scss
│   │       │   ├── _mixins.scss
│   │       │   ├── _modals.scss
│   │       │   ├── _panels.scss
│   │       │   ├── _password.scss
│   │       │   ├── _socials.scss
│   │       │   ├── _typography.scss
│   │       │   ├── _variables.scss
│   │       │   ├── _wells.scss
│   │       │   └── app.scss
│   │       └── partials
│   │           ├── _base.scss
│   │           ├── _demo.scss
│   │           ├── _helpers.scss
│   │           ├── _mixins.scss
│   │           ├── _typography.scss
│   │           └── _variables.scss
│   ├── lang
│   │   └── en
│   │       ├── auth.php
│   │       ├── dialogs.php
│   │       ├── emails.php
│   │       ├── forms.php
│   │       ├── modals.php
│   │       ├── pagination.php
│   │       ├── passwords.php
│   │       ├── permsandroles.php
│   │       ├── profile.php
│   │       ├── socials.php
│   │       ├── themes.php
│   │       ├── titles.php
│   │       ├── usersmanagement.php
│   │       └── validation.php
│   └── views
│       ├── auth
│       │   ├── activation.blade.php
│       │   ├── exceeded.blade.php
│       │   ├── login.blade.php
│       │   ├── passwords
│       │   │   ├── email.blade.php
│       │   │   └── reset.blade.php
│       │   └── register.blade.php
│       ├── cards
│       │   ├── check-list-card.blade.php
│       │   ├── hero-image-card.blade.php
│       │   ├── user-profile-card.blade.php
│       │   └── weather-card.blade.php
│       ├── dialogs
│       │   ├── dialog-delete.blade.php
│       │   ├── dialog-restore.blade.php
│       │   └── dialog-save.blade.php
│       ├── emails
│       │   └── exception.blade.php
│       ├── errors
│       │   ├── 403.blade.php
│       │   ├── 404.blade.php
│       │   ├── 500.blade.php
│       │   ├── 503.blade.php
│       │   └── general.blade.php
│       ├── home.blade.php
│       ├── layouts
│       │   ├── app.blade.php
│       │   ├── auth.blade.php
│       │   └── dashboard.blade.php
│       ├── modals
│       │   ├── modal-delete.blade.php
│       │   ├── modal-form.blade.php
│       │   └── modal-save.blade.php
│       ├── pages
│       │   ├── admin
│       │   │   ├── home.blade.php
│       │   │   ├── php-details.blade.php
│       │   │   └── route-details.blade.php
│       │   ├── status.blade.php
│       │   └── user
│       │       └── home.blade.php
│       ├── panels
│       │   └── welcome-panel.blade.php
│       ├── partials
│       │   ├── account-nav.blade.php
│       │   ├── drawer-nav.blade.php
│       │   ├── errors.blade.php
│       │   ├── form-status-ajax.blade.php
│       │   ├── form-status.blade.php
│       │   ├── header-nav.blade.php
│       │   ├── mdl-filter.blade.php
│       │   ├── mdl-highlighter.blade.php
│       │   ├── mdl-search.blade.php
│       │   ├── mdl-snackbar.blade.php
│       │   ├── nav.blade.php
│       │   ├── search-bar.blade.php
│       │   ├── socials-icons.blade.php
│       │   ├── socials.blade.php
│       │   ├── status-panel.blade.php
│       │   └── status.blade.php
│       ├── profiles
│       │   ├── account.blade.php
│       │   ├── edit.blade.php
│       │   └── show.blade.php
│       ├── scripts
│       │   ├── check-changed.blade.php
│       │   ├── datatables.blade.php
│       │   ├── delete-modal-script.blade.php
│       │   ├── filter-data-script.blade.php
│       │   ├── form-modal-script.blade.php
│       │   ├── gmaps-address-lookup-api3.blade.php
│       │   ├── google-maps-geocode-and-map.blade.php
│       │   ├── highlighter-script.blade.php
│       │   ├── html5-password-match-check.blade.php
│       │   ├── mdl-datatables.blade.php
│       │   ├── mdl-file-upload.blade.php
│       │   ├── mdl-required-input-fix.blade.php
│       │   ├── mdl-save-ajax.blade.php
│       │   ├── mdl-select.blade.php
│       │   ├── mdl-snackbar.blade.php
│       │   ├── save-modal-script.blade.php
│       │   ├── toggleStatus.blade.php
│       │   ├── tooltips.blade.php
│       │   └── weather.blade.php
│       ├── tasks
│       │   ├── create.blade.php
│       │   ├── edit.blade.php
│       │   ├── filtered.blade.php
│       │   ├── index.blade.php
│       │   └── partials
│       │       ├── create-task.blade.php
│       │       ├── edit-task.blade.php
│       │       ├── task-row.blade.php
│       │       └── task-tab.blade.php
│       ├── themesmanagement
│       │   ├── add-theme.blade.php
│       │   ├── edit-theme.blade.php
│       │   ├── show-theme.blade.php
│       │   ├── show-themes.blade.php
│       │   └── template.blade.php
│       ├── usersmanagement
│       │   ├── create-user.blade.php
│       │   ├── edit-user.blade.php
│       │   ├── show-deleted-user.blade.php
│       │   ├── show-deleted-users.blade.php
│       │   ├── show-user.blade.php
│       │   └── show-users.blade.php
│       └── welcome.blade.php
├── routes
│   ├── api.php
│   ├── channels.php
│   ├── console.php
│   └── web.php
├── server.php
└── webpack.mix.js
```

* Tree command can be installed using brew: `brew install tree`
* File tree generated using command `tree -a -I '.git|node_modules|vendor|storage|tests'`

### Laravel References
* http://laravel.com/docs/5.6/authentication
* http://laravel.com/docs/5.6/authorization
* http://laravel.com/docs/5.6/routing
* http://laravel.com/docs/5.6/schema
* https://laravelcollective.com/docs/5.5/html
* http://laravel.com/docs/5.6/authentication
* http://laravel.com/docs/5.6/authorization
* http://laravel.com/docs/5.6/routing

### Opening an Issue
Before opening an issue there are a couple of considerations:
* If you did not **star this repo** *I will close your issue immediatly without consideration.* **My time is valuable**.
* **Read the instructions** and make sure all steps were *followed correctly*.
* **Check** that the issue is not *specific to your development environment* setup.
* **Provide** *duplication steps*.
* **Attempt to look into the issue**, and if you *have a solution, make a pull request*.
* **Show that you have made an attempt** to *look into the issue*.
* **Check** to see if the issue you are *reporting is a duplicate* of a previous reported issue.
* **Following these instructions show me that you have tried.**
* If you have a questions send me an email to jeremykenedy@gmail.com
* Please be considerate that this is an open source project that I provide to the community for FREE when opening an issue.

Open source projects are a the community’s responsibility to use, contribute, and debug.

### Laravel Material Design License
Laravel-material-design is licensed under the [MIT license](https://opensource.org/licenses/MIT). Enjoy!
