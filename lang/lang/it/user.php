<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Utente',
        'plural' => 'Utenti',
        'group' => [
            'name' => 'Admin',
        ],
    ],
    'fields' => [
<<<<<<< HEAD
        'first_name' => 'Nome',
        'last_name' => 'Cognome',
        'name' => [
            'label' => 'Nome',
        ],
        'email' => [
            'label' => 'Email',
        ],
        'created_at' => [
            'label' => 'Data di Creazione',
        ],
        'updated_at' => [
            'label' => 'Ultima Modifica',
=======
        'first_name' => [
            'label' => 'Nome',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'last_name' => [
            'label' => 'Cognome',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'name' => [
            'label' => 'Nome',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'email' => [
            'label' => 'Email',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'Data di Creazione',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'updated_at' => [
            'label' => 'Ultima Modifica',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
>>>>>>> 60a2c9a9 (.)
        ],
        'role' => [
            'name' => [
                'label' => 'Ruolo',
            ],
<<<<<<< HEAD
        ],
        'active' => 'Attivo',
        'id' => [
            'label' => 'ID',
        ],
        'password' => 'Password',
        'password_confirmation' => 'Conferma Password',
        'email_verified_at' => [
            'label' => 'Email Verificata',
=======
            'label' => '',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'active' => [
            'label' => 'Attivo',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'id' => [
            'label' => 'ID',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'password' => [
            'label' => 'Password',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'password_confirmation' => [
            'label' => 'Conferma Password',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'email_verified_at' => [
            'label' => 'Email Verificata',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
>>>>>>> 60a2c9a9 (.)
        ],
        'teams' => [
            'name' => [
                'label' => 'Nome Team',
            ],
<<<<<<< HEAD
=======
            'label' => '',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
>>>>>>> 60a2c9a9 (.)
        ],
        'roles' => [
            'name' => [
                'label' => 'Nome Ruolo',
            ],
<<<<<<< HEAD
        ],
        'password_expires_at' => [
            'label' => 'Scadenza Password',
        ],
        'verified' => [
            'label' => 'Verificato',
        ],
        'unverified' => [
            'label' => 'Non Verificato',
        ],
        'deactivate' => [
            'label' => 'deactivate',
        ],
        'changePassword' => [
            'label' => 'changePassword',
=======
            'label' => '',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'password_expires_at' => [
            'label' => 'Scadenza Password',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'verified' => [
            'label' => 'Verificato',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'unverified' => [
            'label' => 'Non Verificato',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'deactivate' => [
            'label' => 'deactivate',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'changePassword' => [
            'label' => 'changePassword',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
>>>>>>> 60a2c9a9 (.)
        ],
    ],
    'filters' => [
        'active_users' => 'Utenti Attivi',
        'creation_date' => 'Data di Creazione',
        'date_from' => 'Dal',
        'date_to' => 'Al',
        'verified' => 'Utenti Verificati',
        'unverified' => 'Utenti Non Verificati',
    ],
    'messages' => [
        'no_records' => 'Nessun utente trovato',
        'loading' => 'Caricamento utenti...',
        'search' => 'Cerca utenti...',
    ],
    'actions' => [
<<<<<<< HEAD
        'toggle_layout' => 'Cambia Layout!!!!!',
=======
        'toggle_layout' => 'Cambia Layout',
>>>>>>> 60a2c9a9 (.)
        'create' => [
            'label' => 'Crea Utente',
        ],
        'delete' => 'Elimina Utente',
        'associate' => 'Associa Utente',
        'bulk_delete' => 'Elimina Selezionati',
        'bulk_detach' => 'Scollega Selezionati',
        'attach_user' => 'Collega Utente',
        'associate_user' => 'Associa Utente',
        'user_actions' => 'Azioni Utente',
        'view' => 'Visualizza',
        'edit' => 'Modifica',
        'detach' => 'Scollega',
        'row_actions' => 'Azioni',
        'delete_selected' => 'Elimina Selezionati',
        'confirm_detach' => 'Sei sicuro di voler scollegare questo utente?',
        'confirm_delete' => 'Sei sicuro di voler eliminare gli utenti selezionati?',
        'success_attached' => 'Utente collegato con successo',
        'success_detached' => 'Utente scollegato con successo',
        'success_deleted' => 'Utenti eliminati con successo',
        'import' => [
            'fields' => [
                'import_file' => 'Seleziona un file XLS o CSV da caricare',
            ],
        ],
        'export' => [
            'filename_prefix' => 'Aree al',
            'columns' => [
                'name' => 'Nome Area',
                'parent_name' => 'Nome Area Superiore',
            ],
        ],
        'change_password' => 'Cambia Password',
    ],
    'modals' => [
        'create' => [
            'heading' => 'Crea Utente',
            'description' => 'Crea un nuovo utente',
            'actions' => [
                'submit' => 'Crea',
                'cancel' => 'Annulla',
            ],
        ],
        'edit' => [
            'heading' => 'Modifica Utente',
            'description' => 'Modifica le informazioni dell’utente',
            'actions' => [
                'submit' => 'Salva Modifiche',
                'cancel' => 'Annulla',
            ],
        ],
        'delete' => [
            'heading' => 'Elimina Utente',
            'description' => 'Sei sicuro di voler eliminare questo utente?',
            'actions' => [
                'submit' => 'Elimina',
                'cancel' => 'Annulla',
            ],
        ],
        'associate' => [
            'heading' => 'Associa Utente',
            'description' => 'Seleziona un utente da associare',
            'actions' => [
                'submit' => 'Associa',
                'cancel' => 'Annulla',
            ],
        ],
        'detach' => [
            'heading' => 'Scollega Utente',
            'description' => 'Sei sicuro di voler scollegare questo utente?',
            'actions' => [
                'submit' => 'Scollega',
                'cancel' => 'Annulla',
            ],
        ],
        'bulk_delete' => [
            'heading' => 'Elimina Utenti Selezionati',
            'description' => 'Sei sicuro di voler eliminare gli utenti selezionati?',
            'actions' => [
                'submit' => 'Elimina Selezionati',
                'cancel' => 'Annulla',
            ],
        ],
    ],
<<<<<<< HEAD
=======
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
>>>>>>> 60a2c9a9 (.)
];
