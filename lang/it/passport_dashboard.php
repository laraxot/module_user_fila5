<?php

declare(strict_types=1);

return [
    'navigation' => [
        'label' => 'Passport / API',
        'plural_label' => 'Passport / API',
        'group' => ['name' => 'OAuth', 'description' => 'Client, token e API Passport'],
        'icon' => 'heroicon-o-key',
        'sort' => 95,
    ],
    'label' => 'Passport / API',
    'plural_label' => 'Passport / API',
    'fields' => [
        'client_id' => ['label' => 'Client ID', 'placeholder' => 'Inserisci il client ID', 'help' => 'Identificativo del client OAuth', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'client_secret' => ['label' => 'Client Secret', 'placeholder' => 'Inserisci il client secret', 'help' => 'Secret per l\'autenticazione OAuth', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'force' => ['description' => 'force'],
        'client_name' => ['label' => 'Nome cliente', 'placeholder' => 'es. il nome del cliente', 'help' => 'Serve per riconoscere queste credenziali in seguito', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'name' => ['label' => 'name', 'placeholder' => 'name', 'helper_text' => 'name', 'description' => 'name'],
    ],
    'actions' => [
        'new_credentials' => ['label' => 'Nuove credenziali', 'tooltip' => 'Crea un nuovo client OAuth client_credentials, pronto all\'uso', 'icon' => 'new_credentials'],
        'create' => ['label' => 'Crea Client', 'tooltip' => 'Crea un nuovo client OAuth'],
        'revoke' => ['label' => 'Revoca', 'tooltip' => 'Revoca l\'accesso'],
        'install' => ['label' => 'Installa Passport', 'modal_description' => 'Questo comando installerà Passport e creerà le chiavi di crittografia necessarie.'],
        'generate_keys' => ['label' => 'Genera Chiavi'],
        'purge_tokens' => ['label' => 'Pulisci Token', 'modal_description' => 'Elimina tutti i token scaduti o revocati.'],
        'hash_secrets' => ['label' => 'Hash Secret', 'modal_description' => 'Applica l\'hashing a tutti i client secret esistenti.'],
        'logout' => ['tooltip' => 'logout', 'label' => 'logout', 'icon' => 'logout'],
        'cancel' => ['tooltip' => 'cancel', 'icon' => 'cancel', 'label' => 'cancel'],
        'passport_hash' => ['tooltip' => 'passport_hash', 'icon' => 'passport_hash', 'label' => 'passport_hash'],
        'submit' => ['tooltip' => 'submit', 'label' => 'submit', 'icon' => 'submit'],
        'passport_purge' => ['tooltip' => 'passport_purge', 'label' => 'passport_purge', 'icon' => 'passport_purge'],
        'passport_install' => ['label' => 'passport_install', 'icon' => 'passport_install', 'tooltip' => 'passport_install'],
        'passport_keys' => ['label' => 'passport_keys', 'icon' => 'passport_keys', 'tooltip' => 'passport_keys'],
        'profile' => ['label' => 'profile', 'icon' => 'profile', 'tooltip' => 'profile'],
    ],
    'status' => ['public_key' => 'Chiave Pubblica', 'private_key' => 'Chiave Privata', 'present' => 'Presente', 'missing' => 'Mancante'],
    'messages' => ['credentials_created' => 'Nuove credenziali create — copiale subito, non verranno mostrate di nuovo', 'client_created' => 'Client creato con successo', 'client_revoked' => 'Client revocato con successo', 'command_started' => 'Comando avviato...', 'command_completed' => 'Comando completato con successo', 'command_failed' => 'Esecuzione comando fallita', 'command_error' => 'Errore durante l\'esecuzione del comando'],
];
