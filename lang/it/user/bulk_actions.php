<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: split from user.php for maintainability.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/it/user/bulk_actions.php
return array (
  'activate_selected' => 
  array (
    'label' => 'Attiva Selezionati',
    'icon' => 'heroicon-o-check',
  ),
  'deactivate_selected' => 
  array (
    'label' => 'Disattiva Selezionati',
    'icon' => 'heroicon-o-x-circle',
  ),
  'delete_selected' => 
  array (
    'label' => 'Elimina Selezionati',
    'icon' => 'heroicon-o-trash',
  ),
  'block_selected' => 
  array (
    'label' => 'Blocca Selezionati',
    'icon' => 'heroicon-o-lock-closed',
  ),
  'unblock_selected' => 
  array (
    'label' => 'Sblocca Selezionati',
    'icon' => 'heroicon-o-lock-open',
  ),
);
