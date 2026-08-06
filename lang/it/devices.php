<?php

declare(strict_types=1);

return [
    'fields' => [
        'login_at' => [
            'label' => 'login_at',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'logout_at' => [
            'label' => 'logout_at',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'navigation' => [
        'name' => 'Devices',
        'plural' => 'Devices',
        'group' => [
<<<<<<< HEAD
            'name' => 'Utenti',
            'description' => 'Anagrafiche utenti, profili e dispositivi',
        ],
        'label' => 'Devices',
        'sort' => 1,
        'icon' => 'heroicon-o-rectangle-stack',
=======
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Devices',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
>>>>>>> laraxot/dev
    ],
    'label' => 'Devices',
    'plural_label' => 'Devices (Plurale)',
    'actions' => [
        'create' => [
            'label' => 'Crea Devices',
        ],
        'edit' => [
            'label' => 'Modifica Devices',
        ],
        'delete' => [
            'label' => 'Elimina Devices',
        ],
    ],
];
