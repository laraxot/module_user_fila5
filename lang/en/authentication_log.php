<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/en/authentication_log.php
return [
    'navigation' => [
        'group' => 'Authentication',
        'icon' => 'heroicon-o-shield-exclamation',
        'label' => 'Authentication Logs',
        'sort' => 5,
    ],
    'actions' => [
        'reorderRecords' => [
            'tooltip' => 'Reorder Records',
            'icon' => 'reorderRecords',
            'label' => 'Reorder Records',
        ],
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
    'fields' => [
    ],
];
