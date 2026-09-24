<?php

declare(strict_types=1);

<<<<<<< HEAD
return [
    'fields' => [
        'id' => ['label' => 'id'],
        'user_id' => ['label' => 'user_id'],
        'client_id' => ['label' => 'client_id'],
        'name' => ['label' => 'name'],
        'scopes' => ['label' => 'scopes'],
        'revoked' => ['label' => 'revoked'],
        'expires_at' => ['label' => 'expires_at'],
        'created_at' => ['label' => 'created_at'],
        'updated_at' => ['label' => 'updated_at'],
        'deleted_at' => ['label' => 'deleted_at'],
        'uuid' => ['label' => 'uuid'],
        'tokenable_type' => ['label' => 'tokenable_type'],
        'tokenable_id' => ['label' => 'tokenable_id'],
        'token' => ['label' => 'token'],
        'abilities' => ['label' => 'abilities'],
        'last_used_at' => ['label' => 'last_used_at'],
        'updated_by' => ['label' => 'updated_by'],
        'created_by' => ['label' => 'created_by'],
        'deleted_by' => ['label' => 'deleted_by'],
    ],
    'actions' => [
        'create' => ['label' => 'create', 'icon' => 'create', 'tooltip' => 'create'],
        'layout' => ['label' => 'layout', 'icon' => 'layout', 'tooltip' => 'layout'],
        'delete' => ['label' => 'delete', 'icon' => 'delete', 'tooltip' => 'delete'],
        'view' => ['label' => 'view', 'icon' => 'view', 'tooltip' => 'view'],
        'edit' => ['label' => 'edit', 'icon' => 'edit', 'tooltip' => 'edit'],
        'save' => ['label' => 'save', 'icon' => 'save', 'tooltip' => 'save'],
=======
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
>>>>>>> 350420cb (Check & fix styling)
    ],
];
