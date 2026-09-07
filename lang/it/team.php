<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Team',
        'plural' => 'Teams',
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> f589f9b2 (.)
        'group' => [
            'name' => 'Gestione Utenti',
            'description' => 'Gestione dei team e delle loro autorizzazioni',
        ],
<<<<<<< HEAD
=======
        'group' => ['name' => 'Gestione Utenti', 'description' => 'Gestione dei team e delle loro autorizzazioni'],
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
        'label' => 'team',
        'sort' => 18,
        'icon' => 'ui-user-team',
    ],
    'fields' => [
<<<<<<< HEAD
<<<<<<< HEAD
        'first_name' => 'Nome',
        'last_name' => 'Cognome',
        'detach' => [
            'label' => 'detach',
        ],
        'toggleColumns' => [
            'label' => 'toggleColumns',
        ],
        'reorderRecords' => [
            'label' => 'reorderRecords',
        ],
        'resetFilters' => [
            'label' => 'resetFilters',
        ],
        'create' => [
            'label' => 'create',
        ],
        'attach' => [
            'label' => 'attach',
        ],
        'view' => [
            'label' => 'view',
        ],
        'edit' => [
            'label' => 'edit',
        ],
        'openFilters' => [
            'label' => 'openFilters',
        ],
        'applyFilters' => [
            'label' => 'applyFilters',
        ],
        'updated_at' => [
            'label' => 'updated_at',
        ],
        'created_at' => [
            'label' => 'created_at',
        ],
        'users_count' => [
            'label' => 'users_count',
        ],
        'name' => [
            'label' => 'name',
=======
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
        'detach' => [
            'label' => 'detach',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'toggleColumns' => [
            'label' => 'toggleColumns',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'reorderRecords' => [
            'label' => 'reorderRecords',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'resetFilters' => [
            'label' => 'resetFilters',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'create' => [
            'label' => 'create',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'attach' => [
            'label' => 'attach',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'view' => [
            'label' => 'view',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'edit' => [
            'label' => 'edit',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'openFilters' => [
            'label' => 'openFilters',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'applyFilters' => [
            'label' => 'applyFilters',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'updated_at' => [
            'label' => 'updated_at',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'created_at',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'users_count' => [
            'label' => 'users_count',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'name' => [
            'label' => 'name',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
>>>>>>> f589f9b2 (.)
        ],
        'recordId' => [
            'label' => 'recordId',
            'description' => 'recordId',
            'helper_text' => 'recordId',
            'placeholder' => 'recordId',
<<<<<<< HEAD
        ],
        'personal_team' => [
            'label' => 'personal_team',
=======
            'tooltip' => '',
        ],
        'personal_team' => [
            'label' => 'personal_team',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
>>>>>>> f589f9b2 (.)
        ],
        'role' => [
            'label' => 'role',
            'description' => 'role',
            'helper_text' => 'role',
            'placeholder' => 'role',
<<<<<<< HEAD
=======
            'tooltip' => '',
>>>>>>> f589f9b2 (.)
        ],
        'description' => [
            'description' => 'description',
            'helper_text' => 'description',
            'placeholder' => 'description',
<<<<<<< HEAD
        ],
        'delete' => [
            'label' => 'delete',
        ],
        'layout' => [
            'label' => 'layout',
=======
            'label' => '',
            'tooltip' => '',
        ],
        'delete' => [
            'label' => 'delete',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'layout' => [
            'label' => 'layout',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
>>>>>>> f589f9b2 (.)
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
        'create' => [
            'label' => 'create',
        ],
        'logout' => [
            'icon' => 'logout',
            'label' => 'logout',
<<<<<<< HEAD
=======
            'tooltip' => 'logout',
        ],
        'reorderRecords' => [
            'icon' => 'reorderRecords',
            'label' => 'reorderRecords',
            'tooltip' => 'reorderRecords',
        ],
        'openColumnManager' => [
            'icon' => 'openColumnManager',
            'label' => 'openColumnManager',
            'tooltip' => 'openColumnManager',
        ],
        'applyTableColumnManager' => [
            'icon' => 'applyTableColumnManager',
            'label' => 'applyTableColumnManager',
            'tooltip' => 'applyTableColumnManager',
        ],
        'resetFilters' => [
            'icon' => 'resetFilters',
            'label' => 'resetFilters',
            'tooltip' => 'resetFilters',
        ],
        'applyFilters' => [
            'icon' => 'applyFilters',
            'label' => 'applyFilters',
            'tooltip' => 'applyFilters',
        ],
        'openFilters' => [
            'icon' => 'openFilters',
            'label' => 'openFilters',
            'tooltip' => 'openFilters',
        ],
        'detach' => [
            'icon' => 'detach',
            'label' => 'detach',
            'tooltip' => 'detach',
        ],
        'cancel' => [
            'icon' => 'cancel',
            'label' => 'cancel',
            'tooltip' => 'cancel',
        ],
        'attachAnother' => [
            'icon' => 'attachAnother',
            'label' => 'attachAnother',
            'tooltip' => 'attachAnother',
        ],
        'attach' => [
            'label' => 'attach',
            'icon' => 'attach',
            'tooltip' => 'attach',
        ],
        'submit' => [
            'label' => 'submit',
            'icon' => 'submit',
            'tooltip' => 'submit',
        ],
        'profile' => [
            'tooltip' => 'profile',
            'icon' => 'profile',
            'label' => 'profile',
        ],
        'delete' => [
            'tooltip' => 'delete',
            'icon' => 'delete',
            'label' => 'delete',
>>>>>>> f589f9b2 (.)
        ],
    ],
    'plural' => [
        'model' => [
            'label' => 'team.plural.model',
        ],
    ],
    'model' => [
        'label' => 'team.model',
    ],
<<<<<<< HEAD
=======
        'first_name' => ['label' => 'Nome', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'last_name' => ['label' => 'Cognome', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'detach' => ['label' => 'detach', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'toggleColumns' => ['label' => 'toggleColumns', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'reorderRecords' => ['label' => 'reorderRecords', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'resetFilters' => ['label' => 'resetFilters', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'create' => ['label' => 'create', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'attach' => ['label' => 'attach', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'view' => ['label' => 'view', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'edit' => ['label' => 'edit', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'openFilters' => ['label' => 'openFilters', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'applyFilters' => ['label' => 'applyFilters', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'updated_at' => ['label' => 'updated_at', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'created_at' => ['label' => 'created_at', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'users_count' => ['label' => 'users_count', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'name' => ['label' => 'name', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'recordId' => ['label' => 'recordId', 'description' => 'recordId', 'helper_text' => 'recordId', 'placeholder' => 'recordId', 'tooltip' => ''],
        'personal_team' => ['label' => 'personal_team', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'role' => ['label' => 'role', 'description' => 'role', 'helper_text' => 'role', 'placeholder' => 'role', 'tooltip' => ''],
        'description' => ['description' => 'description', 'helper_text' => 'description', 'placeholder' => 'description', 'label' => '', 'tooltip' => ''],
        'delete' => ['label' => 'delete', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'layout' => ['label' => 'layout', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
    ],
    'actions' => [
        'import' => [
            'fields' => ['import_file' => 'Seleziona un file XLS o CSV da caricare'],
        ],
        'export' => [
            'filename_prefix' => 'Aree al',
            'columns' => ['name' => 'Nome area', 'parent_name' => 'Nome area livello superiore'],
        ],
        'create' => ['label' => 'create', 'icon' => 'create', 'tooltip' => 'create'],
        'logout' => ['icon' => 'logout', 'label' => 'logout', 'tooltip' => 'logout'],
        'reorderRecords' => ['icon' => 'reorderRecords', 'label' => 'reorderRecords', 'tooltip' => 'reorderRecords'],
        'openColumnManager' => ['icon' => 'openColumnManager', 'label' => 'openColumnManager', 'tooltip' => 'openColumnManager'],
        'applyTableColumnManager' => ['icon' => 'applyTableColumnManager', 'label' => 'applyTableColumnManager', 'tooltip' => 'applyTableColumnManager'],
        'resetFilters' => ['icon' => 'resetFilters', 'label' => 'resetFilters', 'tooltip' => 'resetFilters'],
        'applyFilters' => ['icon' => 'applyFilters', 'label' => 'applyFilters', 'tooltip' => 'applyFilters'],
        'openFilters' => ['icon' => 'openFilters', 'label' => 'openFilters', 'tooltip' => 'openFilters'],
        'detach' => ['icon' => 'detach', 'label' => 'detach', 'tooltip' => 'detach'],
        'cancel' => ['icon' => 'cancel', 'label' => 'cancel', 'tooltip' => 'cancel'],
        'attachAnother' => ['icon' => 'attachAnother', 'label' => 'attachAnother', 'tooltip' => 'attachAnother'],
        'attach' => ['label' => 'attach', 'icon' => 'attach', 'tooltip' => 'attach'],
        'submit' => ['label' => 'submit', 'icon' => 'submit', 'tooltip' => 'submit'],
        'profile' => ['tooltip' => 'profile', 'icon' => 'profile', 'label' => 'profile'],
        'delete' => ['tooltip' => 'delete', 'icon' => 'delete', 'label' => 'delete'],
        'createAnother' => ['label' => 'createAnother', 'icon' => 'createAnother', 'tooltip' => 'createAnother'],
        'view' => ['label' => 'view', 'icon' => 'view', 'tooltip' => 'view'],
        'save' => ['label' => 'save', 'icon' => 'save', 'tooltip' => 'save'],
        'edit' => ['label' => 'edit', 'icon' => 'edit', 'tooltip' => 'edit'],
    ],
    'plural' => [
        'model' => ['label' => 'team.plural.model'],
    ],
    'model' => ['label' => 'team.model'],
    'label' => 'team',
    'plural_label' => 'Team (Plurale)',
>>>>>>> 2024e2e7 (.)
=======
    'label' => 'team',
    'plural_label' => 'Team (Plurale)',
>>>>>>> f589f9b2 (.)
];
