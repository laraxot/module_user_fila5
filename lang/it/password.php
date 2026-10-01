<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Password',
<<<<<<< HEAD
        'plural' => 'Passwords',
        'updateDataAction' => [
            'label' => 'updateDataAction',
            'icon' => 'updateDataAction',
            'tooltip' => 'updateDataAction',
        ],
        'save' => [
            'label' => 'save',
            'icon' => 'save',
            'tooltip' => 'save',
        ],
        'profile' => [
            'label' => 'profile',
            'icon' => 'profile',
            'tooltip' => 'profile',
        ],
        'logout' => [
            'label' => 'logout',
            'icon' => 'logout',
            'tooltip' => 'logout',
        ],
        'group' => 'password.navigation',
=======
        'plural' => 'Password',
        'updateDataAction' => [
            'label' => 'Aggiorna dati',
            'icon' => 'heroicon-o-arrow-path',
            'tooltip' => 'Aggiorna i dati della password',
        ],
        'save' => [
            'label' => 'Salva',
            'icon' => 'heroicon-o-check',
            'tooltip' => 'Salva la nuova password',
        ],
        'profile' => [
            'label' => 'Profilo',
            'icon' => 'heroicon-o-user-circle',
            'tooltip' => 'Torna al profilo',
        ],
        'logout' => [
            'label' => 'Esci',
            'icon' => 'heroicon-o-arrow-right-on-rectangle',
            'tooltip' => 'Esci dall\'account',
        ],
        'group' => [
            'name' => 'Gestione account',
            'description' => 'Impostazioni e aggiornamento della password',
        ],
    ],
    'actions' => [
        'change_password' => [
            'label' => 'Cambia password',
            'modal' => [
                'heading' => 'Cambia Password',
                'description' => 'Inserisci la nuova password per confermare il cambio.',
            ],
        ],
>>>>>>> laraxot/dev
    ],
    'label' => 'Password',
    'plural_label' => 'Password (Plurale)',
];
