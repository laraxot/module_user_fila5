<?php

declare(strict_types=1);

return [
    'name' => 'User',
    'description' => 'Modulo per la gestione degli utenti e autorizzazioni',
<<<<<<< HEAD
<<<<<<< HEAD
    'icon' => 'heroicon-o-users',
=======
    'icon' => 'user-icon',
>>>>>>> 2024e2e7 (.)
=======
    'icon' => 'user-icon',
>>>>>>> f589f9b2 (.)
    'navigation' => [
        'enabled' => true,
        'sort' => 100,
    ],
<<<<<<< HEAD
<<<<<<< HEAD
    'routes' => [
        'enabled' => true,
        'middleware' => ['web', 'auth'],
    ],
    'providers' => [
        'Modules\\User\\Providers\\UserServiceProvider',
    ],
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
];
