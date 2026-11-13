<?php

declare(strict_types=1);

return [
    'fields' => [
        'id' => ['label' => 'ID'],
        'uuid' => ['label' => 'UUID'],
        'authenticatable_id' => ['label' => 'authenticatable_id'],
        'ip_address' => ['label' => 'Indirizzo IP'],
        'user_agent' => ['label' => 'Browser (user agent)'],
        'login_at' => ['label' => 'Accesso il'],
        'login_successful' => ['label' => 'Accesso riuscito'],
        'logout_at' => ['label' => 'Uscita il'],
        'cleared_by_user' => ['label' => 'cleared_by_user'],
        'location' => ['label' => 'Luogo'],
        'created_at' => ['label' => 'Creato il'],
        'updated_at' => ['label' => 'Modificato il'],
        'updated_by' => ['label' => 'Modificato da'],
        'created_by' => ['label' => 'Creato da'],
    ],
    'actions' => [
        'create' => ['label' => 'create', 'icon' => 'create', 'tooltip' => 'create'],
        'layout' => ['label' => 'layout', 'icon' => 'layout', 'tooltip' => 'layout'],
        'delete' => ['label' => 'delete', 'icon' => 'delete', 'tooltip' => 'delete'],
        'view' => ['label' => 'view', 'icon' => 'view', 'tooltip' => 'view'],
        'edit' => ['label' => 'edit', 'icon' => 'edit', 'tooltip' => 'edit'],
    ],
];
