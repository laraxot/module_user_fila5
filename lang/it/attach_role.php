<?php

declare(strict_types=1);

return [
    'fields' => [
        'recordId' => [
            'label' => 'recordId',
            'placeholder' => 'recordId',
            'helper_text' => 'recordId',
            'description' => 'recordId',
            'tooltip' => '',
        ],
        'team_id' => [
            'label' => 'team_id',
            'placeholder' => 'team_id',
            'helper_text' => 'team_id',
            'description' => 'team_id',
            'tooltip' => '',
        ],
    ],
    'actions' => [
        'submit' => [
            'label' => 'submit',
            'icon' => 'submit',
            'tooltip' => 'submit',
        ],
        'attachAnother' => [
            'label' => 'attachAnother',
            'icon' => 'attachAnother',
            'tooltip' => 'attachAnother',
        ],
        'cancel' => [
            'label' => 'cancel',
            'icon' => 'cancel',
            'tooltip' => 'cancel',
        ],
    ],
    'navigation' => [
        'name' => 'Attach Role',
        'plural' => 'Attach Role',
        'group' => [
            'name' => 'Ruoli e permessi',
            'description' => 'Controllo degli accessi',
        ],
        'label' => 'Attach Role',
        'sort' => 1,
        'icon' => 'heroicon-o-rectangle-stack',
    ],
    'label' => 'Attach Role',
    'plural_label' => 'Attach Role (Plurale)',
];
