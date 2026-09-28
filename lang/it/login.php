<?php

declare(strict_types=1);

return [
    'fields' => [
        'email' => [
            'label' => 'Indirizzo email',
            'placeholder' => 'nome@esempio.it',
            'help' => 'Inserisci l’indirizzo email associato al tuo account.',
            'description' => 'Indirizzo email per accedere',
            'helper_text' => '',
            'tooltip' => '',
        ],
        'password' => [
            'label' => 'Password',
            'placeholder' => 'Inserisci la password',
            'help' => 'La password del tuo account',
            'description' => 'Password per accedere',
            'helper_text' => '',
            'tooltip' => '',
        ],
        'remember' => [
            'label' => 'Ricordami',
            'placeholder' => '',
            'help' => 'Mantieni attivo l’accesso su questo dispositivo',
            'description' => 'Mantieni attiva la sessione',
            'helper_text' => '',
            'tooltip' => '',
        ],
        'name' => [
            'label' => 'Nome completo',
            'placeholder' => 'Inserisci il tuo nome completo',
            'help' => 'Il nome completo del tuo account',
            'description' => 'Nome completo',
            'helper_text' => '',
            'tooltip' => '',
        ],
        'password_confirmation' => [
            'label' => 'Conferma password',
            'placeholder' => 'Ripeti la password',
            'help' => 'Conferma la password scelta',
            'description' => 'Conferma password',
            'helper_text' => '',
            'tooltip' => '',
        ],
    ],
    'actions' => [
        'login' => [
            'label' => 'Accedi',
            'success' => 'Accesso effettuato.',
            'error' => 'Credenziali non valide.',
        ],
        'register' => [
            'label' => 'Crea account',
            'success' => 'Registrazione completata.',
            'error' => 'Non è stato possibile completare la registrazione.',
        ],
        'forgot_password' => [
            'label' => 'Password dimenticata?',
            'success' => 'Ti abbiamo inviato le istruzioni per reimpostare la password.',
            'error' => 'Non è stato possibile inviare le istruzioni.',
        ],
        'reset_password' => [
            'label' => 'Reimposta password',
            'success' => 'Password aggiornata.',
            'error' => 'Non è stato possibile aggiornare la password.',
        ],
    ],
    'messages' => [
        'logout_success' => 'Hai effettuato la disconnessione.',
        'logout_error' => 'Si è verificato un errore durante la disconnessione.',
        'user_not_allowed' => 'Il tuo indirizzo email non è autorizzato.',
        'registration_not_enabled' => 'La registrazione non è al momento disponibile.',
        'throttle' => 'Troppi tentativi. Riprova tra :seconds secondi.',
        'general_error' => 'Si è verificato un errore. Riprova più tardi.',
        'unauthorized' => 'Non hai i permessi necessari per questa operazione.',
    ],
    'no_account' => 'Non hai ancora un account?',
    'register_now' => 'Registrati',
    'forgot_password_text' => 'Hai dimenticato la password?',
    'reset_it' => 'Reimpostala',
    'password_reset_page' => [
        'title' => 'Reimposta la password',
        'intro' => 'Inserisci il tuo indirizzo email per ricevere il link di reimpostazione.',
        'email_label' => 'Indirizzo email',
        'submit' => 'Invia il link di reimpostazione',
        'return_to_login' => 'Torna all’accesso',
    ],
    'create_account' => 'Crea account',
];
