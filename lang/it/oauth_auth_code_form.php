<?php

declare(strict_types=1);

return [
    'fields' => [
        'user_id' => ['label' => 'user_id', 'placeholder' => 'user_id', 'helper_text' => '', 'description' => 'user_id'],
        'client_id' => ['label' => 'client_id', 'placeholder' => 'client_id', 'helper_text' => '', 'description' => 'client_id'],
        'scopes' => ['label' => 'scopes', 'placeholder' => 'scopes', 'helper_text' => '', 'description' => 'scopes'],
        'revoked' => ['label' => 'revoked', 'placeholder' => 'revoked', 'helper_text' => '', 'description' => 'revoked'],
        'name' => ['label' => 'name', 'placeholder' => 'name', 'helper_text' => '', 'description' => 'name'],
        'expires_at' => ['label' => 'expires_at', 'placeholder' => 'expires_at', 'helper_text' => '', 'description' => 'expires_at'],
    ],
    'sections' => [
        'empty' => ['label' => 'empty', 'heading' => 'empty'],
        'Codice Autorizzazione OAuth' => ['label' => 'Codice Autorizzazione OAuth', 'heading' => 'Codice Autorizzazione OAuth'],
    ],
];
