<?php

declare(strict_types=1);

return [
    'fields' => [
        'logo' => ['label' => 'logo', 'placeholder' => 'logo', 'helper_text' => '', 'description' => 'logo', 'tooltip' => ''],
        'logo_dark' => ['label' => 'logo_dark', 'placeholder' => 'logo_dark', 'helper_text' => '', 'description' => 'logo_dark', 'tooltip' => ''],
        'logo_height' => ['label' => 'logo_height', 'placeholder' => 'logo_height', 'helper_text' => '', 'description' => 'logo_height', 'tooltip' => ''],
    ],
    'actions' => [
        'updateLogoAction' => ['label' => 'updateLogoAction', 'tooltip' => 'updateLogoAction', 'icon' => 'updateLogoAction'],
        'save' => ['label' => 'save', 'icon' => 'save', 'tooltip' => 'save'],
    ],
    'navigation' => [
        'name' => 'Logo',
        'plural' => 'Logo',
        'group' => ['name' => 'Aspetto', 'description' => 'Personalizzazione dell\'aspetto del sistema'],
        'label' => 'Logo',
        'sort' => 10,
        'icon' => 'heroicon-o-photo',
    ],
    'label' => 'Logo',
    'plural_label' => 'Logo (Plurale)',
];
