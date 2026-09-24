<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: resources/lang/it/team_permission.php
return [
    'navigation' => [
        'label' => 'Permessi Team',
        'plural' => 'Permessi Team',
        'icon' => 'heroicon-o-lock-closed',
        'group' => 'Team',
        'sort' => 20,
    ],
    'label' => 'Permesso Team',
    'plural_label' => 'Permessi Team',
    'fields' => [
        'id' => [
            'label' => 'ID',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'team_id' => [
            'label' => 'Team',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'team.name' => [
            'label' => 'Team',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'user_id' => [
            'label' => 'Utente',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'user.name' => [
            'label' => 'Utente',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'permission' => [
            'label' => 'Permesso',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'Creato il',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'updated_at' => [
            'label' => 'Aggiornato il',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'actions' => [
    ],
];
