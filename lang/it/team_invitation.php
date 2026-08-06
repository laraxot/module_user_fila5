<?php

declare(strict_types=1);

return [
    'navigation' => [
        'label' => 'Team Invitations',
<<<<<<< HEAD
        'group' => ['name' => 'Team e tenant', 'description' => 'Organizzazioni, inviti e appartenenze'],
=======
        'group' => 'Teams',
>>>>>>> laraxot/dev
        'icon' => 'heroicon-o-envelope',
        'sort' => 34,
    ],
    'label' => 'Team Invitation',
    'plural_label' => 'Team Invitation (Plurale)',
    'fields' => [
<<<<<<< HEAD
        'id' => ['label' => 'Identificativo', 'tooltip' => 'Identificativo univoco del record', 'helper_text' => '', 'description' => ''],
        'created_at' => ['label' => 'Data Creazione', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'updated_at' => ['label' => 'Ultima Modifica', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
    ],
    'actions' => [
        'create' => ['label' => 'Crea Team Invitation'],
        'edit' => ['label' => 'Modifica Team Invitation'],
        'delete' => ['label' => 'Elimina Team Invitation'],
        'logout' => ['tooltip' => 'logout'],
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
            'label' => 'Crea Team Invitation',
        ],
        'edit' => [
            'label' => 'Modifica Team Invitation',
        ],
        'delete' => [
            'label' => 'Elimina Team Invitation',
        ],
>>>>>>> laraxot/dev
    ],
];
