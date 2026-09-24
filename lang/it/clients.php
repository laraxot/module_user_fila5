<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/it/clients.php
return [
    'fields' => [
        'name' => [
            'label' => 'name',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'navigation' => [
        'name' => 'Clients',
        'plural' => 'Clients',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Clients',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
    ],
    'label' => 'Clients',
    'plural_label' => 'Clients (Plurale)',
    'actions' => [
        'create' => [
            'label' => 'Crea Clients',
        ],
        'edit' => [
            'label' => 'Modifica Clients',
        ],
        'delete' => [
            'label' => 'Elimina Clients',
        ],
    ],
];
