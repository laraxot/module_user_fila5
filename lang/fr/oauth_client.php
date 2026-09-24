<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/fr/oauth_client.php
return [
    'navigation' => [
        'label' => 'Client OAuth',
        'group' => '',
        'icon' => 'heroicon-o-key',
        'sort' => 46,
    ],
    'label' => 'Client OAuth',
    'plural_label' => 'Clients OAuth',
    'fields' => [
        'id' => [
            'label' => 'ID',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'user_id' => [
            'label' => 'Utilisateur',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'name' => [
            'label' => 'Nom',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'secret' => [
            'label' => 'Secret',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'provider' => [
            'label' => 'Fournisseur',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'redirect' => [
            'label' => 'Redirection',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'personal_access_client' => [
            'label' => 'Client d\'accès personnel',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'password_client' => [
            'label' => 'Client de mot de passe',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'revoked' => [
            'label' => 'Révoqué',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'Créé le',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'updated_at' => [
            'label' => 'Mis à jour le',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'actions' => [
        'create_client' => [
            'label' => 'Créer un client',
        ],
        'revoke' => [
            'label' => 'Révoquer',
        ],
    ],
];
