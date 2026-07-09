<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/de/password_reset_confirm_widget.php
return [
    'fields' => [
        'email' => [
            'label' => 'email',
            'placeholder' => 'email',
            'helper_text' => '',
            'description' => 'email',
            'tooltip' => '',
        ],
        'password' => [
            'label' => 'password',
            'placeholder' => 'password',
            'helper_text' => '',
            'description' => 'password',
            'tooltip' => '',
        ],
        'password_confirmation' => [
            'label' => 'password_confirmation',
            'placeholder' => 'password_confirmation',
            'helper_text' => '',
            'description' => 'password_confirmation',
            'tooltip' => '',
        ],
    ],
    'navigation' => [
        'label' => 'Missing Navigation Label',
        'plural_label' => 'Missing Navigation Plural Label',
        'group' => 'Missing Group',
        'icon' => 'heroicon-o-puzzle-piece',
        'sort' => 100,
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
    'actions' => [
    ],
];
