<?php

declare(strict_types=1);

use Modules\User\Models\User;

// config for DutchCodingCompany/FilamentSocialite
return [
    // Allow login, and registration if enabled, for users with an email for one of the following domains.
    // All domains allowed by default
    // Only use lower case
    'domain_allowlist' => [],
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> 2024e2e7 (.)
=======

>>>>>>> f589f9b2 (.)
    // Allow registration through socials
    'registration' => true,
    // Specify the providers that should be visible on the login.
    // These should match the socialite providers you have setup in your services.php config.
    // Uses blade UI icons, for example: https://github.com/owenvoke/blade-fontawesome
    'providers' => [
        /*
         * 'gitlab' => [
         * 'label' => 'GitLab',
         * 'icon' => 'fab-gitlab',
         * ],
         * 'github' => [
         * 'label' => 'GitHub',
         * 'icon' => 'fab-github',
         * ],
         */
        'auth0' => [
            'label' => 'Auth0',
            'icon' => 'heroicon-o-star',
        ],
    ],
<<<<<<< HEAD
<<<<<<< HEAD
    'user_model' => User::class,
    // Specify the default redirect route for successful logins
    'login_redirect_route' => 'filament.pages.dashboard',
=======
=======
>>>>>>> f589f9b2 (.)

    'user_model' => User::class,

    // Specify the default redirect route for successful logins
    'login_redirect_route' => 'filament.pages.dashboard',

<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    // Specify the route name for the socialite login page
    'login_page_route' => 'filament.auth.login',
    // Should the user stay logged in?
    'remember_login' => false,
];
