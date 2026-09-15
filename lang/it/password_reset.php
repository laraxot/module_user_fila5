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
<<<<<<< HEAD
        'group' => [
            'name' => 'Sicurezza',
            'description' => 'Gestione dei reset password e recupero credenziali',
        ],
=======
        'group' => ['name' => 'Sicurezza', 'description' => 'Gestione dei reset password e recupero credenziali'],
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
        'sort' => 4,
        'icon' => 'heroicon-o-key',
    ],
    'label' => 'Password Reset',
    'plural_label' => 'Password Reset (Plurale)',
    'fields' => [
<<<<<<< HEAD
=======
<<<<<<< HEAD
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
            'label' => 'Crea Password Reset',
        ],
        'edit' => [
            'label' => 'Modifica Password Reset',
        ],
        'delete' => [
            'label' => 'Elimina Password Reset',
        ],
=======
>>>>>>> laraxot/dev
        'id' => ['label' => 'Identificativo', 'tooltip' => 'Identificativo univoco del record', 'helper_text' => '', 'description' => ''],
        'created_at' => ['label' => 'Data Creazione', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'updated_at' => ['label' => 'Ultima Modifica', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
    ],
    'actions' => [
        'create' => ['label' => 'Crea Password Reset', 'icon' => 'create', 'tooltip' => 'create'],
        'edit' => ['label' => 'Modifica Password Reset'],
        'delete' => ['label' => 'Elimina Password Reset'],
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
    ],
];
