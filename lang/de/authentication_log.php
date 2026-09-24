<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/de/authentication_log.php
return [
    'navigation' => [
        'group' => 'Authentifizierung',
        'icon' => 'heroicon-o-shield-exclamation',
        'label' => 'Authentifizierungsprotokolle',
        'sort' => 5,
    ],
    'actions' => [
        'reorderRecords' => [
            'tooltip' => 'Datensätze Neu Anordnen',
            'icon' => 'reorderRecords',
            'label' => 'Datensätze Neu Anordnen',
        ],
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
    'fields' => [
    ],
];
