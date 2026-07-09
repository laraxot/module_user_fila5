<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/it/socialite.php
return [
    'navigation' => [
        'label' => 'Accesso con social',
        'plural_label' => 'Accesso con social',
        'group' => 'Autenticazione',
        'icon' => 'heroicon-o-share',
        'sort' => 90,
    ],
    'label' => 'Accesso con social',
    'plural_label' => 'Accesso con social',
    'fields' => [
        'provider' => [
            'label' => 'Provider',
            'placeholder' => 'Seleziona il provider',
            'help' => 'Provider OAuth per l\'accesso',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'provider_id' => [
            'label' => 'Provider ID',
            'placeholder' => 'Inserisci l\'ID del provider',
            'help' => 'Identificativo utente sul provider',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'token' => [
            'label' => 'Token',
            'placeholder' => 'Token di accesso',
            'help' => 'Token OAuth per l\'accesso',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'actions' => [
        'connect' => [
            'label' => 'Connetti',
            'tooltip' => 'Connetti account social',
        ],
        'disconnect' => [
            'label' => 'Disconnetti',
            'tooltip' => 'Disconnetti account social',
        ],
    ],
    'messages' => [
        'connected' => 'Account social connesso con successo',
        'disconnected' => 'Account social disconnesso con successo',
    ],
];
