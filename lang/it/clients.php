<?php

declare(strict_types=1);

return [
    'fields' => [
<<<<<<< HEAD
<<<<<<< HEAD
        'name' => [
            'label' => 'name',
        ],
=======
        'name' => ['label' => 'name', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'id' => ['label' => 'id'],
        'user_id' => ['label' => 'user_id'],
        'provider' => ['label' => 'provider'],
        'redirect' => ['label' => 'redirect'],
        'personal_access_client' => ['label' => 'personal_access_client'],
        'password_client' => ['label' => 'password_client'],
        'revoked' => ['label' => 'revoked'],
        'created_at' => ['label' => 'created_at'],
        'updated_at' => ['label' => 'updated_at'],
=======
        'name' => [
            'label' => 'name',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
>>>>>>> f589f9b2 (.)
    ],
    'navigation' => [
        'name' => 'Clients',
        'plural' => 'Clients',
<<<<<<< HEAD
        'group' => ['name' => 'General', 'description' => 'General Settings'],
=======
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
>>>>>>> f589f9b2 (.)
        'label' => 'Clients',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
    ],
    'label' => 'Clients',
    'plural_label' => 'Clients (Plurale)',
    'actions' => [
<<<<<<< HEAD
        'create' => ['label' => 'Crea Clients', 'icon' => 'create', 'tooltip' => 'create'],
        'edit' => ['label' => 'Modifica Clients'],
        'delete' => ['label' => 'Elimina Clients'],
>>>>>>> 2024e2e7 (.)
=======
        'create' => [
            'label' => 'Crea Clients',
        ],
        'edit' => [
            'label' => 'Modifica Clients',
        ],
        'delete' => [
            'label' => 'Elimina Clients',
        ],
>>>>>>> f589f9b2 (.)
    ],
];
