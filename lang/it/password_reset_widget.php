<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/it/password_reset_widget.php
return [
    'navigation' => [
        'label' => 'Reset Password',
        'plural_label' => 'Reset Password',
        'group' => 'Autenticazione',
        'icon' => 'heroicon-o-lock-closed',
        'sort' => 7,
    ],
    'label' => 'Reset Password',
    'plural_label' => 'Reset Password',
    'fields' => [
        'email' => [
            'label' => 'Email',
            'tooltip' => 'Indirizzo email',
            'placeholder' => 'Inserisci la tua email',
            'helper_text' => 'Inserisci il tuo indirizzo email per ricevere il link di reset',
            'description' => 'Email dell\'utente',
        ],
    ],
    'actions' => [
        'create' => [
            'label' => 'Invia Link Reset',
            'tooltip' => 'Invia il link per resettare la password',
            'helper_text' => 'Invia il link di reset della password',
            'description' => 'Azione per inviare il link',
        ],
    ],
    'messages' => [
        'success' => 'Link di reset inviato con successo',
        'error' => 'Si è verificato un errore',
    ],
];
