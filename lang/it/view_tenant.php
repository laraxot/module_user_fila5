<?php

declare(strict_types=1);

return [
    'actions' => [
        'edit' => [
            'label' => 'edit',
        ],
    ],
    'navigation' => [
        'name' => 'View Tenant',
        'plural' => 'View Tenant',
        'group' => [
<<<<<<< HEAD
            'name' => 'Team e tenant',
            'description' => 'Organizzazioni, inviti e appartenenze',
        ],
        'label' => 'View Tenant',
        'sort' => 1,
        'icon' => 'heroicon-o-rectangle-stack',
=======
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'View Tenant',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
>>>>>>> laraxot/dev
    ],
    'label' => 'View Tenant',
    'plural_label' => 'View Tenant (Plurale)',
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
