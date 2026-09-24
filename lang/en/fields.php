<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/en/fields.php
return [
    'new_password' => [
        'label' => 'New Password',
        'placeholder' => 'Enter your new password',
    ],
    'confirm_password' => [
        'label' => 'Confirm Password',
        'placeholder' => 'Confirm your new password',
    ],
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
];
