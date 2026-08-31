<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Token',
        'plural' => 'Tokens',
<<<<<<< HEAD
        'group' => ['name' => 'Gestione Utenti', 'description' => 'Gestione dei token di accesso'],
=======
        'group' => [
            'name' => 'Gestione Utenti',
            'description' => 'Gestione dei token di accesso',
        ],
>>>>>>> laraxot/dev
        'label' => 'token',
        'sort' => 29,
        'icon' => 'user-user-token',
    ],
    'fields' => [
<<<<<<< HEAD
        'name' => ['label' => 'name', 'tooltip' => '', 'helper_text' => '', 'description' => '', 'placeholder' => 'name'],
        'create' => ['label' => 'create', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'edit' => ['label' => 'edit', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'delete' => ['label' => 'delete', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'toggleColumns' => ['label' => 'toggleColumns', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'reorderRecords' => ['label' => 'reorderRecords', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'scopes' => ['label' => 'scopes'],
        'revoked' => ['label' => 'revoked'],
        'created_at' => ['label' => 'created_at'],
        'expires_at' => ['label' => 'expires_at'],
        'expired' => ['label' => 'expired'],
        'valid' => ['label' => 'valid'],
    ],
    'actions' => [
        'reorderRecords' => ['tooltip' => 'reorderRecords', 'icon' => 'reorderRecords'],
        'view' => ['label' => 'view', 'icon' => 'view', 'tooltip' => 'view'],
        'revoke' => ['label' => 'revoke', 'icon' => 'revoke', 'tooltip' => 'revoke'],
        'delete' => ['label' => 'delete', 'icon' => 'delete', 'tooltip' => 'delete'],
        'create' => ['label' => 'create', 'icon' => 'create', 'tooltip' => 'create'],
        'edit' => ['label' => 'edit', 'icon' => 'edit', 'tooltip' => 'edit'],
=======
        'name' => [
            'label' => 'name',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'create' => [
            'label' => 'create',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'edit' => [
            'label' => 'edit',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'delete' => [
            'label' => 'delete',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'toggleColumns' => [
            'label' => 'toggleColumns',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'reorderRecords' => [
            'label' => 'reorderRecords',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'actions' => [
        'reorderRecords' => [
            'tooltip' => 'reorderRecords',
            'icon' => 'reorderRecords',
        ],
>>>>>>> laraxot/dev
    ],
    'label' => 'Token',
    'plural_label' => 'Token (Plurale)',
];
