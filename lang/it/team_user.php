<?php

declare(strict_types=1);

<<<<<<< HEAD
=======
// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/it/team_user.php
>>>>>>> 350420cb (Check & fix styling)
return [
    'navigation' => [
        'name' => 'Utente Team',
        'plural' => 'Utenti Team',
        'label' => 'Utenti Team',
<<<<<<< HEAD
        'group' => ['name' => 'Teams', 'description' => 'Gestione degli utenti associati ai team'],
=======
        'group' => [
            'name' => 'Teams',
            'description' => 'Gestione degli utenti associati ai team',
        ],
>>>>>>> 350420cb (Check & fix styling)
        'sort' => 65,
        'icon' => 'heroicon-o-user-group',
    ],
    'label' => 'Team User',
    'plural_label' => 'Team User (Plurale)',
    'fields' => [
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
    ],
    'actions' => [
        'create' => [
            'label' => 'Crea Team User',
        ],
        'edit' => [
            'label' => 'Modifica Team User',
        ],
        'delete' => [
            'label' => 'Elimina Team User',
        ],
>>>>>>> 350420cb (Check & fix styling)
    ],
];
