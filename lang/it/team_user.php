<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Utente Team',
        'plural' => 'Utenti Team',
        'label' => 'Utenti Team',
<<<<<<< HEAD
        'group' => [
            'name' => 'Teams',
            'description' => 'Gestione degli utenti associati ai team',
        ],
=======
        'group' => ['name' => 'Teams', 'description' => 'Gestione degli utenti associati ai team'],
>>>>>>> 2024e2e7 (.)
        'sort' => 65,
        'icon' => 'heroicon-o-user-group',
    ],
    'label' => 'Team User',
    'plural_label' => 'Team User (Plurale)',
    'fields' => [
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
            'label' => 'Crea Team User',
        ],
        'edit' => [
            'label' => 'Modifica Team User',
        ],
        'delete' => [
            'label' => 'Elimina Team User',
        ],
=======
        'id' => ['label' => 'Identificativo', 'tooltip' => 'Identificativo univoco del record', 'helper_text' => '', 'description' => ''],
        'created_at' => ['label' => 'Data Creazione', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'updated_at' => ['label' => 'Ultima Modifica', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
    ],
    'actions' => [
        'create' => ['label' => 'Crea Team User', 'icon' => 'create', 'tooltip' => 'create'],
        'edit' => ['label' => 'Modifica Team User', 'icon' => 'edit', 'tooltip' => 'edit'],
        'delete' => ['label' => 'Elimina Team User', 'icon' => 'delete', 'tooltip' => 'delete'],
        'createAnother' => ['label' => 'createAnother', 'icon' => 'createAnother', 'tooltip' => 'createAnother'],
        'save' => ['label' => 'save', 'icon' => 'save', 'tooltip' => 'save'],
        'view' => ['label' => 'view', 'icon' => 'view', 'tooltip' => 'view'],
>>>>>>> 2024e2e7 (.)
    ],
];
