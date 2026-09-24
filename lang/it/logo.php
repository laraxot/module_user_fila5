<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/it/logo.php
return [
    'fields' => [
        'logo' => [
            'label' => 'logo',
            'placeholder' => 'logo',
            'helper_text' => 'logo',
            'description' => 'logo',
            'tooltip' => '',
        ],
        'logo_dark' => [
            'label' => 'logo_dark',
            'placeholder' => 'logo_dark',
            'helper_text' => 'logo_dark',
            'description' => 'logo_dark',
            'tooltip' => '',
        ],
        'logo_height' => [
            'label' => 'logo_height',
            'placeholder' => 'logo_height',
            'helper_text' => 'logo_height',
            'description' => 'logo_height',
            'tooltip' => '',
        ],
    ],
    'actions' => [
        'updateLogoAction' => [
            'label' => 'updateLogoAction',
            'tooltip' => 'updateLogoAction',
            'icon' => 'updateLogoAction',
        ],
    ],
    'navigation' => [
        'name' => 'Logo',
        'plural' => 'Logo',
        'group' => [
            'name' => 'Aspetto',
            'description' => 'Personalizzazione dell\'aspetto del sistema',
        ],
        'label' => 'Logo',
        'sort' => 10,
        'icon' => 'heroicon-o-photo',
    ],
    'label' => 'Logo',
    'plural_label' => 'Logo (Plurale)',
];
