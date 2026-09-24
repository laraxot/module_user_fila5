<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Utente Team',
        'plural' => 'Utenti Team',
        'label' => 'Utenti Team',
<<<<<<< .merge_file_2PMAjV
<<<<<<< HEAD
        'group' => ['name' => 'Teams', 'description' => 'Gestione degli utenti associati ai team'],
=======
=======
>>>>>>> .merge_file_dfKorn
        'group' => [
            'name' => 'Teams',
            'description' => 'Gestione degli utenti associati ai team',
        ],
<<<<<<< .merge_file_2PMAjV
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_dfKorn
        'sort' => 65,
        'icon' => 'heroicon-o-user-group',
    ],
    'label' => 'Team User',
    'plural_label' => 'Team User (Plurale)',
    'fields' => [
<<<<<<< .merge_file_2PMAjV
<<<<<<< HEAD
        'edit' => ['label' => 'Modifica Team User'],
        'delete' => ['label' => 'Elimina Team User', 'icon' => 'delete', 'tooltip' => 'delete'],
        'logout' => ['tooltip' => 'logout', 'icon' => 'logout', 'label' => 'logout'],
        'createAnother' => ['label' => 'createAnother', 'icon' => 'createAnother', 'tooltip' => 'createAnother'],
        'save' => ['label' => 'save', 'icon' => 'save', 'tooltip' => 'save'],
        'applyFilters' => ['label' => 'applyFilters', 'icon' => 'applyFilters', 'tooltip' => 'applyFilters'],
        'openFilters' => ['label' => 'openFilters', 'icon' => 'openFilters', 'tooltip' => 'openFilters'],
        'resetFilters' => ['label' => 'resetFilters', 'icon' => 'resetFilters', 'tooltip' => 'resetFilters'],
        'applyTableColumnManager' => ['label' => 'applyTableColumnManager', 'icon' => 'applyTableColumnManager', 'tooltip' => 'applyTableColumnManager'],
        'openColumnManager' => ['label' => 'openColumnManager', 'icon' => 'openColumnManager', 'tooltip' => 'openColumnManager'],
        'resetColumnManager' => ['label' => 'resetColumnManager', 'icon' => 'resetColumnManager', 'tooltip' => 'resetColumnManager'],
        'reorderRecords' => ['label' => 'reorderRecords', 'icon' => 'reorderRecords', 'tooltip' => 'reorderRecords'],
        'profile' => ['label' => 'profile', 'icon' => 'profile', 'tooltip' => 'profile'],
    ],
    'sections' => [
        'empty' => ['label' => '', 'heading' => ''],
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
        'team' => [
            'name' => [
                'label' => 'team.name',
            ],
        ],
        'user' => [
            'name' => [
                'label' => 'user.name',
            ],
        ],
        'role' => [
            'label' => 'role',
        ],
    ],
    'actions' => [
        'create' => [
            'label' => 'Crea Team User',
            'icon' => 'create',
            'tooltip' => 'create',
        ],
        'edit' => [
            'label' => 'Modifica Team User',
        ],
        'delete' => [
            'label' => 'Elimina Team User',
            'icon' => 'delete',
            'tooltip' => 'delete',
        ],
        'logout' => [
            'tooltip' => 'logout',
            'icon' => 'logout',
            'label' => 'logout',
        ],
        'createAnother' => [
            'label' => 'createAnother',
            'icon' => 'createAnother',
            'tooltip' => 'createAnother',
        ],
        'save' => [
            'label' => 'save',
            'icon' => 'save',
            'tooltip' => 'save',
        ],
        'applyFilters' => [
            'label' => 'applyFilters',
            'icon' => 'applyFilters',
            'tooltip' => 'applyFilters',
        ],
        'openFilters' => [
            'label' => 'openFilters',
            'icon' => 'openFilters',
            'tooltip' => 'openFilters',
        ],
        'resetFilters' => [
            'label' => 'resetFilters',
            'icon' => 'resetFilters',
            'tooltip' => 'resetFilters',
        ],
        'applyTableColumnManager' => [
            'label' => 'applyTableColumnManager',
            'icon' => 'applyTableColumnManager',
            'tooltip' => 'applyTableColumnManager',
        ],
        'openColumnManager' => [
            'label' => 'openColumnManager',
            'icon' => 'openColumnManager',
            'tooltip' => 'openColumnManager',
        ],
        'resetColumnManager' => [
            'label' => 'resetColumnManager',
            'icon' => 'resetColumnManager',
            'tooltip' => 'resetColumnManager',
        ],
        'reorderRecords' => [
            'label' => 'reorderRecords',
            'icon' => 'reorderRecords',
            'tooltip' => 'reorderRecords',
        ],
        'profile' => [
            'label' => 'profile',
            'icon' => 'profile',
            'tooltip' => 'profile',
        ],
    ],
    'sections' => [
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
        'team' => [
            'name' => [
                'label' => 'team.name',
            ],
        ],
        'user' => [
            'name' => [
                'label' => 'user.name',
            ],
        ],
        'role' => [
            'label' => 'role',
        ],
    ],
    'actions' => [
        'create' => [
            'label' => 'Crea Team User',
            'icon' => 'create',
            'tooltip' => 'create',
        ],
        'edit' => [
            'label' => 'Modifica Team User',
        ],
        'delete' => [
            'label' => 'Elimina Team User',
            'icon' => 'delete',
            'tooltip' => 'delete',
        ],
        'logout' => [
            'tooltip' => 'logout',
            'icon' => 'logout',
            'label' => 'logout',
        ],
        'createAnother' => [
            'label' => 'createAnother',
            'icon' => 'createAnother',
            'tooltip' => 'createAnother',
        ],
        'save' => [
            'label' => 'save',
            'icon' => 'save',
            'tooltip' => 'save',
        ],
        'applyFilters' => [
            'label' => 'applyFilters',
            'icon' => 'applyFilters',
            'tooltip' => 'applyFilters',
        ],
        'openFilters' => [
            'label' => 'openFilters',
            'icon' => 'openFilters',
            'tooltip' => 'openFilters',
        ],
        'resetFilters' => [
            'label' => 'resetFilters',
            'icon' => 'resetFilters',
            'tooltip' => 'resetFilters',
        ],
        'applyTableColumnManager' => [
            'label' => 'applyTableColumnManager',
            'icon' => 'applyTableColumnManager',
            'tooltip' => 'applyTableColumnManager',
        ],
        'openColumnManager' => [
            'label' => 'openColumnManager',
            'icon' => 'openColumnManager',
            'tooltip' => 'openColumnManager',
        ],
        'resetColumnManager' => [
            'label' => 'resetColumnManager',
            'icon' => 'resetColumnManager',
            'tooltip' => 'resetColumnManager',
        ],
        'reorderRecords' => [
            'label' => 'reorderRecords',
            'icon' => 'reorderRecords',
            'tooltip' => 'reorderRecords',
        ],
        'profile' => [
            'label' => 'profile',
            'icon' => 'profile',
            'tooltip' => 'profile',
        ],
    ],
    'sections' => [
>>>>>>> .merge_file_dfKorn
        'empty' => [
            'label' => '',
            'heading' => '',
        ],
<<<<<<< .merge_file_2PMAjV
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_dfKorn
    ],
];
