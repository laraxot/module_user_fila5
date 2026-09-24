<?php

declare(strict_types=1);

<<<<<<< HEAD
return [
    'fields' => [
        'edit' => ['label' => 'Modifica Roles', 'icon' => 'edit', 'tooltip' => 'edit'],
        'delete' => ['label' => 'Elimina Roles', 'icon' => 'delete', 'tooltip' => 'delete'],
        'layout' => ['label' => 'layout', 'icon' => 'layout', 'tooltip' => 'layout'],
        'view' => ['label' => 'view', 'icon' => 'view', 'tooltip' => 'view'],
=======
// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/it/roles.php
return [
    'fields' => [
        'id' => [
            'label' => 'id',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'name' => [
            'label' => 'name',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'team_id' => [
            'label' => 'team_id',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'navigation' => [
        'name' => 'Roles',
        'plural' => 'Roles',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Roles',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
    ],
    'label' => 'Roles',
    'plural_label' => 'Roles (Plurale)',
    'actions' => [
        'create' => [
            'label' => 'Crea Roles',
        ],
        'edit' => [
            'label' => 'Modifica Roles',
        ],
        'delete' => [
            'label' => 'Elimina Roles',
        ],
>>>>>>> 350420cb (Check & fix styling)
    ],
];
