<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/it/personal_access_tokens.php
return [
    'fields' => [
        'id' => [
            'label' => 'id',
        ],
        'uuid' => [
            'label' => 'uuid',
        ],
        'tokenable_type' => [
            'label' => 'tokenable_type',
        ],
        'tokenable_id' => [
            'label' => 'tokenable_id',
        ],
        'name' => [
            'label' => 'name',
        ],
        'token' => [
            'label' => 'token',
        ],
        'abilities' => [
            'label' => 'abilities',
        ],
        'last_used_at' => [
            'label' => 'last_used_at',
        ],
        'expires_at' => [
            'label' => 'expires_at',
        ],
        'created_at' => [
            'label' => 'created_at',
        ],
        'updated_at' => [
            'label' => 'updated_at',
        ],
        'deleted_at' => [
            'label' => 'deleted_at',
        ],
        'updated_by' => [
            'label' => 'updated_by',
        ],
        'created_by' => [
            'label' => 'created_by',
        ],
        'deleted_by' => [
            'label' => 'deleted_by',
        ],
    ],
];
