<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Reset Password',
        'plural' => 'Reset Password',
        'label' => 'Reset Password',
<<<<<<< HEAD
        'group' => ['name' => 'Sicurezza', 'description' => 'Gestione dei reset password e recupero credenziali'],
=======
        'group' => [
            'name' => 'Sicurezza',
            'description' => 'Gestione dei reset password e recupero credenziali',
        ],
>>>>>>> laraxot/dev
        'sort' => 4,
        'icon' => 'heroicon-o-key',
    ],
    'label' => 'Password Reset',
    'plural_label' => 'Password Reset (Plurale)',
    'fields' => [
<<<<<<< HEAD
        'id' => ['label' => 'Identificativo', 'tooltip' => 'Identificativo univoco del record', 'helper_text' => '', 'description' => ''],
        'created_at' => ['label' => 'Data Creazione', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'updated_at' => ['label' => 'Ultima Modifica', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'email' => ['placeholder' => 'email'],
        'token' => ['placeholder' => 'token'],
=======
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
>>>>>>> laraxot/dev
    ],
    'actions' => [
        'create' => [
            'label' => 'Crea Password Reset',
<<<<<<< HEAD
            'icon' => 'create',
            'tooltip' => 'create',
        ],
        'edit' => [
            'label' => 'Modifica Password Reset',
            'icon' => 'edit',
            'tooltip' => 'edit',
        ],
        'delete' => [
            'label' => 'Elimina Password Reset',
            'icon' => 'delete',
            'tooltip' => 'delete',
        ],
        'view' => [
            'label' => 'view',
            'icon' => 'view',
            'tooltip' => 'view',
        ],
        'logout' => [
            'tooltip' => 'logout',
            'icon' => 'logout',
            'label' => 'logout',
        ],
        'reorderRecords' => [
            'tooltip' => 'reorderRecords',
            'icon' => 'reorderRecords',
            'label' => 'reorderRecords',
        ],
    ],
    'sections' => [
        'Password Reset Information' => [
            'label' => 'Password Reset Information',
            'heading' => 'Password Reset Information',
        ],
        'Timestamps' => [
            'label' => 'Timestamps',
            'heading' => 'Timestamps',
=======
        ],
        'edit' => [
            'label' => 'Modifica Password Reset',
        ],
        'delete' => [
            'label' => 'Elimina Password Reset',
>>>>>>> laraxot/dev
        ],
    ],
];
