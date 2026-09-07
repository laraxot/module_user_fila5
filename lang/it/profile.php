<?php

declare(strict_types=1);

return [
    'navigation' => [
        'label' => 'Profilo',
        'plural' => 'Profili',
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> f589f9b2 (.)
        'group' => [
            'label' => 'Gestione Utenti',
            'description' => 'Gestione dei profili utente',
        ],
<<<<<<< HEAD
=======
        'group' => ['label' => 'Gestione Utenti', 'description' => 'Gestione dei profili utente'],
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
        'icon' => 'user-profile-animated',
        'sort' => 73,
    ],
    'fields' => [
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> f589f9b2 (.)
        'first_name' => [
            'label' => 'Nome',
            'placeholder' => 'Inserisci il nome',
            'help' => 'Nome dell\'utente',
<<<<<<< HEAD
=======
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
>>>>>>> f589f9b2 (.)
        ],
        'last_name' => [
            'label' => 'Cognome',
            'placeholder' => 'Inserisci il cognome',
            'help' => 'Cognome dell\'utente',
<<<<<<< HEAD
=======
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
>>>>>>> f589f9b2 (.)
        ],
        'email' => [
            'label' => 'Email',
            'placeholder' => 'Inserisci l\'email',
            'help' => 'Indirizzo email dell\'utente',
<<<<<<< HEAD
=======
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
>>>>>>> f589f9b2 (.)
        ],
        'phone' => [
            'label' => 'Telefono',
            'placeholder' => 'Inserisci il numero di telefono',
            'help' => 'Numero di telefono dell\'utente',
<<<<<<< HEAD
=======
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
>>>>>>> f589f9b2 (.)
        ],
        'birth_date' => [
            'label' => 'Data di Nascita',
            'placeholder' => 'Seleziona la data di nascita',
            'help' => 'Data di nascita dell\'utente',
<<<<<<< HEAD
=======
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
>>>>>>> f589f9b2 (.)
        ],
        'gender' => [
            'label' => 'Genere',
            'male' => 'Maschio',
            'female' => 'Femmina',
            'other' => 'Altro',
<<<<<<< HEAD
=======
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
>>>>>>> f589f9b2 (.)
        ],
        'is_active' => [
            'label' => 'Attivo',
            'help' => 'Stato attivo del profilo',
<<<<<<< HEAD
        ],
        'id' => [
            'label' => 'ID',
        ],
        'ente' => [
            'label' => 'Ente',
        ],
        'matr' => [
            'label' => 'Matricola',
        ],
        // ... altri campi ...
=======
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
        'ente' => [
            'label' => 'Ente',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'matr' => [
            'label' => 'Matricola',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'photo' => [
            'label' => 'photo',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
>>>>>>> f589f9b2 (.)
    ],
    'actions' => [
        'edit' => [
            'label' => 'Modifica',
            'success' => 'Profilo aggiornato con successo!',
            'error' => 'Errore durante l\'aggiornamento del profilo',
        ],
        'delete' => [
            'label' => 'Elimina',
            'success' => 'Profilo eliminato con successo!',
            'error' => 'Errore durante l\'eliminazione del profilo',
<<<<<<< HEAD
=======
            'tooltip' => 'delete',
            'icon' => 'delete',
        ],
        'layout' => [
            'tooltip' => 'layout',
            'icon' => 'layout',
            'label' => 'layout',
        ],
        'create' => [
            'tooltip' => 'create',
            'icon' => 'create',
            'label' => 'create',
>>>>>>> f589f9b2 (.)
        ],
    ],
    'messages' => [
        'update_success' => 'Profilo aggiornato con successo!',
        'no_permission' => 'Non hai i permessi per modificare questo profilo.',
    ],
<<<<<<< HEAD
=======
        'first_name' => ['label' => 'Nome', 'placeholder' => 'Inserisci il nome', 'help' => 'Nome dell\'utente', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'last_name' => ['label' => 'Cognome', 'placeholder' => 'Inserisci il cognome', 'help' => 'Cognome dell\'utente', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'email' => ['label' => 'Email', 'placeholder' => 'Inserisci l\'email', 'help' => 'Indirizzo email dell\'utente', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'phone' => ['label' => 'Telefono', 'placeholder' => 'Inserisci il numero di telefono', 'help' => 'Numero di telefono dell\'utente', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'birth_date' => ['label' => 'Data di Nascita', 'placeholder' => 'Seleziona la data di nascita', 'help' => 'Data di nascita dell\'utente', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'gender' => ['label' => 'Genere', 'male' => 'Maschio', 'female' => 'Femmina', 'other' => 'Altro', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'is_active' => ['label' => 'Attivo', 'help' => 'Stato attivo del profilo', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'id' => ['label' => 'ID', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'ente' => ['label' => 'Ente', 'tooltip' => '', 'helper_text' => '', 'description' => '', 'placeholder' => 'ente'],
        'matr' => ['label' => 'Matricola', 'tooltip' => '', 'helper_text' => '', 'description' => '', 'placeholder' => 'matr'],
        'photo' => ['label' => 'photo', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'user' => [
            'name' => ['label' => 'user.name'],
        ],
        'created_at' => ['label' => 'created_at'],
        'name' => ['label' => 'name', 'placeholder' => 'name', 'helper_text' => 'name', 'description' => 'name'],
        'email_verified_at' => ['label' => 'email_verified_at', 'placeholder' => 'email_verified_at', 'helper_text' => 'email_verified_at', 'description' => 'email_verified_at'],
        'password' => ['label' => 'password', 'placeholder' => 'password', 'helper_text' => 'password', 'description' => 'password'],
        'password_confirmation' => ['label' => 'password_confirmation', 'placeholder' => 'password_confirmation', 'helper_text' => 'password_confirmation', 'description' => 'password_confirmation'],
        'updated_at' => ['label' => 'updated_at'],
        'passwordConfirmation' => ['label' => 'passwordConfirmation', 'placeholder' => 'passwordConfirmation', 'helper_text' => 'passwordConfirmation', 'description' => 'passwordConfirmation'],
        'currentPassword' => ['label' => 'currentPassword', 'placeholder' => 'currentPassword', 'helper_text' => 'currentPassword', 'description' => 'currentPassword'],
    ],
    'actions' => [
        'edit' => ['label' => 'Modifica', 'success' => 'Profilo aggiornato con successo!', 'error' => 'Errore durante l\'aggiornamento del profilo', 'icon' => 'edit', 'tooltip' => 'edit'],
        'delete' => ['label' => 'Elimina', 'success' => 'Profilo eliminato con successo!', 'error' => 'Errore durante l\'eliminazione del profilo', 'tooltip' => 'delete', 'icon' => 'delete'],
        'layout' => ['tooltip' => 'layout', 'icon' => 'layout', 'label' => 'layout'],
        'create' => ['tooltip' => 'create', 'icon' => 'create', 'label' => 'create'],
        'save' => ['label' => 'save', 'icon' => 'save', 'tooltip' => 'save'],
        'back' => ['label' => 'back', 'icon' => 'back', 'tooltip' => 'back'],
        'createAnother' => ['label' => 'createAnother', 'icon' => 'createAnother', 'tooltip' => 'createAnother'],
        'view' => ['label' => 'view', 'icon' => 'view', 'tooltip' => 'view'],
        'detach' => ['label' => 'detach', 'icon' => 'detach', 'tooltip' => 'detach'],
        'showPassword' => ['label' => 'showPassword', 'icon' => 'showPassword', 'tooltip' => 'showPassword'],
        'hidePassword' => ['label' => 'hidePassword', 'icon' => 'hidePassword', 'tooltip' => 'hidePassword'],
    ],
    'messages' => ['update_success' => 'Profilo aggiornato con successo!', 'no_permission' => 'Non hai i permessi per modificare questo profilo.'],
    'label' => 'Profile',
    'plural_label' => 'Profile (Plurale)',
>>>>>>> 2024e2e7 (.)
=======
    'label' => 'Profile',
    'plural_label' => 'Profile (Plurale)',
>>>>>>> f589f9b2 (.)
];
