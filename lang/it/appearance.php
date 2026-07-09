<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/it/appearance.php
return [
    'navigation' => [
        'name' => 'Aspetto',
        'plural' => 'Aspetto',
        'group' => [
            'name' => 'Aspetto',
            'description' => 'Personalizzazione dell\'aspetto del sistema',
        ],
        'label' => 'Aspetto',
        'icon' => 'heroicon-o-paint-brush',
        'sort' => 5,
    ],
    'label' => 'Appearance',
    'plural_label' => 'Appearance (Plurale)',
    'fields' => [
        'id' => [
            'label' => 'Identificativo',
            'tooltip' => 'Identificativo univoco del record',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'Data Creazione',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'updated_at' => [
            'label' => 'Ultima Modifica',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'actions' => [
        'create' => [
            'label' => 'Crea Appearance',
        ],
        'edit' => [
            'label' => 'Modifica Appearance',
        ],
        'delete' => [
            'label' => 'Elimina Appearance',
        ],
    ],
];
