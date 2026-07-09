<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/lang/it/device.php
return [
    'navigation' => [
        'name' => 'Dispositivo',
        'plural' => 'Dispositivi',
        'group' => [
            'name' => 'Admin',
        ],
    ],
    'fields' => [
        'first_name' => 'Nome',
        'last_name' => 'Cognome',
        'id' => [
            'label' => 'id',
        ],
        'mobile_id' => [
            'label' => 'mobile_id',
        ],
        'device' => [
            'label' => 'device',
        ],
        'platform' => [
            'label' => 'platform',
        ],
        'browser' => [
            'label' => 'browser',
        ],
        'version' => [
            'label' => 'version',
        ],
        'is_robot' => [
            'label' => 'is_robot',
        ],
        'robot' => [
            'label' => 'robot',
        ],
        'is_desktop' => [
            'label' => 'is_desktop',
        ],
        'is_mobile' => [
            'label' => 'is_mobile',
        ],
        'is_tablet' => [
            'label' => 'is_tablet',
        ],
        'is_phone' => [
            'label' => 'is_phone',
        ],
    ],
    'actions' => [
        'import' => [
            'fields' => [
                'import_file' => 'Seleziona un file XLS o CSV da caricare',
            ],
        ],
        'export' => [
            'filename_prefix' => 'Aree al',
            'columns' => [
                'name' => 'Nome area',
                'parent_name' => 'Nome area livello superiore',
            ],
        ],
        'create' => [
            'label' => 'create',
        ],
    ],
];
