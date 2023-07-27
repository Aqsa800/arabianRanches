<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been set up for each driver as an example of the required values.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'media' => [
            'driver' => 'local',
            'root' => public_path('uploads/frontend'),
            'url' => env('APP_URL').'/uploads/frontend',
            'visibility' => 'public',
        ],
        'floorPlanFiles'=>[
            'driver' => 'local',
            'root'   => public_path('uploads/frontend/floorPlans'),
            'url'        => env('APP_URL') . '/uploads/frontend/floorPlans',
            'visibility' => 'public'
        ],
        'partnerFiles'=>[
            'driver' => 'local',
            'root'   => public_path('uploads/frontend/partners'),
            'url'        => env('APP_URL') . '/uploads/frontend/partners',
            'visibility' => 'public'
        ],
        'pageContentFiles'=> [
            'driver' => 'local',
            'root'   => public_path('uploads/frontend/contents'),
            'url'        => env('APP_URL') . '/uploads/frontend/contents',
            'visibility' => 'public'
        ],
        'bannerFiles' => [
            'driver' => 'local',
            'root'   => public_path('uploads/frontend/banners'),
            'url'        => env('APP_URL') . '/uploads/frontend/banners',
            'visibility' => 'public'
        ],
        'agentFiles' => [
            'driver' => 'local',
            'root'   => public_path('uploads/frontend/agents'),
            'url'        => env('APP_URL') . '/uploads/frontend/agents',
            'visibility' => 'public'
        ],
        'awardFiles' => [
            'driver' => 'local',
            'root'   => public_path('uploads/frontend/awards'),
            'url'        => env('APP_URL') . '/uploads/frontend/awards',
            'visibility' => 'public'
        ],
        'developerFiles' => [
            'driver' => 'local',
            'root'   => public_path('uploads/frontend/developers'),
            'url'        => env('APP_URL') . '/uploads/frontend/developers',
            'visibility' => 'public'
        ],
        'commnityFiles' => [
            'driver' => 'local',
            'root'   => public_path('uploads/frontend/commnities'),
            'url'        => env('APP_URL') . '/uploads/frontend/commnities',
            'visibility' => 'public'
        ],
        'projectFiles' => [
            'driver' => 'local',
            'root'   => public_path('uploads/frontend/projects'),
            'url'        => env('APP_URL') . '/uploads/frontend/projects',
            'visibility' => 'public'
        ],
        'propertyFiles' => [
            'driver' => 'local',
            'root'   => public_path('uploads/frontend/properties'),
            'url'        => env('APP_URL') . '/uploads/frontend/properties',
            'visibility' => 'public'
        ],
        'amenityFiles' => [
            'driver' => 'local',
            'root'   => public_path('uploads/frontend/amenities'),
            'url'        => env('APP_URL') . '/uploads/frontend/amenities',
            'visibility' => 'public'
        ],
        'articleFiles' => [
            'driver' => 'local',
            'root'   => public_path('uploads/frontend/articles'),
            'url'        => env('APP_URL') . '/uploads/frontend/articles',
            'visibility' => 'public'
        ],
        'serviceFiles' => [
            'driver' => 'local',
            'root'   => public_path('uploads/frontend/services'),
            'url'        => env('APP_URL') . '/uploads/frontend/services',
            'visibility' => 'public'
        ],
        'testimonialFiles' => [
            'driver' => 'local',
            'root'   => public_path('uploads/frontend/testimonials'),
            'url'        => env('APP_URL') . '/uploads/frontend/testimonials',
            'visibility' => 'public'
        ],
        'careerFiles' => [
            'driver' => 'local',
            'root'   => public_path('uploads/frontend/careers'),
            'url'        => env('APP_URL') . '/uploads/frontend/careers',
            'visibility' => 'public'
        ],
        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'throw' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
            'throw' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
