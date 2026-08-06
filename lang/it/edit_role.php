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
        'cancel' => [
            'label' => 'cancel',
        ],
        'save' => [
            'label' => 'save',
        ],
    ],
    'navigation' => [
        'name' => 'Edit Role',
        'plural' => 'Edit Role',
        'group' => [
<<<<<<< HEAD
            'name' => 'Ruoli e permessi',
            'description' => 'Controllo degli accessi',
        ],
        'label' => 'Edit Role',
        'sort' => 1,
        'icon' => 'heroicon-o-rectangle-stack',
=======
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Edit Role',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
>>>>>>> laraxot/dev
    ],
    'label' => 'Edit Role',
    'plural_label' => 'Edit Role (Plurale)',
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
