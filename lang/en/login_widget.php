<?php

declare(strict_types=1);

<<<<<<< HEAD
return [
    'fields' => [
        'email' => [
            'label' => 'Email address',
            'placeholder' => 'name@example.com',
            'helper_text' => 'Email used to register for online services',
            'tooltip' => 'Enter your account email',
            'description' => 'Email field for authentication',
=======
// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/en/login_widget.php
return [
    'fields' => [
        'email' => [
            'label' => 'Email',
            'placeholder' => 'Enter your email',
            'help' => 'Enter the email address you used to register',
            'description' => 'Email address for login',
            'helper_text' => 'email',
            'tooltip' => '',
>>>>>>> 350420cb (Check & fix styling)
        ],
        'password' => [
            'label' => 'Password',
            'placeholder' => 'Enter your password',
<<<<<<< HEAD
            'helper_text' => '',
            'tooltip' => 'Account password',
            'description' => 'Password field for authentication',
        ],
        'remember' => [
            'label' => 'Remember me',
            'placeholder' => '',
            'helper_text' => 'Keep me signed in on this device',
            'tooltip' => 'Extended session',
            'description' => 'Remember login option',
        ],
    ],
    'actions' => [
        'hidePassword' => [
            'label' => 'Hide password',
            'tooltip' => 'Hide password',
            'icon' => 'hidePassword',
        ],
        'showPassword' => [
            'label' => 'Show password',
            'tooltip' => 'Show password',
            'icon' => 'showPassword',
        ],
    ],
=======
            'help' => 'Enter your account password',
            'description' => 'Password for login',
            'helper_text' => 'password',
            'tooltip' => '',
        ],
        'remember' => [
            'label' => 'Remember me',
            'placeholder' => 'Keep session active',
            'help' => 'Select to keep your session active for 30 days',
            'description' => 'Option to remember login',
            'helper_text' => 'remember',
            'tooltip' => '',
        ],
    ],
    'actions' => [
        'login' => [
            'label' => 'Login',
            'tooltip' => 'Click to access your account',
        ],
        'showPassword' => [
            'label' => 'showPassword',
            'icon' => 'showPassword',
            'tooltip' => 'showPassword',
        ],
        'hidePassword' => [
            'label' => 'hidePassword',
            'icon' => 'hidePassword',
            'tooltip' => 'hidePassword',
        ],
    ],
    'messages' => [
        'login_success' => 'Login successful',
        'login_error' => 'Error during login',
        'validation_error' => 'Validation error',
        'credentials_incorrect' => 'Incorrect credentials',
    ],
    'ui' => [
        'login_button' => 'Login',
        'forgot_password' => 'Forgot password?',
        'errors_title' => 'Some errors occurred',
    ],
    'navigation' => [
        'label' => 'Missing Navigation Label',
        'plural_label' => 'Missing Navigation Plural Label',
        'group' => 'Missing Group',
        'icon' => 'heroicon-o-puzzle-piece',
        'sort' => 100,
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
>>>>>>> 350420cb (Check & fix styling)
];
