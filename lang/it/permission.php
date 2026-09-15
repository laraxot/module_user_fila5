<?php

declare(strict_types=1);

return [
    'fields' => [
        'name' => ['label' => 'Nome', 'placeholder' => 'Inserisci il nome del permesso', 'help' => 'Nome univoco del permesso', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'guard_name' => ['label' => 'Guard Name', 'placeholder' => 'Inserisci il nome del guard', 'help' => 'Nome del guard per il permesso', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'active' => ['label' => 'Attivo', 'placeholder' => 'Seleziona lo stato', 'help' => 'Indica se il permesso è attivo', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'created_at' => ['label' => 'Data Creazione', 'placeholder' => 'Data di creazione', 'help' => 'Data di creazione del permesso', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'applyFilters' => ['label' => 'applyFilters', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
<<<<<<< HEAD
        'role' => ['label' => 'role', 'placeholder' => 'role', 'helper_text' => '', 'description' => 'role'],
=======
        'role' => ['label' => 'role', 'placeholder' => 'role', 'helper_text' => 'role', 'description' => 'role'],
>>>>>>> laraxot/dev
    ],
    'common' => ['yes' => 'Sì', 'no' => 'No'],
    'navigation' => ['sort' => 80, 'label' => 'Permessi', 'group' => 'Sicurezza', 'icon' => 'heroicon-o-shield-check'],
    'label' => 'Permission',
    'plural_label' => 'Permission (Plurale)',
    'actions' => [
<<<<<<< HEAD
        'create' => ['label' => 'Crea Permission', 'icon' => 'create', 'tooltip' => 'create'],
=======
<<<<<<< HEAD
        'create' => ['label' => 'Crea Permission'],
=======
        'create' => ['label' => 'Crea Permission', 'icon' => 'create', 'tooltip' => 'create'],
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
        'edit' => ['label' => 'Modifica Permission', 'icon' => 'edit', 'tooltip' => 'edit'],
        'delete' => ['label' => 'Elimina Permission', 'icon' => 'delete', 'tooltip' => 'delete'],
        'view' => ['label' => 'view', 'icon' => 'view', 'tooltip' => 'view'],
        'Attach Role' => ['label' => 'Attach Role', 'icon' => 'Attach Role', 'tooltip' => 'Attach Role'],
<<<<<<< HEAD
        'createAnother' => ['label' => 'createAnother', 'icon' => 'createAnother', 'tooltip' => 'createAnother'],
        'save' => ['label' => 'save', 'icon' => 'save', 'tooltip' => 'save'],
=======
<<<<<<< HEAD
=======
        'createAnother' => ['label' => 'createAnother', 'icon' => 'createAnother', 'tooltip' => 'createAnother'],
        'save' => ['label' => 'save', 'icon' => 'save', 'tooltip' => 'save'],
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
    ],
];
