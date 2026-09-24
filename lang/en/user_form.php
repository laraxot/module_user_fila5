<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/en/user_form.php
return [
    'fields' => [
        'first_name' => ['label' => 'First name', 'placeholder' => 'John', 'helper_text' => 'Your given name', 'description' => 'First name'],
        'last_name' => ['label' => 'Last name', 'placeholder' => 'Doe', 'helper_text' => 'Your family name', 'description' => 'Last name'],
        'email' => ['label' => 'Email address', 'placeholder' => 'john.doe@example.com', 'helper_text' => 'Use the email you will sign in with.', 'description' => 'Email'],
        'password' => ['label' => 'Password', 'placeholder' => 'Enter a secure password', 'helper_text' => 'At least 12 characters with uppercase, lowercase, numbers, and symbols.', 'description' => 'Password'],
        'password_confirmation' => ['label' => 'Confirm password', 'placeholder' => 'Repeat your password', 'helper_text' => 'Must match the password above.', 'description' => 'Password confirmation'],
        'remember' => ['label' => 'Remember me', 'description' => 'Keep me signed in on this device', 'helper_text' => 'Extended session on a trusted device', 'placeholder' => 'remember'],
    ],
    'actions' => [
        'showPassword' => ['label' => 'Show password', 'icon' => 'heroicon-o-eye', 'tooltip' => 'Show password'],
        'hidePassword' => ['label' => 'Hide password', 'icon' => 'heroicon-o-eye-slash', 'tooltip' => 'Hide password'],
    ],
];
