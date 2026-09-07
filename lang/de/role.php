<?php

declare(strict_types=1);

<<<<<<< HEAD

=======
>>>>>>> 2024e2e7 (.)
return [
    'navigation' => [
        'name' => 'Ruoli',
        'plural' => 'Ruoli',
        'group' => [
            'name' => 'Gestione Utenti',
            'description' => 'Gestione dei ruoli e dei permessi associati',
        ],
        'label' => 'Ruoli',
        'sort' => '26',
        'icon' => 'user-role-animated',
    ],
    'fields' => [
        'name' => [
            'label' => 'Nome Ruolo',
<<<<<<< HEAD
            'tooltip' => 'Il nome identificativo del ruolo, es. \"Admin\".',
            'placeholder' => 'Nome del ruolo',
        ],
        'guard_name' => [
            'label' => 'Guard',
            'tooltip' => 'Il nome della guardia per questo ruolo, es. \"web\".',
            'placeholder' => 'Nome della guardia',
=======
            'tooltip' => 'Il nome identificativo del ruolo, es. \\"Admin\\".',
            'placeholder' => 'Nome del ruolo',
            'helper_text' => '',
            'description' => '',
        ],
        'guard_name' => [
            'label' => 'Guard',
            'tooltip' => 'Il nome della guardia per questo ruolo, es. \\"web\\".',
            'placeholder' => 'Nome della guardia',
            'helper_text' => '',
            'description' => '',
>>>>>>> 2024e2e7 (.)
        ],
        'permissions' => [
            'label' => 'Permessi',
            'tooltip' => 'Seleziona i permessi associati a questo ruolo.',
            'placeholder' => 'Seleziona permessi',
<<<<<<< HEAD
=======
            'helper_text' => '',
            'description' => '',
>>>>>>> 2024e2e7 (.)
        ],
        'users_count' => [
            'label' => 'Numero Utenti',
            'tooltip' => 'Il numero di utenti assegnati a questo ruolo.',
<<<<<<< HEAD
=======
            'helper_text' => '',
            'description' => '',
>>>>>>> 2024e2e7 (.)
        ],
        'created_at' => [
            'label' => 'Data Creazione',
            'tooltip' => 'La data in cui il ruolo è stato creato.',
            'placeholder' => 'Data di creazione',
<<<<<<< HEAD
=======
            'helper_text' => '',
            'description' => '',
>>>>>>> 2024e2e7 (.)
        ],
        'updated_at' => [
            'label' => 'Ultima Modifica',
            'tooltip' => 'La data dell\'ultima modifica del ruolo.',
            'placeholder' => 'Ultima modifica',
<<<<<<< HEAD
=======
            'helper_text' => '',
            'description' => '',
>>>>>>> 2024e2e7 (.)
        ],
        'description' => [
            'label' => 'Descrizione',
            'tooltip' => 'Una descrizione del ruolo e delle sue funzioni.',
            'placeholder' => 'Descrizione del ruolo',
<<<<<<< HEAD
        ],
        'applyFilters' => [
            'label' => 'applyFilters',
        ],
        'toggleColumns' => [
            'label' => 'toggleColumns',
        ],
        'reorderRecords' => [
            'label' => 'reorderRecords',
=======
            'helper_text' => '',
            'description' => '',
        ],
        'applyFilters' => [
            'label' => 'applyFilters',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'toggleColumns' => [
            'label' => 'toggleColumns',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'reorderRecords' => [
            'label' => 'reorderRecords',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
>>>>>>> 2024e2e7 (.)
        ],
        'team_id' => [
            'description' => 'team_id',
            'helper_text' => 'team_id',
            'placeholder' => 'team_id',
            'label' => 'team_id',
<<<<<<< HEAD
        ],
        'detach' => [
            'label' => 'detach',
        ],
        'resetFilters' => [
            'label' => 'resetFilters',
        ],
        'edit' => [
            'label' => 'edit',
        ],
        'openFilters' => [
            'label' => 'openFilters',
        ],
        'attach' => [
            'label' => 'attach',
=======
            'tooltip' => '',
        ],
        'detach' => [
            'label' => 'detach',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'resetFilters' => [
            'label' => 'resetFilters',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'edit' => [
            'label' => 'edit',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'openFilters' => [
            'label' => 'openFilters',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'attach' => [
            'label' => 'attach',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
>>>>>>> 2024e2e7 (.)
        ],
        'recordId' => [
            'description' => 'recordId',
            'helper_text' => 'recordId',
            'placeholder' => 'recordId',
            'label' => 'recordId',
<<<<<<< HEAD
        ],
        'id' => [
            'label' => 'id',
=======
            'tooltip' => '',
        ],
        'id' => [
            'label' => 'id',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
>>>>>>> 2024e2e7 (.)
        ],
    ],
    'roles' => [
        'super_admin' => 'Super Amministratore',
        'admin' => 'Amministratore',
        'manager' => 'Manager',
        'editor' => 'Editor',
        'user' => 'Utente',
    ],
    'actions' => [
        'create' => [
            'label' => 'Crea Ruolo',
            'tooltip' => 'Clicca per creare un nuovo ruolo nel sistema.',
            'icon' => 'fa fa-plus',
            'color' => 'success',
        ],
        'edit' => [
            'label' => 'Modifica Ruolo',
            'tooltip' => 'Clicca per modificare il ruolo selezionato.',
            'icon' => 'fa fa-edit',
            'color' => 'primary',
        ],
        'delete' => [
            'label' => 'Elimina Ruolo',
            'tooltip' => 'Clicca per eliminare questo ruolo.',
            'icon' => 'fa fa-trash',
            'color' => 'danger',
        ],
        'assign_permissions' => [
            'label' => 'Assegna Permessi',
            'tooltip' => 'Clicca per assegnare permessi al ruolo.',
            'icon' => 'fa fa-check',
            'color' => 'info',
        ],
        'sync_permissions' => [
            'label' => 'Sincronizza Permessi',
            'tooltip' => 'Clicca per sincronizzare i permessi con quelli di un altro sistema.',
            'icon' => 'fa fa-sync',
            'color' => 'warning',
        ],
    ],
    'messages' => [
        'created' => 'Ruolo creato con successo',
        'updated' => 'Ruolo aggiornato con successo',
        'deleted' => 'Ruolo eliminato con successo',
        'permissions_updated' => 'Permessi aggiornati con successo',
        'cannot_delete_super_admin' => 'Non puoi eliminare il ruolo di Super Amministratore',
        'role_in_use' => 'Non puoi eliminare un ruolo assegnato a degli utenti',
    ],
    'descriptions' => [
        'super_admin' => 'Accesso completo a tutte le funzionalità del sistema.',
        'admin' => 'Accesso alla maggior parte delle funzionalità amministrative.',
        'manager' => 'Gestione di utenti e contenuti specifici.',
        'editor' => 'Modifica e gestione dei contenuti.',
        'user' => 'Accesso base alle funzionalità del sistema.',
    ],
    'permissions_groups' => [
        'users' => 'Gestione Utenti',
        'roles' => 'Gestione Ruoli',
        'content' => 'Gestione Contenuti',
        'settings' => 'Impostazioni',
        'reports' => 'Report',
    ],
<<<<<<< HEAD
=======
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
>>>>>>> 2024e2e7 (.)
];
