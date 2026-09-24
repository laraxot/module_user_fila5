<?php

declare(strict_types=1);

<<<<<<< HEAD
=======
// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/it/password_reset.php
>>>>>>> 350420cb (Check & fix styling)
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
>>>>>>> 350420cb (Check & fix styling)
        'sort' => 4,
        'icon' => 'heroicon-o-key',
    ],
    'label' => 'Password Reset',
    'plural_label' => 'Password Reset (Plurale)',
    'fields' => [
<<<<<<< HEAD
        'edit' => ['label' => 'Modifica Password Reset'],
        'delete' => ['label' => 'Elimina Password Reset'],
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
>>>>>>> 350420cb (Check & fix styling)
    ],
];
