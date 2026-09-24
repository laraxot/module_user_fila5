<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/es/authentication_log.php
return [
    'navigation' => [
        'group' => 'Autenticación',
        'icon' => 'heroicon-o-shield-exclamation',
        'label' => 'Registros de Autenticación',
        'sort' => 5,
    ],
    'actions' => [
        'reorderRecords' => [
            'tooltip' => 'Reordenar Registros',
            'icon' => 'reorderRecords',
            'label' => 'Reordenar Registros',
        ],
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
    'fields' => [
    ],
];
