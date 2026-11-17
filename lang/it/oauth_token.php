<?php

declare(strict_types=1);

return [
    'actions' => [
        'edit' => [
            'icon' => 'edit',
        ],
        'delete' => [
            'icon' => 'delete',
        ],
        'detach' => [
            'icon' => 'detach',
        ],
        'attach' => [
            'icon' => 'attach',
        ],
        'create' => [
            'icon' => 'create',
        ],
        'applyFilters' => [
            'icon' => 'applyFilters',
        ],
        'openFilters' => [
            'icon' => 'openFilters',
        ],
        'resetFilters' => [
            'icon' => 'resetFilters',
        ],
        'applyTableColumnManager' => [
            'icon' => 'applyTableColumnManager',
        ],
        'openColumnManager' => [
            'icon' => 'openColumnManager',
        ],
        'reorderRecords' => [
            'icon' => 'reorderRecords',
        ],
    ],
    'fields' => [
        'client' => [
            'name' => [
                'label' => 'client.name',
            ],
            'label' => '',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'name' => [
            'label' => 'Nome',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'scopes' => [
            'label' => 'Ambiti',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'revoked' => [
            'label' => 'Revocato',
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
        'expires_at' => [
            'label' => 'Scade il',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'navigation' => [
        'name' => 'Oauth Token',
        'plural' => 'Oauth Token',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Oauth Token',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
    ],
    'label' => 'Oauth Token',
    'plural_label' => 'Oauth Token (Plurale)',
];
