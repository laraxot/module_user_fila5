<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: resources/lang/it/device.php
return [
    'fields' => [
        'is_robot' => [
            'label' => 'È Robot',
            'helper_text' => 'Indica se il dispositivo è un robot',
            'tooltip' => '',
            'description' => '',
        ],
        'is_desktop' => [
            'label' => 'È Desktop',
            'helper_text' => 'Indica se il dispositivo è un desktop',
            'tooltip' => '',
            'description' => '',
        ],
        'is_mobile' => [
            'label' => 'È Mobile',
            'helper_text' => 'Indica se il dispositivo è mobile',
            'tooltip' => '',
            'description' => '',
        ],
        'is_tablet' => [
            'label' => 'È Tablet',
            'helper_text' => 'Indica se il dispositivo è un tablet',
            'tooltip' => '',
            'description' => '',
        ],
        'is_phone' => [
            'label' => 'È Telefono',
            'helper_text' => 'Indica se il dispositivo è un telefono',
            'tooltip' => '',
            'description' => '',
        ],
    ],
    'actions' => [
        'create' => [
            'label' => 'Crea Dispositivo',
            'icon' => 'heroicon-o-plus',
            'color' => 'primary',
        ],
        'edit' => [
            'label' => 'Modifica Dispositivo',
            'icon' => 'heroicon-o-pencil',
            'color' => 'warning',
        ],
        'delete' => [
            'label' => 'Elimina Dispositivo',
            'icon' => 'heroicon-o-trash',
            'color' => 'danger',
        ],
    ],
    'navigation' => [
        'label' => 'Missing Navigation Label',
        'plural_label' => 'Missing Navigation Plural Label',
        'group' => 'Missing Group',
        'icon' => 'heroicon-o-puzzle-piece',
        'sort' => 100,
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
];
