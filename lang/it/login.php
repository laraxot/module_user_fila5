<?php

declare(strict_types=1);

return [
    'logout_in_progress' => 'Disconnessione in corso…',
    'email_verified' => 'Indirizzo email verificato. Grazie!',
    'password_reset_page' => [
        'title' => 'Reimposta la password',
        'intro' => 'Inserisci l\'email del tuo account: ti invieremo un link per scegliere una nuova password.',
        'return_to_login' => 'Torna all\'accesso',
        'email_label' => 'Indirizzo email',
        'submit' => 'Invia il link di reimpostazione',
    ],
    'fields' => [
        'email' => [
            'label' => 'Email',
            'placeholder' => 'Inserisci la tua email',
            'help' => 'Inserisci il tuo indirizzo email per accedere',
            'description' => 'email',
            'helper_text' => '',
            'tooltip' => '',
        ],
        'password' => [
            'label' => 'Password',
            'placeholder' => 'Inserisci la tua password',
            'help' => 'Inserisci la password del tuo account',
            'description' => 'password',
            'helper_text' => '',
            'tooltip' => '',
        ],
        'remember' => [
            'label' => 'Ricordami',
            'placeholder' => '',
            'help' => 'Mantieni la sessione attiva su questo dispositivo',
            'description' => 'remember',
            'helper_text' => '',
            'tooltip' => '',
        ],
        'name' => [
            'label' => 'Nome completo',
            'placeholder' => 'Inserisci il tuo nome completo',
            'help' => 'Il tuo nome completo per la registrazione',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'password_confirmation' => [
            'label' => 'Conferma password',
            'placeholder' => 'Ripeti la password',
            'help' => 'Ripeti la password per conferma',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'actions' => [
        'login' => [
            'label' => 'Accedi',
            'success' => 'Accesso effettuato con successo',
            'error' => 'Credenziali non valide',
<<<<<<< .merge_file_gp6oh9
=======
            'throttle' => 'Troppi tentativi di accesso. Riprova tra :seconds secondi.',
>>>>>>> .merge_file_i1xonw
        ],
        'register' => [
            'label' => 'Registrati',
            'success' => 'Registrazione completata con successo',
            'error' => 'Impossibile completare la registrazione',
        ],
        'forgot_password' => [
            'label' => 'Password dimenticata?',
            'success' => 'Istruzioni di reset inviate alla tua email',
            'error' => 'Impossibile inviare le istruzioni di reset',
        ],
        'reset_password' => [
            'label' => 'Reimposta password',
            'success' => 'Password reimpostata con successo',
            'error' => 'Impossibile reimpostare la password',
        ],
        'hidePassword' => [
            'label' => 'Nascondi Password',
            'icon' => 'hidePassword',
            'tooltip' => 'Nascondi Password',
        ],
        'showPassword' => [
            'label' => 'Mostra Password',
            'icon' => 'showPassword',
            'tooltip' => 'Mostra Password',
        ],
        'authenticate' => [
<<<<<<< .merge_file_gp6oh9
            'label' => 'authenticate',
            'icon' => 'authenticate',
            'tooltip' => 'authenticate',
        ],
        'save' => [
            'label' => 'save',
            'icon' => 'save',
            'tooltip' => 'save',
=======
            'label' => 'Accedi',
            'icon' => 'heroicon-o-lock-closed',
            'tooltip' => 'Accedi',
        ],
        'save' => [
            'label' => 'Salva',
            'icon' => 'heroicon-o-check',
            'tooltip' => 'Salva',
>>>>>>> .merge_file_i1xonw
        ],
    ],
    'no_account' => 'Non hai ancora un account?',
    'register_now' => 'Registrati',
    'forgot_password_text' => 'Hai dimenticato la password?',
    'reset_it' => 'Reimpostala',
    'messages' => [
        'logout_success' => 'Logout effettuato con successo',
        'logout_error' => 'Si è verificato un errore durante il logout',
        'user_not_allowed' => 'La tua email non è autorizzata',
        'registration_not_enabled' => 'La registrazione utenti non è consentita',
        'throttle' => 'Troppi tentativi di accesso. Riprova tra :seconds secondi.',
        'general_error' => 'Si è verificato un errore. Riprova più tardi.',
        'unauthorized' => 'Non hai i permessi necessari per questa operazione.',
<<<<<<< .merge_file_gp6oh9
    ],
    'navigation' => [
        'label' => 'Missing Navigation Label',
        'plural_label' => 'Missing Navigation Plural Label',
        'group' => 'Missing Group',
        'icon' => 'heroicon-o-puzzle-piece',
        'sort' => 100,
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
=======
    ],
    'navigation' => [
        'label' => 'Accesso',
        'plural_label' => 'Accessi',
        'group' => 'Autenticazione',
        'icon' => 'heroicon-o-lock-closed',
        'sort' => 100,
    ],
    'label' => 'Accesso',
    'plural_label' => 'Accessi',
>>>>>>> .merge_file_i1xonw
    'title' => 'Accedi al tuo account',
    'subtitle_start' => 'Oppure',
    'subtitle_link' => 'crea un nuovo account',
    'page' => [
<<<<<<< .merge_file_gp6oh9
        'title' => 'Benvenuto a <nome progetto>! 🍕',
        'subtitle' => 'Accedi alla community di developer e pizza lovers',
=======
        'title' => 'Accedi a FixCity',
        'subtitle' => 'Entra per segnalare un problema e seguire le tue pratiche',
>>>>>>> .merge_file_i1xonw
    ],
    'already_registered' => 'Non hai ancora un account?',
    'register' => 'Registrati ora',
];
