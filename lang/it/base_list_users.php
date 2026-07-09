<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/it/base_list_users.php
return [
    'fields' => [
        'deactivate' => [
            'label' => 'deactivate',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'unverified' => [
            'label' => 'unverified',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'verified' => [
            'label' => 'verified',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'email' => [
            'label' => 'email',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'name' => [
            'label' => 'name',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'changePassword' => [
            'label' => 'changePassword',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'navigation' => [
        'name' => 'Base List Users',
        'plural' => 'Base List Users',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Base List Users',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
    ],
    'label' => 'Base List Users',
    'plural_label' => 'Base List Users (Plurale)',
    'actions' => [
        'create' => [
            'label' => 'Crea Base List Users',
        ],
        'edit' => [
            'label' => 'Modifica Base List Users',
        ],
        'delete' => [
            'label' => 'Elimina Base List Users',
        ],
    ],
];
