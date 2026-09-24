<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/de/login.php
return [
    'fields' => [
        'email' => [
            'label' => 'email',
            'description' => 'email',
            'helper_text' => '',
            'placeholder' => 'email',
            'tooltip' => '',
        ],
        'password' => [
            'label' => 'password',
            'description' => 'password',
            'helper_text' => '',
            'placeholder' => 'password',
            'tooltip' => '',
        ],
        'remember' => [
            'label' => 'remember',
            'description' => 'remember',
            'helper_text' => '',
            'placeholder' => 'remember',
            'tooltip' => '',
        ],
    ],
    'actions' => [
        'login' => [
            'label' => 'Anmelden',
            'success' => 'Erfolgreich angemeldet',
            'error' => 'Ungültige Anmeldedaten',
        ],
        'register' => [
            'label' => 'Registrieren',
            'success' => 'Registrierung erfolgreich abgeschlossen',
            'error' => 'Registrierung nicht möglich',
        ],
        'forgot_password' => [
            'label' => 'Passwort vergessen?',
            'success' => 'Anleitung an Ihre E-Mail gesendet',
            'error' => 'Anleitung konnte nicht gesendet werden',
        ],
    ],
    'title' => 'Anmelden',
    'subtitle_start' => 'Oder',
    'subtitle_link' => 'neues Konto erstellen',
    'page' => [
        'title' => 'Willkommen bei <nome progetto>! 🍕',
        'subtitle' => 'Treten Sie der Community von Entwicklern und Pizza-Liebhabern bei',
    ],
    'already_registered' => 'Noch kein Konto?',
    'register' => 'Jetzt registrieren',
    'no_account' => 'Noch kein Konto?',
    'register_now' => 'Jetzt registrieren',
    'forgot_password_text' => 'Passwort vergessen?',
    'reset_it' => 'Hier zurücksetzen',
    'navigation' => [
        'label' => 'Missing Navigation Label',
        'plural_label' => 'Missing Navigation Plural Label',
        'group' => 'Missing Group',
        'icon' => 'heroicon-o-puzzle-piece',
        'sort' => 100,
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
];
