<?php

declare(strict_types=1);

return [
    'fields' => [
        'id' => ['label' => 'ID'],
        'uuid' => ['label' => 'UUID'],
        'team_id' => ['label' => 'Team'],
        'email' => ['label' => 'E-mail'],
        'role' => ['label' => 'Ruolo'],
        'accepted_at' => ['label' => 'Accettato il'],
        'declined_at' => ['label' => 'Rifiutato il'],
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
        'view' => ['label' => 'view', 'icon' => 'view', 'tooltip' => 'view'],
        'edit' => ['label' => 'edit', 'icon' => 'edit', 'tooltip' => 'edit'],
        'save' => ['label' => 'save', 'icon' => 'save', 'tooltip' => 'save'],
    ],
];
