<?php

declare(strict_types=1);

return [
    'fields' => [
        'id' => ['label' => 'ID'],
        'uuid' => ['label' => 'UUID'],
        'role' => ['label' => 'Ruolo'],
        'team_id' => ['label' => 'Team'],
        'user_id' => ['label' => 'Utente'],
        'customer_id' => ['label' => 'customer_id'],
        'joined_at' => ['label' => 'Entrato il'],
        'created_at' => ['label' => 'Creato il'],
        'updated_at' => ['label' => 'Modificato il'],
    ],
    'actions' => [
        'create' => ['label' => 'create', 'icon' => 'create', 'tooltip' => 'create'],
        'layout' => ['label' => 'layout', 'icon' => 'layout', 'tooltip' => 'layout'],
        'delete' => ['label' => 'delete', 'icon' => 'delete', 'tooltip' => 'delete'],
        'edit' => ['tooltip' => 'edit', 'icon' => 'edit', 'label' => 'edit'],
        'view' => ['label' => 'view', 'icon' => 'view', 'tooltip' => 'view'],
    ],
];
