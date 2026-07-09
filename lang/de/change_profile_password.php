<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/de/change_profile_password.php
return [
    'fields' => [
        'new_password_confirmation' => [
            'label' => 'Neues Passwort bestätigen',
            'placeholder' => 'Bestätigen Sie Ihr neues Passwort',
            'helper_text' => '',
            'description' => 'Bitte geben Sie das neue Passwort erneut ein',
            'tooltip' => 'Wiederholen Sie das neue Passwort zur Sicherheit',
            'icon' => 'heroicon-o-lock-closed',
            'color' => 'warning',
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
