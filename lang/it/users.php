<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/it/users.php
return [
    'fields' => [
        'id' => [
            'label' => 'id',
        ],
        'name' => [
            'label' => 'name',
        ],
        'first_name' => [
            'label' => 'first_name',
        ],
        'last_name' => [
            'label' => 'last_name',
        ],
        'email' => [
            'label' => 'email',
        ],
        'email_verified_at' => [
            'label' => 'email_verified_at',
        ],
        'is_active' => [
            'label' => 'is_active',
        ],
        'is_otp' => [
            'label' => 'is_otp',
        ],
        'lang' => [
            'label' => 'lang',
        ],
        'current_team_id' => [
            'label' => 'current_team_id',
        ],
        'type' => [
            'label' => 'type',
        ],
        'created_at' => [
            'label' => 'created_at',
        ],
        'updated_at' => [
            'label' => 'updated_at',
        ],
    ],
    'actions' => [
        'create' => [
            'label' => 'create',
            'icon' => 'create',
            'tooltip' => 'create',
        ],
        'layout' => [
            'label' => 'layout',
            'icon' => 'layout',
            'tooltip' => 'layout',
        ],
        'delete' => [
            'label' => 'delete',
            'icon' => 'delete',
            'tooltip' => 'delete',
        ],
        'changePassword' => [
            'label' => 'changePassword',
            'icon' => 'changePassword',
            'tooltip' => 'changePassword',
        ],
        'deactivate' => [
            'label' => 'deactivate',
            'icon' => 'deactivate',
            'tooltip' => 'deactivate',
        ],
    ],
];
