<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/it/socialite_users.php
return [
    'fields' => [
        'provider' => [
            'label' => 'provider',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'provider_id' => [
            'label' => 'provider_id',
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
        'email' => [
            'label' => 'email',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'avatar' => [
            'label' => 'avatar',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'navigation' => [
        'name' => 'Socialite Users',
        'plural' => 'Socialite Users',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Socialite Users',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
    ],
    'label' => 'Socialite Users',
    'plural_label' => 'Socialite Users (Plurale)',
    'actions' => [
        'create' => [
            'label' => 'Crea Socialite Users',
        ],
        'edit' => [
            'label' => 'Modifica Socialite Users',
        ],
        'delete' => [
            'label' => 'Elimina Socialite Users',
        ],
    ],
];
