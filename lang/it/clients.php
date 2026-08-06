<?php

declare(strict_types=1);

return [
    'fields' => [
<<<<<<< HEAD
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
>>>>>>> laraxot/dev
    ],
    'navigation' => [
        'name' => 'Clients',
        'plural' => 'Clients',
<<<<<<< HEAD
        'group' => ['name' => 'OAuth', 'description' => 'Client, token e API Passport'],
        'label' => 'Clients',
        'sort' => 1,
        'icon' => 'heroicon-o-rectangle-stack',
=======
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Clients',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
>>>>>>> laraxot/dev
    ],
    'label' => 'Clients',
    'plural_label' => 'Clients (Plurale)',
    'actions' => [
<<<<<<< HEAD
        'create' => ['label' => 'Crea Clients'],
        'edit' => ['label' => 'Modifica Clients'],
        'delete' => ['label' => 'Elimina Clients'],
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
>>>>>>> laraxot/dev
    ],
];
