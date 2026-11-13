<?php

declare(strict_types=1);

return [
    'actions' => [
        'delete' => [
            'label' => 'delete',
            'icon' => 'delete',
        ],
        'cancel' => [
            'label' => 'cancel',
            'icon' => 'ui-cancel',
        ],
        'save' => [
            'label' => 'save',
            'icon' => 'ui-save',
        ],
        'logout' => [
            'icon' => 'ui-logout',
            'label' => 'logout',
        ],
        'profile' => [
            'icon' => 'profile',
            'label' => 'profile',
        ],
    ],
    'fields' => [
        'password' => [
            'label' => 'Password',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'email' => [
            'label' => 'E-mail',
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
    ],
    'navigation' => [
        'name' => 'Edit User',
        'plural' => 'Edit User',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Edit User',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
    ],
    'label' => 'Edit User',
    'plural_label' => 'Edit User (Plurale)',
];
