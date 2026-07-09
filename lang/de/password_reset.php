<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/de/password_reset.php
return [
    'navigation' => [
        'label' => 'Passwort-Zurücksetzung',
        'group' => 'Sicherheit',
        'icon' => 'heroicon-o-key',
        'sort' => 42,
    ],
    'label' => 'Passwort-Zurücksetzung',
    'plural_label' => 'Passwort-Zurücksetzungen',
    'fields' => [
        'id' => [
            'label' => 'ID',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'email' => [
            'label' => 'E-Mail',
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
            'label' => 'Erstellt Am',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'actions' => [
        'resend_email' => [
            'label' => 'E-Mail Erneut Senden',
        ],
        'view_request' => [
            'label' => 'Anfrage Anzeigen',
        ],
    ],
];
