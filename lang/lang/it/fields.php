<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/lang/it/fields.php
return [
    'name' => 'Nome',
    'slug' => 'Slug',
    'email' => 'Email',
    'created_at' => 'Creato il',
    'updated_at' => 'Aggiornato il',
    'role' => 'Ruolo',
    'id.label' => 'ID',
    'name.label' => 'Nome',
    'slug.label' => 'Slug',
    'actions' => [
        'attach_user' => 'Attacca utente',
    ],
    'new_password' => [
        'label' => 'Nuova Password',
        'placeholder' => 'Inserisci la tua nuova password',
    ],
    'confirm_password' => [
        'label' => 'Conferma Password',
        'placeholder' => 'Conferma la tua nuova password',
    ],
];
