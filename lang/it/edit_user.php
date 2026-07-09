<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/it/edit_user.php
return [
    'actions' => [
        'delete' => [
            'label' => 'delete',
            'icon' => 'delete',
        ],
        'cancel' => [
            'label' => 'cancel',
            'icon' => 'ui-cancel',
        ],
        'save' => [
            'label' => 'save',
            'icon' => 'ui-save',
        ],
        'logout' => [
            'icon' => 'ui-logout',
            'label' => 'logout',
        ],
        'profile' => [
            'icon' => 'profile',
            'label' => 'profile',
        ],
    ],
    'fields' => [
        'password' => [
            'label' => 'password',
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
    ],
    'navigation' => [
        'name' => 'Edit User',
        'plural' => 'Edit User',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Edit User',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
    ],
    'label' => 'Edit User',
    'plural_label' => 'Edit User (Plurale)',
];
