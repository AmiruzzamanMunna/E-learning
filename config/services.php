<?php

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
    'facebook' => [
        'client_id' => ('352382375780830'),
        'client_secret' => ('593841d17a069cc657ab30d298ab0166'),
        'redirect' => 'https://elearning.itclanhost.com/login/facebook/callback',
    ],
    'twitter' => [
        'client_id' => ('GNYyEdUxNUeFFA52GIothSBNW'),
        'client_secret' => ('OFqLqLPr1iTtcjW8vFg459c2ZotGS9COMcnVUNiphMQKq9OkqD'),
        'redirect' => 'http://localhost/learning/login/twitter/callback',
    ],
    'linkedin' => [
        'client_id' => ('86lbu6k8ayjpoh'),
        'client_secret' => ('POGpTyj6AqGdJGI1'),
        'redirect' => 'http://localhost/learning/login/linkedin/callback',
    ],
    'instagram' => [
        'client_id' => ('741187006677761'),
        'client_secret' => ('43878a76feaa11e1f11fb5dcce63b9ce'),
        'redirect' => 'http://localhost/learning/login/instagram/callback',
    ],

];
