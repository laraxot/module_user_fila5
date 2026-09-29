<?php

declare(strict_types=1);

return [
    'fields' => [
        'attach' => [
<<<<<<< .merge_file_hrhk1N
            'label' => 'Collega account social',
            'icon' => 'heroicon-o-link',
            'tooltip' => 'Collega questo account social al profilo',
        ],
        'detach' => [
            'label' => 'Scollega account social',
            'icon' => 'heroicon-o-link-slash',
            'tooltip' => 'Scollega questo account social dal profilo',
        ],
        'save' => [
            'label' => 'Salva',
            'icon' => 'heroicon-o-check',
            'tooltip' => 'Salva il collegamento social',
        ],
=======
            'label' => 'attach',
            'icon' => 'attach',
            'tooltip' => 'attach',
        ],
        'detach' => [
            'label' => 'detach',
            'icon' => 'detach',
            'tooltip' => 'detach',
        ],
        'save' => [
            'label' => 'save',
            'icon' => 'save',
            'tooltip' => 'save',
        ],
    ],
    'navigation' => [
        'label' => 'socialite user.navigation',
        'group' => 'socialite user.navigation',
        'icon' => 'socialite user.navigation',
        'sort' => 73,
>>>>>>> .merge_file_lSkVHO
    ],
    'navigation' => [
        'name' => 'Utente social',
        'plural' => 'Utenti social',
        'label' => 'Utenti social',
        'group' => 'Autenticazione social',
        'icon' => 'heroicon-o-link',
        'sort' => 73,
    ],
    'label' => 'Utente social',
    'plural_label' => 'Utenti social',
];
