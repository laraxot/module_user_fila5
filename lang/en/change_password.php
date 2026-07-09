<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/en/change_password.php
return [
    'fields' => [
        'new_password_confirmation' => [
            'label' => 'Confirm new password',
            'description' => 'Please type the new password again to confirm',
            'helper_text' => '',
            'placeholder' => 'Re-enter your new password',
            'tooltip' => '',
        ],
        'changePassword' => [
            'label' => 'Change password',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
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
