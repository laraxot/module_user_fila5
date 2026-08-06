<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Utente Team',
        'plural' => 'Utenti Team',
        'label' => 'Utenti Team',
<<<<<<< HEAD
        'group' => ['name' => 'Team e tenant', 'description' => 'Organizzazioni, inviti e appartenenze'],
=======
        'group' => [
            'name' => 'Teams',
            'description' => 'Gestione degli utenti associati ai team',
        ],
>>>>>>> laraxot/dev
        'sort' => 65,
        'icon' => 'heroicon-o-user-group',
    ],
    'label' => 'Team User',
    'plural_label' => 'Team User (Plurale)',
    'fields' => [
<<<<<<< HEAD
        'id' => ['label' => 'Identificativo', 'tooltip' => 'Identificativo univoco del record', 'helper_text' => '', 'description' => ''],
        'created_at' => ['label' => 'Data Creazione', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'updated_at' => ['label' => 'Ultima Modifica', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
    ],
    'actions' => [
        'create' => ['label' => 'Crea Team User'],
        'edit' => ['label' => 'Modifica Team User'],
        'delete' => ['label' => 'Elimina Team User'],
        'logout' => ['tooltip' => 'logout', 'icon' => 'logout', 'label' => 'logout'],
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
            'label' => 'Crea Team User',
        ],
        'edit' => [
            'label' => 'Modifica Team User',
        ],
        'delete' => [
            'label' => 'Elimina Team User',
        ],
>>>>>>> laraxot/dev
    ],
];
