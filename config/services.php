<?php
/*$url = url('auth/google/callback');
$furl = url('auth/facebook/callback');
*/
return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],


    'google' => [
        'client_id' => '735653734314-rc4uo11km31gqj3d7oadtnuhp51rn129.apps.googleusercontent.com',
        'client_secret' => 'FK3M5aTRQBKfejQDu8p2A0LZ',
        'redirect' => 'https://webb4biz.space/AAAFood/public/auth/google/callback',
    ],
    'facebook' => [
        'client_id' => '647024532929402',
        'client_secret' => 'e6d32fc6e13f6c9a94a7afac5ac0dbd4',
        'redirect' => 'https://webb4biz.space/AAAFood/public/auth/facebook/callback',
    ],

];
