<?php

declare(strict_types=1);
<<<<<<< HEAD

/**
=======
use Modules\User\Models\OauthAuthCode;
use Modules\User\Models\OauthClient;
use Modules\User\Models\OauthDeviceCode;
use Modules\User\Models\OauthPersonalAccessClient;
use Modules\User\Models\OauthRefreshToken;
use Modules\User\Models\OauthToken;

/*
>>>>>>> 2024e2e7 (.)
 * Configurazione Laravel Passport per il modulo User.
 *
 * Questa configurazione centralizza tutte le impostazioni di Passport,
 * permettendo una gestione semplice e coerente dell'autenticazione OAuth2.
 */
return [
    /*
    |--------------------------------------------------------------------------
    | Token Expiration
    |--------------------------------------------------------------------------
    |
    | Configurazione delle scadenze dei token OAuth2.
    | I valori sono in giorni o mesi (usando CarbonInterval).
    |
    */
    'tokens' => [
<<<<<<< HEAD
        'access_token' => env('PASSPORT_ACCESS_TOKEN_EXPIRATION_DAYS', 15),
        'refresh_token' => env('PASSPORT_REFRESH_TOKEN_EXPIRATION_DAYS', 30),
        'personal_access_token' => env('PASSPORT_PERSONAL_ACCESS_TOKEN_EXPIRATION_MONTHS', 6),
=======
        'access_token' => 15,
        'refresh_token' => 30,
        'personal_access_token' => 6,
>>>>>>> 2024e2e7 (.)
    ],

    /*
    |--------------------------------------------------------------------------
    | OAuth Scopes
    |--------------------------------------------------------------------------
    |
    | Definizione degli scope OAuth2 disponibili.
    | Ogni scope ha una descrizione che viene mostrata durante l'autorizzazione.
    |
    */
    'scopes' => [
        'view-user' => 'View user information',
        'core-technicians' => 'Access to core technician features',
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Grant
    |--------------------------------------------------------------------------
    |
    | Abilita il password grant (username/password) per OAuth2.
    | Utile per applicazioni mobile o SPA che necessitano di autenticazione diretta.
    |
    */
<<<<<<< HEAD
    'enable_password_grant' => env('PASSPORT_ENABLE_PASSWORD_GRANT', true),
=======
    'enable_password_grant' => true,
>>>>>>> 2024e2e7 (.)

    /*
    |--------------------------------------------------------------------------
    | Routes
    |--------------------------------------------------------------------------
    |
    | Configurazione delle rotte Passport.
    | Se false, le rotte non vengono registrate automaticamente.
    |
    */
<<<<<<< HEAD
    'register_routes' => env('PASSPORT_REGISTER_ROUTES', true),
=======
    'register_routes' => true,
>>>>>>> 2024e2e7 (.)

    /*
    |--------------------------------------------------------------------------
    | Client Model Configuration
    |--------------------------------------------------------------------------
    |
    | Configurazione del modello Client personalizzato.
    |
    */
<<<<<<< HEAD
    'client_model' => Modules\User\Models\OauthClient::class,
=======
    'client_model' => OauthClient::class,
>>>>>>> 2024e2e7 (.)

    /*
    |--------------------------------------------------------------------------
    | Token Model Configuration
    |--------------------------------------------------------------------------
    |
    | Configurazione dei modelli token personalizzati.
    |
    */
    'models' => [
<<<<<<< HEAD
        'token' => Modules\User\Models\OauthToken::class,
        'refresh_token' => Modules\User\Models\OauthRefreshToken::class,
        'auth_code' => Modules\User\Models\OauthAuthCode::class,
        'personal_access_client' => Modules\User\Models\OauthPersonalAccessClient::class,
        'device_code' => Modules\User\Models\OauthDeviceCode::class,
=======
        'token' => OauthToken::class,
        'refresh_token' => OauthRefreshToken::class,
        'auth_code' => OauthAuthCode::class,
        'personal_access_client' => OauthPersonalAccessClient::class,
        'device_code' => OauthDeviceCode::class,
>>>>>>> 2024e2e7 (.)
    ],
];
