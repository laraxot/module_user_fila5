<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: resources/lang/it/password_reset.php
return [
    'navigation' => [
        'label' => 'Reset Password',
        'plural' => 'Reset Password',
        'icon' => 'heroicon-o-key',
        'group' => 'Sicurezza',
        'sort' => 40,
    ],
    'label' => 'Reset Password',
    'plural_label' => 'Reset Password',
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
            'label' => 'Creato il',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'actions' => [
    ],
];
