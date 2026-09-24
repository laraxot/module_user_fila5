<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: resources/lang/en/team_permission.php
return [
    'navigation' => [
        'label' => 'Team Permissions',
        'plural' => 'Team Permissions',
        'icon' => 'heroicon-o-lock-closed',
        'group' => 'Teams',
        'sort' => 20,
    ],
    'label' => 'Team Permission',
    'plural_label' => 'Team Permissions',
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
            'label' => 'User',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'user.name' => [
            'label' => 'User',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'permission' => [
            'label' => 'Permission',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'Created At',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'updated_at' => [
            'label' => 'Updated At',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'actions' => [
    ],
];
