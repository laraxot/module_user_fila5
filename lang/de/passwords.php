<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/de/passwords.php
return [
    'reset' => 'La tua password è stata reimpostata.',
    'sent' => 'Ti abbiamo inviato un’email con il link per reimpostare la password.',
    'throttled' => 'Attendi prima di riprovare.',
    'token' => 'Questo token per la reimpostazione della password non è valido.',
    'user' => 'Non riesco a trovare un utente con quell’indirizzo email.',
    'navigation' => [
        'label' => 'Missing Navigation Label',
        'plural_label' => 'Missing Navigation Plural Label',
        'group' => 'Missing Group',
        'icon' => 'heroicon-o-puzzle-piece',
        'sort' => 100,
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
    'fields' => [
    ],
    'actions' => [
    ],
];
