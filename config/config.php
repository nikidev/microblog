<?php

/*
    |--------------------------------------------------------------------------
    | Configuration and  Database Connection
    |--------------------------------------------------------------------------
    |
    | This is the configuration file which provides the settings for Slim.
    | Please, use the .env.example file to configure the application.
    |
*/

return [
    'settings'=> [
        'displayErrorDetails' => (bool)getenv('DISPLAY_ERRORS'),
        'db' => [
            'driver' => 'mysql',
            'host' => getenv('DB_HOST'),
            'port'=> getenv('DB_PORT'),
            'database' => getenv('DB_DATABASE'),
            'username' => getenv('DB_USERNAME'),
            'password' => getenv('DB_PASSWORD'),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]
    ],
];