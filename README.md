### Laravel Material Admin is a Complete Build of Laravel 5.2 with FULL Email and Social Authentication - WORKING - NOT READY FOR USE. [![License](http://jeremykenedy.com/license-mit.svg)]()

Laravel 5.2 with user authentication, registration with email confirmation, social media authentication, password recovery, and captcha protection. This also makes full use of Controllers for the routes, templates for the views, and makes use of middleware for routing. Quick setup, can be done in 5 minutes. It will take longer to obtain your Facebook, Twitter, and Google Plus API Keys than it will to set this up.

###### A [Laravel](http://laravel.com/) 5.2.x with [Material Design Lite](https://getmdl.io/) 1.1.3 project.
| Laravel Material Admin Features  |
| :------------ |
|Built on [Laravel](http://laravel.com/) 5.2 and [Material Design Lite](https://getmdl.io/) 1.1.3|
|Uses [MySQL](https://github.com/mysql) Database and include migrations and seeds|
|Uses [Artisan](http://laravel.com/docs/5.2/artisan) to manage database migration, schema creations, and create/publish page controller templates|
|Dependencies are managed with [COMPOSER](https://getcomposer.org/)|
|Laravel Scaffolding **User** and **Administrator Authentication**|
|User Socialite Logins ready to go - See API list used below|
|Google Maps API v3 for User Location lookup and Geocoding|
|CRUD (Create, Read, Update, Delete) User Management|
|Google Captcha Protection with Google API|
|User Registration with email verification|
|Capture IP to users table upon signup|
|User Password Reset via Email Token|
|User Login with remember password|
|User roles implementation|
|Eloquent user profiles|
|Custom 404 Page|

### Quick Project Setup
###### (Not including the dev environment)
1. Run `sudo git clone https://github.com/jeremykenedy/laravel-material-admin.git laravel-material-admin`
2. Create a MySQL database for the project
    * ```mysql -u root -p```, if using Vagrant: ```mysql -u homestead -psecret```
    * ```create database laravel_material;```
    * ```\q```
3. From the projects root run `cp .env.example .env`
4. Configure your `.env` file // NOTE: Google API Key will prevent maps error
5. Run `sudo composer update` from the projects root folder
6. From the projects root folder run `sudo chmod -R 755 ../laravel-material-admin`
7. From the projects root folder run `sudo php artisan key:generate`
8. From the projects root folder run `sudo php artisan migrate`
9. From the projects root folder run `sudo composer dump-autoload`
10. From the projects root folder run `sudo php artisan db:seed`

###### Seeds
1. Seeded Roles
   * user
   * editor
   * administrator

And thats it with the caveat of setting up and configuring your development environemnt. I recommend [VAGRANT](https://docs.vagrantup.com/v2/getting-started/) or the Laravel configured instance of Vagrant called [HOMESTEAD](http://laravel.com/docs/5.1/homestead).

### laravel-material-admin URL's (routes)
* ```/```
* ```/auth/login```
* ```/auth/logout```
* ```/auth/register```
* ```/password/email```

### laravel-material-admin Alias Redirect URL's (routes)
* ```/home```
* ```/reset```
* ```/login```
* ```/logout```
* ```/register```

### laravel-material-admin Profile Routes
* ```/profile/{username}```
* ```/profile/{username}/edit``` <- Editing in this view is limited to current user only.

### laravel-material-admin Admin Routes
* ```/users```
* ```/users/create```
* ```/users{user_id}```
* ```/users{user_id}/edit```

### Get Socialite Login API Keys:
* [Google Captcha API](https://www.google.com/recaptcha/admin#list)
* [Facebook API](https://developers.facebook.com/)
* [Twitter API](https://apps.twitter.com/)
* [Google &plus; API](https://console.developers.google.com/)
* [GitHub API](https://github.com/settings/applications/new)
* [YouTube API](https://developers.google.com/youtube/v3/getting-started)
* [Twitch TV API](http://www.twitch.tv/kraken/oauth2/clients/new)
* [Instagram API](https://instagram.com/developer/register/)
* [37 Signals API](https://github.com/basecamp/basecamp-classic-api)

### Other API keys
* [Google Maps API v3 Key](https://developers.google.com/maps/documentation/javascript/get-api-key#get-an-api-key)

### Add More Socialite Logins
* See full list of providers: [http://socialiteproviders.github.io](http://socialiteproviders.github.io/#providers)
###### **Steps**:
  1. Go to [http://socialiteproviders.github.io](http://socialiteproviders.github.io/providers/twitch/) and select the provider to be added.
  2. From the projects root folder in terminal run compser command to get the needed package.
     * Example:
      ```
         composer require socialiteproviders/twitch
      ```
  3. From the projects root folder run ```composer update```
  4. Add the service provider to ```/app/services.php```
     * Example:
     ```
   	'twitch' => [
   	    'client_id' 	=> env('TWITCH_KEY'),
   	    'client_secret' => env('TWITCH_SECRET'),
   	    'redirect' 		=> env('TWITCH_REDIRECT_URI'),
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
         * Use Laravel HTML Facade (recommended)
      ```

         {!! HTML::link(route('social.redirect', ['provider' => 'twitch']), 'Twitch', array('class' => 'btn btn-lg btn-primary btn-block twitch')) !!}

      ```

--

## Environment File

Example `.env` file:
```
APP_ENV=local
APP_KEY=SomeRandomString
APP_DEBUG=true
APP_LOG_LEVEL=debug
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravelAuth
DB_USERNAME=homestead
DB_PASSWORD=secret

CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=YOURGMAILusernameHERE
MAIL_PASSWORD=YOURGMAILpasswordHERE
MAIL_ENCRYPTION=tls

# https://www.google.com/recaptcha/admin#list
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

# https://console.developers.google.com/ - NEED OAUTH CREDS
GOOGLE_ID=YOURGOOGLEPLUSidHERE
GOOGLE_SECRET=YOURGOOGLEPLUSsecretHERE
GOOGLE_REDIRECT=http://yourwebsiteURLhere.com/social/handle/google

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
TWITCH_REDIRECT_URI=http://laravel-material-admin.local/social/handle/twitch

# https://instagram.com/developer/register/
INSTAGRAM_KEY=YOURKEYHERE
INSTAGRAM_SECRET=YOURSECRETHERE
INSTAGRAM_REDIRECT_URI=http://laravel-material-admin.local/social/handle/instagram

# https://basecamp.com/
# https://github.com/basecamp/basecamp-classic-api
37SIGNALS_KEY=YOURKEYHERE
37SIGNALS_SECRET=YOURSECRETHERE
37SIGNALS_REDIRECT_URI=http://laravel-material-admin.local/social/handle/37signals

// NOTE: YOU CAN REMOVE THE KEY CALL IN app.blade.php IF YOU GET A POP UP AND DO NOT WANT TO SETUP A KEY FOR DEV
# Google Maps API v3 Key - https://developers.google.com/maps/documentation/javascript/get-api-key#get-an-api-key
GOOGLEMAPS_API_KEY=YOURGOOGLEMAPSkeyHERE
```

### File Structure of Common Used Files
```
laravel-material-admin/
    ├── .env.example
    ├── .gitattributes
    ├── .gitignore
    ├── artisan
    ├── composer.json
    ├── gulpfile.js
    ├── LICENSE
    ├── package.json
    ├── phpspec.yml
    ├── phpunit.xml
    ├── README.md
    ├── server.php
    ├── app/
    │   ├── Http/
    │   │  ├── kernal.php
    │   │  ├── routes.php
    │   │  ├── Controllers/
    │   │  │   ├── Auth/
    │   │  │   │   ├── AuthController.php
    │   │  │   │   └── PasswordController.php
    │   │  │   ├── Controller.php
    │   │  │   ├── HomeController.php
    │   │  │   ├── ProfilesController.php
    │   │  │   ├── UserController.php
    │   │  │   ├── UsersManagementController.php
    │   │  │   └── WelcomeController.php
    │   │  ├── Middleware/
    │   │  │   ├── Administrator.php
    │   │  │   ├── Authenticate.php
    │   │  │   ├── CheckCurrentUser.php
    │   │  │   ├── Editor.php
    │   │  │   ├── EncryptCookies.php
    │   │  │   ├── RedirectAuthenticated.php
    │   │  │   └── VerifyCsrfToken.php
    │   │  └── Requests/
    │   │      └── Request.php
    │   ├── Logic/
    │   │   ├── macros.php
    │   │   ├── Mailers/
    │   │   │   ├── Mailer.php
    │   │   │   └── UserMailer.php
    │   │   └── User/
    │   │       ├── CaptureIp.php
    │   │       └── UserRepository.php
    │   ├── Models/
    │   │   ├── Password.php
    │   │   ├── Profile.php
    │   │   ├── Role.php
    │   │   ├── Social.php
    │   │   └── User.php
    │   ├── Providers/
    │   │   ├── AppServiceProvider.php
    │   │   ├── BusServiceProvider.php
    │   │   ├── ConfigServiceProvider.php
    │   │   ├── EventServiceProvider.php
    │   │   ├── MacroServiceProvider.php
    │   │   └── RouteServiceProvider.php
    │   ├── Services/
    │   │   └── Registrar.php
    │   └── Traits/
    │       └── CaptchaTrait.php
    ├── config/
    │   ├── app.php
    │   ├── auth.php
    │   ├── cache.php
    │   ├── compile.php
    │   ├── database.php
    │   ├── filesystems.php
    │   ├── mail.php
    │   ├── queue.php
    │   ├── services.php
    │   ├── session.php
    │   └── view.php
    ├── database/
    │   ├── migrations/
    │   │   ├── 2014_10_12_000000_create_users_table.php
    │   │   ├── 2014_10_12_100000_create_password_resets_table.php
    │   │   ├── 2015_05_15_124334_update_users_table.php
    │   │   ├── 2015_10_21_173121_create_users_roles.php
    │   │   ├── 2015_10_21_173333_create_user_role.php
    │   │   ├── 2015_10_21_173520_create_social_logins.php
    │   │   ├── 2015_11_02_004932_create_profiles_table.php
    │   │   ├── 2015_12_25_010553_add_signup_ip_address_to_users_table.php
    │   │   ├── 2015_12_25_011117_add_signup_confirmation_ip_address_to_users_table.php
    │   │   ├── 2015_12_25_025231_add_signup_sm_ip_address_to_users_table.php
    │   │   └── 2016_04_19_045644_add_signup_admin_ip_address_to_users_table.php
    │   └── seeds/
    │       ├── DatabaseSeeder.php
    │       └── SeedRoles.php
    ├── public/
    │   ├── .htaccess
    │   ├── index.php
    │   ├── robots.txt
    │   └── assets/
    │       ├── css/
    │       ├── fonts/
    │       └── ~~js/~~
    ├── resources/
    │   ├── assets/
    │   │   └── Less/
    │   │       ├── bootstrap/
    │   │       └── app.less
    │   ├── lang/
    │   │   └── en/
    │   │       ├── auth.php
    │   │       ├── emails.php
    │   │       ├── forms.php
    │   │       ├── links-and-buttons.php
    │   │       ├── modals.php
    │   │       ├── pagination.php
    │   │       ├── passwords.php
    │   │       ├── profile.php
    │   │       ├── titles.php
    │   │       └── validation.php
    │   └── views/
    │       ├── app.blade.php
    │       ├── welcome.blade.php
    │       ├── admin/
    │       │   ├── create-user.blade.php
    │       │   ├── edit-user.blade.php
    │       │   ├── edit-users.blade.php
    │       │   ├── show-user.blade.php
    │       │   └── show-users.blade.php
    │       ├── auth/
    │       │   ├── activateAccount.blade.php
    │       │   ├── guest_activate.blade.php
    │       │   ├── login.blade.php
    │       │   ├── password.blade.php
    │       │   ├── register.blade.php
    │       │   ├── reset.blade.php
    │       │   └── tooManyEmails.blade.php
    │       ├── emails/
    │       │   ├── activateAccount.blade.php
    │       │   └── password.blade.php
    │       ├── errors/
    │       │   ├── 403.blade.php
    │       │   ├── 404.blade.php
    │       │   └── 503.blade.php
    │       ├── modals/
    │       │   ├── modal-delete.blade.php
    │       │   └── modal-save.blade.php
    │       ├── pages/
    │       │   ├── home.blade.php
    │       │   └── status.blade.php
    │       ├── partials
    │       │   ├── form-status.blade.php
    │       │   └── nav.blade.php
    │       ├── profiles
    │       │   ├── edit.blade.php
    │       │   └── show.blade.php
    │       └── scripts
    │           ├── delete-modal-script.blade.php
    │           ├── gmaps-address-lookup-api3.blade.php
    │           ├── google-maps-geocode-and-map.blade.php
    │           └── save-modal-script.blade.php
    ├── storage/
    ├── tests/
    └── vendor/
```

---

#### Laravel Developement Packages Used References
* http://laravel.com/docs/5.1/authentication
* http://laravel.com/docs/5.1/authorization
* http://laravel.com/docs/5.1/routing
* http://laravel.com/docs/5.0/schema

---

###### Updates:
*

---

### [Laravel](http://laravel.com/) PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.png)](https://travis-ci.org/laravel/framework) [![Latest Stable Version](https://poser.pugx.org/laravel/framework/version.png)](https://packagist.org/packages/laravel/framework) [![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.png)](https://packagist.org/packages/laravel/framework) [![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, and caching.

Laravel aims to make the development process a pleasing one for the developer without sacrificing application functionality. Happy developers make the best code. To this end, we've attempted to combine the very best of what we have seen in other web frameworks, including frameworks implemented in other languages, such as Ruby on Rails, ASP.NET MVC, and Sinatra.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

### Official Laravel Documentation

Documentation for the entire framework can be found on the [Laravel website](http://laravel.com/docs).

### Contributing To Laravel

**All Laravel Framework related issues and pull requests should be filed on the [laravel/framework](http://github.com/laravel/framework) repository.**

### Laravel License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

---

### [Material Design Lite](https://getmdl.io/) Front-End Framework

[![GitHub version](https://badge.fury.io/gh/google%2Fmaterial-design-lite.svg)](https://badge.fury.io/gh/google%2Fmaterial-design-lite)
[![npm version](https://badge.fury.io/js/material-design-lite.svg)](https://badge.fury.io/js/material-design-lite)
[![Bower version](https://badge.fury.io/bo/material-design-lite.svg)](https://badge.fury.io/bo/material-design-lite)
[![Dependency Status](https://david-dm.org/google/material-design-lite.svg)](https://david-dm.org/google/material-design-lite)

> An implementation of [Material Design](http://www.google.com/design/spec/material-design/introduction.html)
components in vanilla CSS, JS, and HTML.

Material Design Lite (MDL) lets you add a Material Design look and feel to your
static content websites. It doesn't rely on any JavaScript frameworks or
libraries. Optimized for cross-device use, gracefully degrades in older
browsers, and offers an experience that is accessible from the get-go.

---

## Dependencies

### COMPOSER
#### COMPOSER can be installed using the following commands:
```
sudo curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
```

#### COMPOSER on MAC OS X can be installed using the following commands:
```
sudo brew update
sudo brew tap homebrew/dupes
sudo brew tap homebrew/php
sudo brew install composer
```

---

## Enjoy

###### ~ **Jeremy**
