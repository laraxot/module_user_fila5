<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Permesso',
        'plural' => 'Permessi',
        'group' => [
            'name' => 'Admin',
        ],
    ],
    'fields' => [
<<<<<<< HEAD
        'name' => 'Nome',
        'guard_name' => 'Guard',
        'permissions' => 'Permessi',
        'roles' => 'Ruoli',
        'updated_at' => 'Aggiornato il',
        'first_name' => 'Nome',
        'last_name' => 'Cognome',
        'role' => [
            'label' => 'role',
=======
        'name' => [
            'label' => 'Nome',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'guard_name' => [
            'label' => 'Guard',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'permissions' => [
            'label' => 'Permessi',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'roles' => [
            'label' => 'Ruoli',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'updated_at' => [
            'label' => 'Aggiornato il',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'first_name' => [
            'label' => 'Nome',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'last_name' => [
            'label' => 'Cognome',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'role' => [
            'label' => 'role',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
>>>>>>> 60a2c9a9 (.)
        ],
    ],
    'actions' => [
        'import' => [
            'fields' => [
                'import_file' => 'Seleziona un file XLS o CSV da caricare',
            ],
        ],
        'export' => [
            'filename_prefix' => 'Aree al',
            'columns' => [
                'name' => 'Nome area',
                'parent_name' => 'Nome area livello superiore',
            ],
        ],
    ],
<<<<<<< HEAD
=======
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
>>>>>>> 60a2c9a9 (.)
];
