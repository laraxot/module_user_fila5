<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/it/oauth_clients.php
return [
    'fields' => [
        'id' => [
            'label' => 'id',
        ],
        'user_id' => [
            'label' => 'user_id',
        ],
        'name' => [
            'label' => 'name',
        ],
        'provider' => [
            'label' => 'provider',
        ],
        'redirect' => [
            'label' => 'redirect',
        ],
        'personal_access_client' => [
            'label' => 'personal_access_client',
        ],
        'password_client' => [
            'label' => 'password_client',
        ],
        'revoked' => [
            'label' => 'revoked',
        ],
        'created_at' => [
            'label' => 'created_at',
        ],
        'updated_at' => [
            'label' => 'updated_at',
        ],
    ],
];
