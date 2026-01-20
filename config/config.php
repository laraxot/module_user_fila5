<?php

declare(strict_types=1);

return [
    'name' => 'User',
    'description' => 'Modulo per la gestione degli utenti e autorizzazioni',
<<<<<<< HEAD
    'icon' => 'user-icon',
=======
    'icon' => 'heroicon-o-users',
>>>>>>> f548be94 (.)
    'navigation' => [
        'enabled' => true,
        'sort' => 100,
    ],
<<<<<<< HEAD
=======
    'routes' => [
        'enabled' => true,
        'middleware' => ['web', 'auth'],
    ],
    'providers' => [
        'Modules\\User\\Providers\\UserServiceProvider',
    ],
>>>>>>> f548be94 (.)
];
