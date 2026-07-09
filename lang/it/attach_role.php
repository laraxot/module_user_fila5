<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/it/attach_role.php
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
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Attach Role',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
    ],
    'label' => 'Attach Role',
    'plural_label' => 'Attach Role (Plurale)',
];
