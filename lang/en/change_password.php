<?php

declare(strict_types=1);

return [
    'fields' => [
        'new_password_confirmation' => [
            'label' => 'Confirm new password',
            'description' => 'Please type the new password again to confirm',
            'helper_text' => '',
            'placeholder' => 'Re-enter your new password',
            'tooltip' => '',
        ],
        'changePassword' => [
            'label' => 'Change password',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'navigation' => [
        'label' => 'Missing Navigation Label',
        'plural_label' => 'Missing Navigation Plural Label',
        'group' => [
            'name' => 'Authentication',
            'description' => 'Sign-in, registration and credentials',
        ],
        'icon' => 'heroicon-o-puzzle-piece',
        'sort' => 100,
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
    'actions' => [
    ],
];
