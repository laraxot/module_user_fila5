<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/it/recent_logins.php
return [
    // User — translation section (claude-audit doc ratio).
    // User — translation section (claude-audit doc ratio).
    // User — translation section (claude-audit doc ratio).
    'fields' => [
        'authenticatable' => [
            'name' => ['label' => 'authenticatable.name'],
            'label' => '',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'login_at' => ['label' => 'login_at', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'ip_address' => ['label' => 'ip_address', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'user_agent' => ['label' => 'user_agent', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'toggleColumns' => ['label' => 'toggleColumns', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'reorderRecords' => ['label' => 'reorderRecords', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'resetFilters' => ['label' => 'resetFilters', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'applyFilters' => ['label' => 'applyFilters', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'openFilters' => ['label' => 'openFilters', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'user' => ['label' => 'user', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
    ],
    'actions' => [
        'reorderRecords' => ['icon' => 'reorderRecords', 'label' => 'reorderRecords', 'tooltip' => 'reorderRecords'],
        'openColumnManager' => ['icon' => 'openColumnManager', 'label' => 'openColumnManager', 'tooltip' => 'openColumnManager'],
        'applyTableColumnManager' => ['icon' => 'applyTableColumnManager', 'label' => 'applyTableColumnManager', 'tooltip' => 'applyTableColumnManager'],
        'resetFilters' => ['icon' => 'resetFilters', 'label' => 'resetFilters', 'tooltip' => 'resetFilters'],
        'applyFilters' => ['icon' => 'applyFilters', 'tooltip' => 'applyFilters', 'label' => 'applyFilters'],
        'openFilters' => ['tooltip' => 'openFilters', 'icon' => 'openFilters', 'label' => 'openFilters'],
        'resetColumnManager' => ['tooltip' => 'resetColumnManager', 'icon' => 'resetColumnManager', 'label' => 'resetColumnManager'],
    ],
    'navigation' => [
        'name' => 'Recent Logins',
        'plural' => 'Recent Logins',
        'group' => ['name' => 'General', 'description' => 'General Settings'],
        'label' => 'Recent Logins',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
    ],
    'label' => 'Recent Logins',
    'plural_label' => 'Recent Logins (Plurale)',
];
