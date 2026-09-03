<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Token',
        'plural' => 'Tokens',
        'group' => ['name' => 'OAuth', 'description' => 'Client, token e API Passport'],
        'label' => 'token',
        'sort' => 29,
        'icon' => 'user-user-token',
    ],
    'fields' => [
        'name' => ['label' => 'name', 'tooltip' => '', 'helper_text' => '', 'description' => '', 'placeholder' => 'name'],
        'create' => ['label' => 'create', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'edit' => ['label' => 'edit', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'delete' => ['label' => 'delete', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'toggleColumns' => ['label' => 'toggleColumns', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'reorderRecords' => ['label' => 'reorderRecords', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
    ],
    'actions' => [
        'reorderRecords' => ['tooltip' => 'reorderRecords', 'icon' => 'reorderRecords', 'label' => 'reorderRecords'],
        'edit' => ['label' => 'edit', 'icon' => 'edit', 'tooltip' => 'edit'],
        'delete' => ['label' => 'delete', 'icon' => 'delete', 'tooltip' => 'delete'],
        'create' => ['label' => 'create', 'icon' => 'create', 'tooltip' => 'create'],
        'applyFilters' => ['label' => 'applyFilters', 'icon' => 'applyFilters', 'tooltip' => 'applyFilters'],
        'openFilters' => ['label' => 'openFilters', 'icon' => 'openFilters', 'tooltip' => 'openFilters'],
        'resetFilters' => ['label' => 'resetFilters', 'icon' => 'resetFilters', 'tooltip' => 'resetFilters'],
        'applyTableColumnManager' => ['label' => 'applyTableColumnManager', 'icon' => 'applyTableColumnManager', 'tooltip' => 'applyTableColumnManager'],
        'openColumnManager' => ['label' => 'openColumnManager', 'icon' => 'openColumnManager', 'tooltip' => 'openColumnManager'],
        'resetColumnManager' => ['label' => 'resetColumnManager', 'icon' => 'resetColumnManager', 'tooltip' => 'resetColumnManager'],
        'submit' => ['label' => 'submit', 'icon' => 'submit', 'tooltip' => 'submit'],
        'createAnother' => ['label' => 'createAnother', 'icon' => 'createAnother', 'tooltip' => 'createAnother'],
        'cancel' => ['label' => 'cancel', 'icon' => 'cancel', 'tooltip' => 'cancel'],
    ],
    'label' => 'Token',
    'plural_label' => 'Token (Plurale)',
];
