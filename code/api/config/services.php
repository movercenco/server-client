<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => '36100f27bcbf22bed183bd57ca8f9140daa45f9b',
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('APP_ENV') == 'production' ? '' : '',
        'secret' => env('APP_ENV') == 'production' ? '' : '',
    ],

    'facebook' => [
        'client_id' => '',
        'client_secret' => '',
        'redirect' => '',
    ],
];
