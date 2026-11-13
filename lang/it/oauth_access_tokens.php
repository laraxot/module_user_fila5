<?php

declare(strict_types=1);

return [
    'fields' => [
        'id' => ['label' => 'ID'],
        'user_id' => ['label' => 'Utente'],
        'client_id' => ['label' => 'Client ID'],
        'name' => ['label' => 'Nome'],
        'scopes' => ['label' => 'Ambiti'],
        'revoked' => ['label' => 'Revocato'],
        'expires_at' => ['label' => 'Scade il'],
        'created_at' => ['label' => 'Creato il'],
        'updated_at' => ['label' => 'Modificato il'],
        'deleted_at' => ['label' => 'Eliminato il'],
        'uuid' => ['label' => 'UUID'],
        'tokenable_type' => ['label' => 'Tipo di proprietario'],
        'tokenable_id' => ['label' => 'Proprietario'],
        'token' => ['label' => 'Token'],
        'abilities' => ['label' => 'Permessi'],
        'last_used_at' => ['label' => 'Ultimo uso'],
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
