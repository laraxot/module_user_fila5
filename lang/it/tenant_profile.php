<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/it/tenant_profile.php
return [
    'actions' => [
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
        'billing' => [
            'label' => 'billing',
            'icon' => 'billing',
            'tooltip' => 'billing',
        ],
        'register' => [
            'label' => 'register',
            'icon' => 'register',
            'tooltip' => 'register',
        ],
        'logout' => [
            'label' => 'logout',
            'icon' => 'logout',
            'tooltip' => 'logout',
        ],
    ],
    'navigation' => [
        'name' => 'Tenant Profile',
        'plural' => 'Tenant Profile',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Tenant Profile',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
    ],
    'label' => 'Tenant Profile',
    'plural_label' => 'Tenant Profile (Plurale)',
    'fields' => [
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
];
