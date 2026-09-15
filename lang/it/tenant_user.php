<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Utente Tenant',
        'plural' => 'Utenti Tenant',
        'label' => 'Utenti Tenant',
        'group' => ['name' => 'Tenants', 'description' => 'Gestione degli utenti associati ai tenant'],
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
        'create' => ['label' => 'Crea Tenant User', 'icon' => 'create', 'tooltip' => 'create'],
        'edit' => ['label' => 'Modifica Tenant User'],
        'delete' => ['label' => 'Elimina Tenant User', 'icon' => 'delete', 'tooltip' => 'delete'],
        'resetColumnManager' => ['tooltip' => 'resetColumnManager'],
        'createAnother' => ['label' => 'createAnother', 'icon' => 'createAnother', 'tooltip' => 'createAnother'],
        'save' => ['label' => 'save', 'icon' => 'save', 'tooltip' => 'save'],
    ],
];
