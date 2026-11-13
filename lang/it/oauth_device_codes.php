<?php

declare(strict_types=1);

return [
    'fields' => [
        'id' => ['label' => 'ID'],
        'name' => ['label' => 'Nome'],
        'created_at' => ['label' => 'Creato il'],
        'user_id' => ['label' => 'Utente'],
        'client_id' => ['label' => 'Client ID'],
        'revoked' => ['label' => 'Revocato'],
        'user_approved_at' => ['label' => 'Approvato il'],
        'expires_at' => ['label' => 'Scade il'],
        'last_polled_at' => ['label' => 'last_polled_at'],
        'scopes' => ['label' => 'Ambiti'],
    ],
    'actions' => [
        'create' => ['label' => 'create', 'icon' => 'create', 'tooltip' => 'create'],
        'view' => ['label' => 'view', 'icon' => 'view', 'tooltip' => 'view'],
        'edit' => ['label' => 'edit', 'icon' => 'edit', 'tooltip' => 'edit'],
        'delete' => ['label' => 'delete', 'icon' => 'delete', 'tooltip' => 'delete'],
        'layout' => ['label' => 'layout', 'icon' => 'layout', 'tooltip' => 'layout'],
    ],
];
