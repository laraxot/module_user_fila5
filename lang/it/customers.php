<?php

declare(strict_types=1);

return [
    'fields' => [
        'id' => ['label' => 'ID'],
        'name' => ['label' => 'Nome'],
        'slug' => ['label' => 'Codice'],
        'domain' => ['label' => 'Dominio'],
        'email_address' => ['label' => 'E-mail'],
        'phone' => ['label' => 'Telefono'],
        'is_active' => ['label' => 'Attivo'],
        'created_at' => ['label' => 'Creato il'],
        'updated_at' => ['label' => 'Modificato il'],
        'email' => ['label' => 'E-mail'],
        'mobile_phone' => ['label' => 'Cellulare'],
        'team_id' => ['label' => 'Team'],
        'user_id' => ['label' => 'Utente'],
    ],
    'actions' => [
        'create' => ['label' => 'create', 'icon' => 'create', 'tooltip' => 'create'],
        'layout' => ['label' => 'layout', 'icon' => 'layout', 'tooltip' => 'layout'],
        'delete' => ['label' => 'delete', 'icon' => 'delete', 'tooltip' => 'delete'],
        'edit' => ['tooltip' => 'edit', 'icon' => 'edit', 'label' => 'edit'],
        'view' => ['label' => 'view', 'icon' => 'view', 'tooltip' => 'view'],
    ],
];
