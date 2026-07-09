<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/it/tokens.php
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
        'name' => 'Tokens',
        'plural' => 'Tokens',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Tokens',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
    ],
    'label' => 'Tokens',
    'plural_label' => 'Tokens (Plurale)',
    'actions' => [
        'create' => [
            'label' => 'Crea Tokens',
        ],
        'edit' => [
            'label' => 'Modifica Tokens',
        ],
        'delete' => [
            'label' => 'Elimina Tokens',
        ],
    ],
];
