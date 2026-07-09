<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: resources/lang/it/profile.php
return [
    'delete_account' => [
        'title' => 'Elimina Account',
        'description' => 'Una volta eliminato il tuo account, tutte le sue risorse e i dati verranno eliminati definitivamente. Prima di eliminare il tuo account, scarica tutti i dati o le informazioni che desideri conservare.',
        'password_confirmation' => 'Inserisci la tua password per confermare',
        'button' => 'Elimina Account',
    ],
    'title' => 'Profilo',
    'personal_info' => 'Informazioni Personali',
    'name' => 'Nome',
    'email' => 'Email',
    'edit' => 'Modifica Profilo',
    'manage_account' => 'Gestisci Account',
    'update_success' => 'Profilo aggiornato con successo',
    'update_error' => 'Errore durante l\'aggiornamento del profilo',
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
