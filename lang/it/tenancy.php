<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/it/tenancy.php
return [
    'navigation' => [
        'register' => 'Registra negozio',
        'edit' => 'Modifica dati negozio',
    ],
    'fields' => [
        'name' => [
            'label' => 'Nome',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'phone' => [
            'label' => 'Telefono',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'email' => [
            'label' => 'Email',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'actions' => [
        'register_tenant' => [
            'label' => 'Aggiungi Studio',
        ],
    ],
    'label' => 'Tenancy',
    'plural_label' => 'Tenancy (Plurale)',
];
