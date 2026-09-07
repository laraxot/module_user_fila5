<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
return [
    'fields' => [
        'password' => [
            'label' => 'Password',
            'placeholder' => 'Inserisci la password',
            'help' => 'La password deve essere di almeno 8 caratteri',
            'validation' => [
                'required' => 'La password è obbligatoria',
                'min' => 'La password deve essere di almeno 8 caratteri',
                'max' => 'La password non può superare i 255 caratteri',
            ],
<<<<<<< HEAD
<<<<<<< HEAD
=======
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
>>>>>>> 2024e2e7 (.)
=======
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
>>>>>>> f589f9b2 (.)
        ],
        'password_confirmation' => [
            'label' => 'Conferma Password',
            'placeholder' => 'Conferma la password',
            'help' => 'Reinserisci la password per confermare',
            'validation' => [
                'required' => 'La conferma della password è obbligatoria',
                'min' => 'La password deve essere di almeno 8 caratteri',
                'max' => 'La password non può superare i 255 caratteri',
                'same' => 'Le password non coincidono',
            ],
<<<<<<< HEAD
<<<<<<< HEAD
        ],
    ],
=======
=======
>>>>>>> f589f9b2 (.)
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'navigation' => [
        'label' => 'Missing Navigation Label',
        'plural_label' => 'Missing Navigation Plural Label',
        'group' => 'Missing Group',
        'icon' => 'heroicon-o-puzzle-piece',
        'sort' => 100,
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
    'actions' => [
    ],
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
];
