<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Utente Tenant',
        'plural' => 'Utenti Tenant',
        'label' => 'Utenti Tenant',
        'group' => ['name' => 'Team e tenant', 'description' => 'Organizzazioni, inviti e appartenenze'],
        'sort' => 87,
        'icon' => 'heroicon-o-building-office',
    ],
    'label' => 'Tenant User',
    'plural_label' => 'Tenant User (Plurale)',
    'fields' => [
        'id' => ['label' => 'Identificativo', 'tooltip' => 'Identificativo univoco del record', 'helper_text' => '', 'description' => ''],
        'created_at' => ['label' => 'Data Creazione', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'updated_at' => ['label' => 'Ultima Modifica', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
    ],
    'actions' => [
        'create' => ['label' => 'Crea Tenant User', 'tooltip' => 'create', 'icon' => 'create'],
        'edit' => ['label' => 'Modifica Tenant User', 'tooltip' => 'edit'],
        'delete' => ['label' => 'Elimina Tenant User', 'tooltip' => 'delete', 'icon' => 'delete'],
        'resetColumnManager' => ['tooltip' => 'resetColumnManager', 'icon' => 'resetColumnManager', 'label' => 'resetColumnManager'],
        'applyTableColumnManager' => ['tooltip' => 'applyTableColumnManager', 'icon' => 'applyTableColumnManager', 'label' => 'applyTableColumnManager'],
        'openColumnManager' => ['tooltip' => 'openColumnManager', 'icon' => 'openColumnManager', 'label' => 'openColumnManager'],
        'logout' => ['tooltip' => 'logout', 'icon' => 'logout', 'label' => 'logout'],
        'layout' => ['tooltip' => 'layout', 'icon' => 'layout', 'label' => 'layout'],
        'cancel' => ['tooltip' => 'cancel', 'icon' => 'cancel', 'label' => 'cancel'],
        'save' => ['tooltip' => 'save', 'icon' => 'save'],
        'profile' => ['tooltip' => 'profile', 'icon' => 'profile', 'label' => 'profile'],
        'reorderRecords' => ['tooltip' => 'reorderRecords', 'icon' => 'reorderRecords', 'label' => 'reorderRecords'],
        'createAnother' => ['tooltip' => 'createAnother'],
        'resetFilters' => ['tooltip' => 'resetFilters', 'icon' => 'resetFilters', 'label' => 'resetFilters'],
    ],
];
