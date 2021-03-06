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

    'google' => [
        'client_id' => ('231346323903-sbeltsl0bceb5p5ap415cvpesgtohmdg.apps.googleusercontent.com'),
        'client_secret' => ('LoubT43tlzCkMPenq03qRo8H'),
        'redirect' => 'https://mego-backend.herokuapp.com/api/login/google/callback',
    ],

    // 'google' => [
    //     'client_id' => ('231346323903-7mqb9bnhpv256sqn19lm5qmlvbuigcu1.apps.googleusercontent.com'),
    //     'client_secret' => ('8CPfNXzEXeE_B-zTDYRSlwMa'),
    //     'redirect' => 'http://localhost:8000/api/login/google/callback',
    // ],
];