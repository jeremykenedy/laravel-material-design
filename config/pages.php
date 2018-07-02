<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Front End Application Name
    |--------------------------------------------------------------------------
    */
    'name' => env('FRONT_END_APP_NAME', config('app.name')),

    /*
    |--------------------------------------------------------------------------
    | Default entry for front end HTML attribute `title`
    |--------------------------------------------------------------------------
    */
    'title' => env('FRONT_END_PAGE_DEFAULT_TITLE', 'Laravel Material Design'),

    /*
    |--------------------------------------------------------------------------
    | Default entry for front end HTML accessible variable `subtitle`
    |--------------------------------------------------------------------------
    */
    'subtitle' => env('FRONT_END_PAGE_DEFAULT_SUBTITLE', ''),

    /*
    |--------------------------------------------------------------------------
    | Default entry for front end HTML attribute `subtitle`
    |--------------------------------------------------------------------------
    */
    'description' => env('FRONT_END_PAGE_DEFAULT_DESCRIPTION', ''),

    /*
    |--------------------------------------------------------------------------
    | Default entry for front end HTML attribute `author`
    |--------------------------------------------------------------------------
    */
    'author' => env('FRONT_END_PAGE_DEFAULT_AUTHOR', 'Jeremy Kenedy'),

    /*
    |--------------------------------------------------------------------------
    | Default entry for front end HTML accessible variable `subtitle`
    |--------------------------------------------------------------------------
    */
    'page_image' => env('FRONT_END_PAGE_DEFAULT_IMAGE', '/backgrounds/default-home-bg.jpg'),

    /*
    |--------------------------------------------------------------------------
    | Default entry for pagination of returning pages in results
    |--------------------------------------------------------------------------
    */
    'pages_per_page' => env('FRONT_END_PAGE_DEFAULT_PAGES_PER_PAGE', 10),

    /*
    |--------------------------------------------------------------------------
    | Default entry for the RSS size feed of the front end pages
    |--------------------------------------------------------------------------
    */
    'rss_size' => env('FRONT_END_PAGE_DEFAULT_RSS_SIZE', 25),

    /*
    |--------------------------------------------------------------------------
    | Default entry for the front ends contact email address
    |--------------------------------------------------------------------------
    */
    'contact_email' => env('FRONT_END_PAGE_DEFAULT_CONTACT_EMAIL', env('MAIL_FROM_ADDRESS')),

    /*
    |--------------------------------------------------------------------------
    | Default entry for where the front end uploads are going to go/live.
    |--------------------------------------------------------------------------
    */
    'uploads' => [
        'storage'   => env('FRONT_END_UPLOADS_ENVIRONMENT'),
        'webpath'   => env('FRONT_END_UPLOADS_WEBPATH'),
    ],
];


