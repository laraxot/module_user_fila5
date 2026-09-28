<?php

declare(strict_types=1);

return [
    'fields' => [
        'email' => ['label' => 'E-Mail', 'placeholder' => 'E-Mail-Adresse eingeben', 'help' => 'E-Mail-Adresse für die Anmeldung', 'description' => '', 'helper_text' => '', 'tooltip' => ''],
        'password' => ['label' => 'Passwort', 'placeholder' => 'Passwort eingeben', 'help' => 'Passwort für Ihr Konto', 'description' => '', 'helper_text' => '', 'tooltip' => ''],
        'remember' => ['label' => 'Angemeldet bleiben', 'placeholder' => '', 'help' => 'Auf diesem Gerät angemeldet bleiben', 'description' => '', 'helper_text' => '', 'tooltip' => ''],
    ],
    'actions' => [
        'login' => ['label' => 'Anmelden', 'success' => 'Anmeldung erfolgreich', 'error' => 'Ungültige Anmeldedaten'],
        'register' => ['label' => 'Registrieren', 'success' => 'Registrierung erfolgreich', 'error' => 'Registrierung fehlgeschlagen'],
        'forgot_password' => ['label' => 'Passwort vergessen?', 'success' => 'Anweisungen wurden gesendet', 'error' => 'Anweisungen konnten nicht gesendet werden'],
        'reset_password' => ['label' => 'Passwort zurücksetzen', 'success' => 'Passwort erfolgreich zurückgesetzt', 'error' => 'Passwort konnte nicht zurückgesetzt werden'],
    ],
    'no_account' => 'Noch kein Konto?',
    'register_now' => 'Konto erstellen',
    'forgot_password_text' => 'Passwort vergessen?',
    'reset_it' => 'Jetzt zurücksetzen',
    'create_account' => 'Konto erstellen',
    'messages' => [
        'logout_success' => 'Abmeldung erfolgreich',
        'logout_error' => 'Bei der Abmeldung ist ein Fehler aufgetreten',
        'user_not_allowed' => 'Diese E-Mail-Adresse ist nicht autorisiert',
        'registration_not_enabled' => 'Die Registrierung ist nicht aktiviert',
        'throttle' => 'Zu viele Anmeldeversuche. Bitte versuchen Sie es in :seconds Sekunden erneut.',
        'general_error' => 'Ein Fehler ist aufgetreten. Bitte versuchen Sie es später erneut.',
        'unauthorized' => 'Sie haben nicht die erforderlichen Berechtigungen.',
    ],
];
