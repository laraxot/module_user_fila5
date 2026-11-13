<?php

declare(strict_types=1);

return [
    'fields' => [
        'id' => ['label' => 'ID'],
        'uuid' => ['label' => 'UUID'],
        'name' => ['label' => 'Nome'],
        'slug' => ['label' => 'Codice'],
        'provider' => ['label' => 'Provider'],
        'is_active' => ['label' => 'Attivo'],
        'created_at' => ['label' => 'Creato il'],
        'updated_at' => ['label' => 'Modificato il'],
        'updated_by' => ['label' => 'Modificato da'],
        'created_by' => ['label' => 'Creato da'],
        'display_name' => ['label' => 'Nome visualizzato'],
        'type' => ['label' => 'Tipo'],
        'entity_id' => ['label' => 'entity_id'],
        'redirect_url' => ['label' => 'URL di ritorno'],
    ],
    'actions' => [
        'create' => ['label' => 'create', 'icon' => 'create', 'tooltip' => 'create'],
        'layout' => ['label' => 'layout', 'icon' => 'layout', 'tooltip' => 'layout'],
        'delete' => ['label' => 'delete', 'icon' => 'delete', 'tooltip' => 'delete'],
        'view' => ['label' => 'view', 'icon' => 'view', 'tooltip' => 'view'],
        'edit' => ['label' => 'edit', 'icon' => 'edit', 'tooltip' => 'edit'],
    ],
];
