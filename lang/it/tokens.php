<?php

declare(strict_types=1);

return [
    'fields' => [
        'name' => [
            'label' => 'name',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'navigation' => [
        'name' => 'Tokens',
        'plural' => 'Tokens',
        'group' => [
<<<<<<< HEAD
            'name' => 'OAuth',
            'description' => 'Client, token e API Passport',
        ],
        'label' => 'Tokens',
        'sort' => 1,
        'icon' => 'heroicon-o-rectangle-stack',
=======
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Tokens',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
>>>>>>> laraxot/dev
    ],
    'label' => 'Tokens',
    'plural_label' => 'Tokens (Plurale)',
    'actions' => [
        'create' => [
            'label' => 'Crea Tokens',
        ],
        'edit' => [
            'label' => 'Modifica Tokens',
        ],
        'delete' => [
            'label' => 'Elimina Tokens',
        ],
    ],
];
