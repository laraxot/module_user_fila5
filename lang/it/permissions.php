<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/it/permissions.php
return [
    'fields' => [
        'id' => [
            'label' => 'id',
        ],
        'name' => [
            'label' => 'name',
        ],
        'guard_name' => [
            'label' => 'guard_name',
        ],
        'display_name' => [
            'label' => 'display_name',
        ],
        'description' => [
            'label' => 'description',
        ],
        'created_at' => [
            'label' => 'created_at',
        ],
        'updated_at' => [
            'label' => 'updated_at',
        ],
    ],
];
