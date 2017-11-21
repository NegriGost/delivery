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
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'google' => [
        'client_id' => '295158956739-e343goimsi8inmk1t0kejh133jpob05r.apps.googleusercontent.com',         // Your GitHub Client ID
        'client_secret' => 'PAvEeOJhMuQ0pmpM8ixZwTRi', // Your GitHub Client Secret
        'redirect' => 'http://swakuda.delivery.com/login/google/callback',
    ],

     'facebook' => [
        'client_id' => '1895387320681799',         // Your GitHub Client ID
        'client_secret' => 'f390c11dcabb68e8c385b2acc17ff235', // Your GitHub Client Secret
        'redirect' => 'http://swakuda.delivery.com/login/facebook/callback',
    ],

     'linkedin' => [
        'client_id' => '864atanh4re411',         // Your GitHub Client ID
        'client_secret' => 'AqcMAxw0wUKAfDFs', // Your GitHub Client Secret
        'redirect' => 'http://swakuda.delivery.com/login/linkedin/callback',
    ],

     'twitter' => [
        'client_id' => 'gCIDHO2LKsZ8m22eWAxspcIM4',         // Your GitHub Client ID
        'client_secret' => 'l1MFKIWayKxY9DdztI07UzaNnw5sydZWI6spVuJJA0406UhGSp', // Your GitHub Client Secret
        'redirect' => 'http://swakuda.delivery.com/login/twitter/callback',
    ],



];
