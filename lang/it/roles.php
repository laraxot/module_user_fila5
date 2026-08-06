<?php

declare(strict_types=1);

return [
    'fields' => [
        'id' => ['label' => 'id', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'name' => ['label' => 'name', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'team_id' => ['label' => 'team_id', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
    ],
    'navigation' => [
        'name' => 'Roles',
        'plural' => 'Roles',
        'group' => ['name' => 'Ruoli e permessi', 'description' => 'Controllo degli accessi'],
        'label' => 'Roles',
        'sort' => 1,
        'icon' => 'heroicon-o-rectangle-stack',
    ],
    'label' => 'Roles',
    'plural_label' => 'Roles (Plurale)',
    'actions' => [
        'create' => ['label' => 'Crea Roles'],
        'edit' => ['label' => 'Modifica Roles'],
        'delete' => ['label' => 'Elimina Roles', 'tooltip' => 'delete'],
    ],
];
