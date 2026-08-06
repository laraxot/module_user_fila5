<?php

declare(strict_types=1);

return [
    'actions' => [
        'view' => [
            'label' => 'view',
        ],
        'delete' => [
            'label' => 'delete',
        ],
    ],
    'navigation' => [
        'name' => 'Edit Team',
        'plural' => 'Edit Team',
        'group' => [
<<<<<<< HEAD
            'name' => 'Team e tenant',
            'description' => 'Organizzazioni, inviti e appartenenze',
        ],
        'label' => 'Edit Team',
        'sort' => 1,
        'icon' => 'heroicon-o-rectangle-stack',
=======
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Edit Team',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
>>>>>>> laraxot/dev
    ],
    'label' => 'Edit Team',
    'plural_label' => 'Edit Team (Plurale)',
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
];
