<?php

declare(strict_types=1);

return [
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> f589f9b2 (.)
    'navigation' => [
        'label' => 'Team Invitations',
        'group' => 'Teams',
        'icon' => 'heroicon-o-envelope',
        'sort' => 34,
    ],
    'label' => 'Team Invitation',
    'plural_label' => 'Team Invitation (Plurale)',
    'fields' => [
        'id' => [
            'label' => 'Identificativo',
            'tooltip' => 'Identificativo univoco del record',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'Data Creazione',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'updated_at' => [
            'label' => 'Ultima Modifica',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'actions' => [
        'create' => [
            'label' => 'Crea Team Invitation',
        ],
        'edit' => [
            'label' => 'Modifica Team Invitation',
        ],
        'delete' => [
            'label' => 'Elimina Team Invitation',
        ],
<<<<<<< HEAD
=======
    'navigation' => ['label' => 'Team Invitations', 'group' => 'Teams', 'icon' => 'heroicon-o-envelope', 'sort' => 34],
    'label' => 'Team Invitation',
    'plural_label' => 'Team Invitation (Plurale)',
    'fields' => [
        'id' => ['label' => 'Identificativo', 'tooltip' => 'Identificativo univoco del record', 'helper_text' => '', 'description' => ''],
        'created_at' => ['label' => 'Data Creazione', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'updated_at' => ['label' => 'Ultima Modifica', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'email' => ['label' => 'email'],
        'role' => ['label' => 'role'],
        'expires_at' => ['label' => 'expires_at'],
    ],
    'actions' => [
        'create' => ['label' => 'Crea Team Invitation', 'icon' => 'create', 'tooltip' => 'create'],
        'edit' => ['label' => 'Modifica Team Invitation', 'icon' => 'edit', 'tooltip' => 'edit'],
        'delete' => ['label' => 'Elimina Team Invitation', 'icon' => 'delete', 'tooltip' => 'delete'],
        'view' => ['label' => 'view', 'icon' => 'view', 'tooltip' => 'view'],
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    ],
];
