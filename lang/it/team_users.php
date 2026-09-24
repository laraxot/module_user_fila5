<?php

declare(strict_types=1);

<<<<<<< HEAD
return [
    'fields' => [
        'id' => ['label' => 'id'],
        'uuid' => ['label' => 'uuid'],
        'role' => ['label' => 'role'],
        'team_id' => ['label' => 'team_id'],
        'user_id' => ['label' => 'user_id'],
        'customer_id' => ['label' => 'customer_id'],
        'joined_at' => ['label' => 'joined_at'],
        'created_at' => ['label' => 'created_at'],
        'updated_at' => ['label' => 'updated_at'],
    ],
    'actions' => [
        'create' => ['label' => 'create', 'icon' => 'create', 'tooltip' => 'create'],
        'layout' => ['label' => 'layout', 'icon' => 'layout', 'tooltip' => 'layout'],
        'delete' => ['label' => 'delete', 'icon' => 'delete', 'tooltip' => 'delete'],
        'edit' => ['tooltip' => 'edit', 'icon' => 'edit', 'label' => 'edit'],
        'view' => ['label' => 'view', 'icon' => 'view', 'tooltip' => 'view'],
=======
// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/it/team_users.php
return [
    'fields' => [
        'id' => [
            'label' => 'id',
        ],
        'uuid' => [
            'label' => 'uuid',
        ],
        'role' => [
            'label' => 'role',
        ],
        'team_id' => [
            'label' => 'team_id',
        ],
        'user_id' => [
            'label' => 'user_id',
        ],
        'customer_id' => [
            'label' => 'customer_id',
        ],
        'joined_at' => [
            'label' => 'joined_at',
        ],
        'created_at' => [
            'label' => 'created_at',
        ],
        'updated_at' => [
            'label' => 'updated_at',
        ],
>>>>>>> 350420cb (Check & fix styling)
    ],
];
