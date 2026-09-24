<?php

declare(strict_types=1);

<<<<<<< HEAD
return [
    'fields' => [
        'id' => ['label' => 'id'],
        'uuid' => ['label' => 'uuid'],
        'team_id' => ['label' => 'team_id'],
        'email' => ['label' => 'email'],
        'role' => ['label' => 'role'],
        'accepted_at' => ['label' => 'accepted_at'],
        'declined_at' => ['label' => 'declined_at'],
        'created_at' => ['label' => 'created_at'],
        'updated_at' => ['label' => 'updated_at'],
        'deleted_at' => ['label' => 'deleted_at'],
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
// File: lang/it/team_invitations.php
return [
    'fields' => [
        'id' => [
            'label' => 'id',
        ],
        'uuid' => [
            'label' => 'uuid',
        ],
        'team_id' => [
            'label' => 'team_id',
        ],
        'email' => [
            'label' => 'email',
        ],
        'role' => [
            'label' => 'role',
        ],
        'accepted_at' => [
            'label' => 'accepted_at',
        ],
        'declined_at' => [
            'label' => 'declined_at',
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
>>>>>>> 350420cb (Check & fix styling)
    ],
];
