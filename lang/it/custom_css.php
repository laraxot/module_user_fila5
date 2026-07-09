<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/it/custom_css.php
return [
    'fields' => [
        'background_color' => [
            'label' => 'background_color',
            'placeholder' => 'background_color',
            'helper_text' => 'background_color',
            'description' => 'background_color',
            'tooltip' => '',
        ],
        'background' => [
            'label' => 'background',
            'placeholder' => 'background',
            'helper_text' => 'background',
            'description' => 'background',
            'tooltip' => '',
        ],
        'overlay_color' => [
            'label' => 'overlay_color',
            'placeholder' => 'overlay_color',
            'helper_text' => 'overlay_color',
            'description' => 'overlay_color',
            'tooltip' => '',
        ],
        'overlay_opacity' => [
            'label' => 'overlay_opacity',
            'placeholder' => 'overlay_opacity',
            'helper_text' => 'overlay_opacity',
            'description' => 'overlay_opacity',
            'tooltip' => '',
        ],
    ],
    'actions' => [
        'updateAction' => [
            'label' => 'updateAction',
        ],
    ],
    'navigation' => [
        'name' => 'CSS Personalizzato',
        'plural' => 'CSS Personalizzati',
        'group' => [
            'name' => 'Aspetto',
            'description' => 'Personalizzazione CSS del tema',
        ],
        'label' => 'CSS Personalizzato',
        'sort' => 15,
        'icon' => 'heroicon-o-code-bracket',
    ],
    'label' => 'Custom Css',
    'plural_label' => 'Custom Css (Plurale)',
];
