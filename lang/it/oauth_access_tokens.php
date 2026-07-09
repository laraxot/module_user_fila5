<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/it/oauth_access_tokens.php
return [
    'fields' => [
        'id' => [
            'label' => 'id',
        ],
        'user_id' => [
            'label' => 'user_id',
        ],
        'client_id' => [
            'label' => 'client_id',
        ],
        'name' => [
            'label' => 'name',
        ],
        'scopes' => [
            'label' => 'scopes',
        ],
        'revoked' => [
            'label' => 'revoked',
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
    ],
];
