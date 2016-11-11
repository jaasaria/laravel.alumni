<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
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
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => iloilofinest\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '690134434476299',
        'client_secret' => 'd69dcfbea30ebd771599bde9006db7ea',
        'redirect' => 'http://localhost:8000/auth/callback/facebook',
    ],
    'twitter' => [
        'client_id' => 'nTASTqqMJ4FsJZXp1v2kHXqvz',
        'client_secret' => 'ELDm3evaUDjEobPrBbvHtBEML8BzDaKzsVBn0F5yCIzx3tAmC1',
        'redirect' => 'http://localhost:8000/auth/callback/twitter',
    ],


];
