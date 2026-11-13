<?php

declare(strict_types=1);

return [
    'fields' => [
        'id' => ['label' => 'ID'],
        'name' => ['label' => 'Nome'],
        'created_at' => ['label' => 'Creato il'],
        'user' => [
            'name' => ['label' => 'Utente'],
        ],
        'first_name' => ['label' => 'Nome'],
        'last_name' => ['label' => 'Cognome'],
        'email' => ['label' => 'E-mail'],
        'is_active' => ['label' => 'Attivo'],
        'photo' => ['label' => 'Foto'],
    ],
    'actions' => [
        'create' => ['label' => 'create', 'icon' => 'create', 'tooltip' => 'create'],
        'layout' => ['label' => 'layout', 'icon' => 'layout', 'tooltip' => 'layout'],
        'delete' => ['label' => 'delete', 'icon' => 'delete', 'tooltip' => 'delete'],
    ],
];
