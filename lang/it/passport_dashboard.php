<?php

declare(strict_types=1);

<<<<<<< HEAD
return [
=======
// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/it/passport_dashboard.php
return [
    // User — translation keys (no business logic).
    // User — translation keys (no business logic).
>>>>>>> 350420cb (Check & fix styling)
    'navigation' => [
        'label' => 'Passport / API',
        'plural_label' => 'Passport / API',
        'group' => 'Sistema',
        'icon' => 'heroicon-o-key',
        'sort' => 95,
    ],
    'label' => 'Passport / API',
    'plural_label' => 'Passport / API',
    'fields' => [
        'client_id' => [
            'label' => 'Client ID',
            'placeholder' => 'Inserisci il client ID',
            'help' => 'Identificativo del client OAuth',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'client_secret' => [
            'label' => 'Client Secret',
            'placeholder' => 'Inserisci il client secret',
            'help' => 'Secret per l\'autenticazione OAuth',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
<<<<<<< HEAD
        'client_name' => [
            'label' => 'Nome cliente',
        ],
        'force' => [
            'description' => 'force',
        ],
        'name' => [
            'label' => 'name',
            'placeholder' => 'name',
            'helper_text' => 'name',
            'description' => 'name',
        ],
    ],
    'actions' => [
        'new_credentials' => [
            'label' => 'Nuove credenziali',
            'icon' => 'new_credentials',
            'tooltip' => 'new_credentials',
        ],
=======
    ],
    'actions' => [
>>>>>>> 350420cb (Check & fix styling)
        'create' => [
            'label' => 'Crea Client',
            'tooltip' => 'Crea un nuovo client OAuth',
        ],
        'revoke' => [
            'label' => 'Revoca',
            'tooltip' => 'Revoca l\'accesso',
        ],
        'install' => [
            'label' => 'Installa Passport',
            'modal_description' => 'Questo comando installerà Passport e creerà le chiavi di crittografia necessarie.',
<<<<<<< HEAD
=======
            'force_label' => 'Forza sovrascrittura chiavi',
            'force_help' => 'Sovrascrive le chiavi esistenti se presenti.',
        ],
        'keys' => [
            'label' => 'Genera chiavi',
            'force_label' => 'Forza sovrascrittura',
            'force_help' => 'Sovrascrive le chiavi esistenti (necessario se già presenti).',
        ],
        'purge' => [
            'label' => 'Pulisci token',
            'revoked_label' => 'Rimuovi token revocati',
            'revoked_help' => 'Elimina i token e codici revocati.',
            'expired_label' => 'Rimuovi token scaduti',
            'expired_help' => 'Elimina i token scaduti da più di N ore.',
            'hours_label' => 'Ore di retention',
            'hours_help' => 'Token scaduti da più di N ore verranno eliminati (default 168 = 7 giorni).',
        ],
        'purge_tokens' => [
            'label' => 'Pulisci Token',
            'modal_description' => 'Verranno rimossi i token e codici revocati e/o scaduti secondo le opzioni selezionate.',
        ],
        'hash' => [
            'label' => 'Hash secret',
            'force_label' => 'Forza senza conferma',
            'force_help' => 'Esegue senza prompt di conferma.',
        ],
        'hash_secrets' => [
            'label' => 'Hash Secret',
            'modal_description' => 'Applica l\'hashing a tutti i client secret esistenti. Operazione irreversibile.',
>>>>>>> 350420cb (Check & fix styling)
        ],
        'generate_keys' => [
            'label' => 'Genera Chiavi',
        ],
<<<<<<< HEAD
        'purge_tokens' => [
            'label' => 'Pulisci Token',
            'modal_description' => 'Elimina tutti i token scaduti o revocati.',
        ],
        'hash_secrets' => [
            'label' => 'Hash Secret',
            'modal_description' => 'Applica l\'hashing a tutti i client secret esistenti.',
        ],
        'passport_install' => [
            'label' => 'passport_install',
            'icon' => 'passport_install',
            'tooltip' => 'passport_install',
        ],
        'passport_keys' => [
            'label' => 'passport_keys',
            'icon' => 'passport_keys',
            'tooltip' => 'passport_keys',
        ],
        'passport_purge' => [
            'label' => 'passport_purge',
            'icon' => 'passport_purge',
            'tooltip' => 'passport_purge',
        ],
        'passport_hash' => [
            'label' => 'passport_hash',
            'icon' => 'passport_hash',
            'tooltip' => 'passport_hash',
        ],
        'save' => [
            'label' => 'save',
            'icon' => 'save',
            'tooltip' => 'save',
        ],
        'profile' => [
            'label' => 'profile',
            'icon' => 'profile',
            'tooltip' => 'profile',
        ],
        'logout' => [
            'label' => 'logout',
            'icon' => 'logout',
            'tooltip' => 'logout',
        ],
        'submit' => [
            'label' => 'submit',
            'icon' => 'submit',
            'tooltip' => 'submit',
        ],
        'cancel' => [
            'label' => 'cancel',
            'icon' => 'cancel',
            'tooltip' => 'cancel',
=======
        'logout' => [
            'tooltip' => 'logout',
            'icon' => 'logout',
>>>>>>> 350420cb (Check & fix styling)
        ],
    ],
    'status' => [
        'public_key' => 'Chiave Pubblica',
        'private_key' => 'Chiave Privata',
        'present' => 'Presente',
        'missing' => 'Mancante',
    ],
    'messages' => [
        'client_created' => 'Client creato con successo',
        'client_revoked' => 'Client revocato con successo',
        'command_started' => 'Comando avviato...',
        'command_completed' => 'Comando completato con successo',
        'command_failed' => 'Esecuzione comando fallita',
        'command_error' => 'Errore durante l\'esecuzione del comando',
<<<<<<< HEAD
        'credentials_created' => 'Credenziali create con successo',
=======
>>>>>>> 350420cb (Check & fix styling)
    ],
];
