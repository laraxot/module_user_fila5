<?php

declare(strict_types=1);

return [
    'fields' => [
        'id' => ['label' => 'ID'],
        'user_id' => ['label' => 'Utente'],
        'name' => ['label' => 'Nome'],
        'provider' => ['label' => 'Provider'],
        'redirect' => ['label' => 'URL di ritorno'],
        'personal_access_client' => ['label' => 'Client di accesso personale'],
        'password_client' => ['label' => 'Client password'],
        'revoked' => ['label' => 'Revocato'],
        'created_at' => ['label' => 'Creato il'],
        'updated_at' => ['label' => 'Modificato il'],
        'user' => [
            'name' => ['label' => 'Utente'],
        ],
    ],
    'sections' => [
        'OAuth Client Information' => ['label' => 'OAuth Client Information', 'heading' => 'OAuth Client Information'],
    ],
];
