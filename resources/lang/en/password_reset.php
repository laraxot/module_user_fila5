<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: resources/lang/en/password_reset.php
return [
    'navigation' => [
        'label' => 'Password Resets',
        'plural' => 'Password Resets',
        'icon' => 'heroicon-o-key',
        'group' => 'Security',
        'sort' => 40,
    ],
    'label' => 'Password Reset',
    'plural_label' => 'Password Resets',
    'fields' => [
        'email' => [
            'label' => 'Email',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'token' => [
            'label' => 'Token',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'Created At',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'actions' => [
    ],
];
