<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default User
    |--------------------------------------------------------------------------
    |
    | This option defines the default user that will be used when seeding
    | Filament and will be used to automatically authenticate the
    | Filament admin panel.
    |
    */

    'user' => [
        'email' => env('FILAMENT_USER_EMAIL', 'admin@gmail.com'),
        'password' => env('FILAMENT_USER_PASSWORD', 'password'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Route Settings
    |--------------------------------------------------------------------------
    |
    | This option defines how routes is handled in your app. By default,
    | route for page and post is handled by the package. If you have
    | base route '/' defined in your app, set this to false and
    | copy the following route to your app's route file.
    | Route::get('{slug}', \Hasnayeen\BladeSsg\Http\Controllers\PageController::class)->where('slug', '.*');
    |
    */

    'handle_routes' => true,

    /*
    |--------------------------------------------------------------------------
    | Templates
    |--------------------------------------------------------------------------
    |
    | This option defines the default template that will be used when creating
    | new pages and posts in your site as well as the templates that will
    | be available to choose from when creating new pages and posts.
    |
    */

    'default_template' => 'docs',

    'templates' => [
        'docs' => [
            'name' => 'Documentation',
            'view' => 'blade-ssg::templates.docs',
        ],
        'blog' => [
            'name' => 'Blog',
            'view' => 'blade-ssg::templates.blog',
        ],
    ],

];
