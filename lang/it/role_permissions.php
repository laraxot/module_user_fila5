<?php

declare(strict_types=1);

return [
    'fields' => [
        'id' => ['label' => 'ID'],
        'name' => ['label' => 'Nome', 'placeholder' => 'name', 'helper_text' => 'name', 'description' => 'name'],
        'created_at' => ['label' => 'Creato il'],
    ],
    'actions' => [
        'create' => ['label' => 'create', 'icon' => 'create', 'tooltip' => 'create'],
        'associate' => ['label' => 'Collega', 'icon' => 'associate', 'tooltip' => 'associate'],
        'edit' => ['label' => 'edit', 'icon' => 'edit', 'tooltip' => 'edit'],
        'dissociate' => ['label' => 'Scollega', 'icon' => 'dissociate', 'tooltip' => 'dissociate'],
        'delete' => ['label' => 'delete', 'icon' => 'delete', 'tooltip' => 'delete'],
    ],
    'label' => 'Permessi del ruolo',
    'navigation' => ['label' => 'Permessi ruolo', 'icon' => 'Permessi ruolo', 'sort' => 86],
];
