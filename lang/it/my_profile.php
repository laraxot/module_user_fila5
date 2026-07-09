<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/it/my_profile.php
return [
    'sections' => [
        'Profile Information' => [
            'label' => 'Profile Information',
            'heading' => 'Profile Information',
        ],
        'Update Password' => [
            'label' => 'Update Password',
            'heading' => 'Update Password',
        ],
    ],
    'fields' => [
        'name' => [
            'label' => 'name',
            'placeholder' => 'name',
            'helper_text' => 'name',
            'description' => 'name',
            'tooltip' => '',
        ],
        'email' => [
            'label' => 'email',
            'placeholder' => 'email',
            'helper_text' => 'email',
            'description' => 'email',
            'tooltip' => '',
        ],
        'Current password' => [
            'label' => 'Current password',
            'placeholder' => 'Current password',
            'helper_text' => 'Current password',
            'description' => 'Current password',
            'tooltip' => '',
        ],
        'passwordConfirmation' => [
            'label' => 'passwordConfirmation',
            'placeholder' => 'passwordConfirmation',
            'helper_text' => 'passwordConfirmation',
            'description' => 'passwordConfirmation',
            'tooltip' => '',
        ],
        'current_password' => [
            'label' => 'current_password',
            'placeholder' => 'current_password',
            'helper_text' => 'current_password',
            'description' => 'current_password',
        ],
        'password_confirmation' => [
            'label' => 'password_confirmation',
            'placeholder' => 'password_confirmation',
            'helper_text' => 'password_confirmation',
            'description' => 'password_confirmation',
        ],
    ],
    'actions' => [
        'updateProfileAction' => [
            'label' => 'updateProfileAction',
            'icon' => 'updateProfileAction',
            'tooltip' => 'updateProfileAction',
        ],
        'updatePasswordAction' => [
            'label' => 'updatePasswordAction',
            'icon' => 'updatePasswordAction',
            'tooltip' => 'updatePasswordAction',
        ],
    ],
    'navigation' => [
        'name' => 'My Profile',
        'plural' => 'My Profile',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'My Profile',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
    ],
    'label' => 'My Profile',
    'plural_label' => 'My Profile (Plurale)',
];
