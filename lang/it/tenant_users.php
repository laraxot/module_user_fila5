<?php

declare(strict_types=1);

return [
    'fields' => [
        'id' => ['label' => 'ID'],
        'uuid' => ['label' => 'UUID'],
        'user_id' => ['label' => 'Utente'],
        'tenant_id' => ['label' => 'Tenant'],
        'role' => ['label' => 'Ruolo'],
        'permissions' => ['label' => 'Permessi'],
        'created_at' => ['label' => 'Creato il'],
        'updated_at' => ['label' => 'Modificato il'],
        'deleted_at' => ['label' => 'Eliminato il'],
        'updated_by' => ['label' => 'Modificato da'],
        'created_by' => ['label' => 'Creato da'],
        'deleted_by' => ['label' => 'Eliminato da'],
    ],
    'actions' => [
        'create' => ['label' => 'create', 'icon' => 'create', 'tooltip' => 'create'],
        'layout' => ['label' => 'layout', 'icon' => 'layout', 'tooltip' => 'layout'],
        'delete' => ['label' => 'delete', 'icon' => 'delete', 'tooltip' => 'delete'],
        'edit' => ['tooltip' => 'edit', 'label' => 'edit', 'icon' => 'edit'],
        'view' => ['label' => 'view', 'icon' => 'view', 'tooltip' => 'view'],
    ],
];
