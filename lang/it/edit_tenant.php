<?php

declare(strict_types=1);

return [
    'actions' => [
        'view' => [
            'label' => 'view',
        ],
        'delete' => [
            'label' => 'delete',
        ],
    ],
    'navigation' => [
        'name' => 'Edit Tenant',
        'plural' => 'Edit Tenant',
        'group' => [
            'name' => 'Team e tenant',
            'description' => 'Organizzazioni, inviti e appartenenze',
        ],
        'label' => 'Edit Tenant',
        'sort' => 1,
        'icon' => 'heroicon-o-rectangle-stack',
    ],
    'label' => 'Edit Tenant',
    'plural_label' => 'Edit Tenant (Plurale)',
    'fields' => [
        'id' => [
            'label' => 'Identificativo',
            'tooltip' => 'Identificativo univoco del record',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'Data Creazione',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'updated_at' => [
            'label' => 'Ultima Modifica',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
];
