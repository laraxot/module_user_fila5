<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/it/devices.php
return [
    'fields' => [
        'login_at' => [
            'label' => 'login_at',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'logout_at' => [
            'label' => 'logout_at',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'navigation' => [
        'name' => 'Devices',
        'plural' => 'Devices',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Devices',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
    ],
    'label' => 'Devices',
    'plural_label' => 'Devices (Plurale)',
    'actions' => [
        'create' => [
            'label' => 'Crea Devices',
        ],
        'edit' => [
            'label' => 'Modifica Devices',
        ],
        'delete' => [
            'label' => 'Elimina Devices',
        ],
    ],
];
