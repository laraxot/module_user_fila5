<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/de/base_profile.php
return [
    'model' => [
        'label' => 'Profilo Base',
    ],
    'navigation' => [
        'name' => 'Profilo',
        'plural' => 'Profili',
        'group' => [
            'name' => 'Gestione Utenti',
            'description' => 'Gestione dei profili',
        ],
        'label' => 'profili',
        'sort' => '31',
        'icon' => 'user-user-permission',
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
    'fields' => [
    ],
    'actions' => [
    ],
];
