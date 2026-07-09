<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: split from user.php for maintainability (<500 LOC).
// Canon: Modules/User/docs/wiki/concepts/claude-audit-static.md
// File: lang/it/user_otp.php
return array (
  'otp' => 
  array (
    'mail' => 
    array (
      'subject' => 'Codice OTP per l\'accesso',
      'greeting' => 'Ciao :name',
      'line1' => 'Il tuo codice OTP è: :code',
      'line2' => 'Questo codice scade tra :minutes minuti',
      'line3' => 'Non condividere questo codice con nessuno',
      'salutation' => 'Cordiali saluti, :app_name',
    ),
    'notifications' => 
    array (
      'otp_expired' => 
      array (
        'body' => 'Il codice OTP è scaduto',
      ),
    ),
    'actions' => 
    array (
      'send_otp_success' => 'Codice OTP inviato con successo',
    ),
  ),
);
