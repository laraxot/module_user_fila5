<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: split from user.php for maintainability.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/it/user/filters.php
return array (
  'status' => 
  array (
    'label' => 'Per Stato',
    'tooltip' => 'Filtra per stato utente',
  ),
  'type' => 
  array (
    'label' => 'Per Tipo',
    'tooltip' => 'Filtra per tipo utente',
  ),
  'role' => 
  array (
    'label' => 'Per Ruolo',
    'tooltip' => 'Filtra per ruolo',
  ),
  'verified' => 
  array (
    'label' => 'Email Verificata',
    'tooltip' => 'Mostra solo utenti con email verificata',
  ),
);
