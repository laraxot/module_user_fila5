<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: split from user.php for maintainability.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/en/user/modals.php
return array (
  'create' => 
  array (
    'heading' => 'Create User',
    'description' => 'Create a new user record',
    'actions' => 
    array (
      'submit' => 'Create',
      'cancel' => 'Cancel',
    ),
  ),
  'edit' => 
  array (
    'heading' => 'Edit User',
    'description' => 'Modify user information',
    'actions' => 
    array (
      'submit' => 'Save Changes',
      'cancel' => 'Cancel',
    ),
  ),
  'delete' => 
  array (
    'heading' => 'Delete User',
    'description' => 'Are you sure you want to delete this user?',
    'actions' => 
    array (
      'submit' => 'Delete',
      'cancel' => 'Cancel',
    ),
  ),
  'associate' => 
  array (
    'heading' => 'Associate User',
    'description' => 'Select a user to associate',
    'actions' => 
    array (
      'submit' => 'Associate',
      'cancel' => 'Cancel',
    ),
  ),
  'detach' => 
  array (
    'heading' => 'Detach User',
    'description' => 'Are you sure you want to detach this user?',
    'actions' => 
    array (
      'submit' => 'Detach',
      'cancel' => 'Cancel',
    ),
  ),
  'bulk_delete' => 
  array (
    'heading' => 'Delete Selected Users',
    'description' => 'Are you sure you want to delete the selected users?',
    'actions' => 
    array (
      'submit' => 'Delete Selected',
      'cancel' => 'Cancel',
    ),
  ),
  'bulk_detach' => 
  array (
    'heading' => 'Detach Selected Users',
    'description' => 'Are you sure you want to detach the selected users?',
    'actions' => 
    array (
      'submit' => 'Detach Selected',
      'cancel' => 'Cancel',
    ),
  ),
);
