<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/en/custom_css.php
return [
    'fields' => [
        'background_color' => [
            'label' => 'Background Color',
            'placeholder' => 'Background Color',
            'helper_text' => 'Background Color',
            'description' => 'Background Color',
            'tooltip' => '',
        ],
        'background' => [
            'label' => 'Background',
            'placeholder' => 'Background',
            'helper_text' => 'Background',
            'description' => 'Background',
            'tooltip' => '',
        ],
        'overlay_color' => [
            'label' => 'Overlay Color',
            'placeholder' => 'Overlay Color',
            'helper_text' => 'Overlay Color',
            'description' => 'Overlay Color',
            'tooltip' => '',
        ],
        'overlay_opacity' => [
            'label' => 'Overlay Opacity',
            'placeholder' => 'Overlay Opacity',
            'helper_text' => 'Overlay Opacity',
            'description' => 'Overlay Opacity',
            'tooltip' => '',
        ],
    ],
    'actions' => [
        'updateAction' => [
            'label' => 'Update Action',
        ],
    ],
    'navigation' => [
        'group' => 'Custom CSS',
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
];
