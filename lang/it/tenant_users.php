<?php

declare(strict_types=1);

return [
    'fields' => [
        'id' => ['label' => 'id'],
        'uuid' => ['label' => 'uuid'],
        'user_id' => ['label' => 'user_id'],
        'tenant_id' => ['label' => 'tenant_id'],
        'role' => ['label' => 'role'],
        'permissions' => ['label' => 'permissions'],
        'created_at' => ['label' => 'created_at'],
        'updated_at' => ['label' => 'updated_at'],
        'deleted_at' => ['label' => 'deleted_at'],
        'updated_by' => ['label' => 'updated_by'],
        'created_by' => ['label' => 'created_by'],
        'deleted_by' => ['label' => 'deleted_by'],
        '_old' => ['label' => '_old'],
        'user' => [
            'name' => ['label' => 'user.name'],
        ],
        'customer' => [
            'name' => ['label' => 'customer.name'],
        ],
    ],
    'actions' => [
        'delete' => ['tooltip' => 'delete', 'icon' => 'delete', 'label' => 'delete'],
        'layout' => ['tooltip' => 'layout', 'icon' => 'layout', 'label' => 'layout'],
        'create' => ['tooltip' => 'create', 'icon' => 'create', 'label' => 'create'],
    ],
];
