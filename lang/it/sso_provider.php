<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/it/sso_provider.php
return [
    'navigation' => [
        'label' => 'Provider SSO',
        'group' => 'Authentication',
        'icon' => 'heroicon-o-identification',
        'sort' => 3,
    ],
    'label' => 'Provider SSO',
    'plural_label' => 'Provider SSO',
    'fields' => [
        'id' => [
            'label' => 'Identificativo',
            'tooltip' => 'Identificativo univoco del record',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'Data Creazione',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'updated_at' => [
            'label' => 'Ultima Modifica',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'actions' => [
        'create' => [
            'label' => 'Crea Sso Provider',
        ],
        'edit' => [
            'label' => 'Modifica Sso Provider',
        ],
        'delete' => [
            'label' => 'Elimina Sso Provider',
        ],
    ],
];
