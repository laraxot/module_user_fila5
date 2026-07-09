<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/lang/en/auth.php
return [
    'login-via' => 'Or log in via',
    'login-failed' => 'Login failed, please try again.',
    'user-not-allowed' => 'Your email is not part of a domain that is allowed.',
    'registration-not-enabled' => 'Registration of a new user is not allowed.',
    'login-in' => 'Sign in',
    'sign-up' => 'Sign up',
];
