<?php

declare(strict_types=1);

<<<<<<< HEAD

=======
>>>>>>> 2024e2e7 (.)
return [
    'navigation' => [
        'name' => 'Password',
        'plural' => 'Passwords',
        'group' => [
            'name' => 'Admin',
        ],
    ],
    'fields' => [
<<<<<<< HEAD
        'first_name' => 'Nome',
        'last_name' => 'Cognome',
        'otp_expiration_minutes' => [
            'help' => 'Durata in minuti della validità della password temporanea',
        ],
        'otp_length' => [
            'help' => 'Lunghezza del codice OTP',
        ],
        'expires_in' => [
            'help' => 'Il numero di giorni prima che la password scadrà',
        ],
        'min' => [
            'help' => 'La dimensione minima della password',
        ],
        'mixedCase' => [
            'help' => 'la password richiede almeno una lettera maiuscola e una minuscola',
        ],
        'letters' => [
            'help' => 'la password richiede almeno una lettera',
        ],
        'numbers' => [
            'help' => 'la password richiede almeno un numero',
=======
        'first_name' => [
            'label' => 'Nome',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'last_name' => [
            'label' => 'Cognome',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'otp_expiration_minutes' => [
            'help' => 'Durata in minuti della validità della password temporanea',
            'label' => '',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'otp_length' => [
            'help' => 'Lunghezza del codice OTP',
            'label' => '',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'expires_in' => [
            'help' => 'Il numero di giorni prima che la password scadrà',
            'label' => '',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'min' => [
            'help' => 'La dimensione minima della password',
            'label' => '',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'mixedCase' => [
            'help' => 'la password richiede almeno una lettera maiuscola e una minuscola',
            'label' => '',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'letters' => [
            'help' => 'la password richiede almeno una lettera',
            'label' => '',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'numbers' => [
            'help' => 'la password richiede almeno un numero',
            'label' => '',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
>>>>>>> 2024e2e7 (.)
        ],
        'symbols' => [
            'help' => 'la password richiede almeno un simbolo',
            'label' => [
                'help' => 'la password richiede almeno un simbolo',
            ],
<<<<<<< HEAD
=======
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
>>>>>>> 2024e2e7 (.)
        ],
        'uncompromised' => [
            'help' => 'Se la password non deve essere stata compromessa in data leaks',
            'label' => [
                'help' => 'Se la password non deve essere stata compromessa in data leaks',
            ],
<<<<<<< HEAD
=======
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
>>>>>>> 2024e2e7 (.)
        ],
        'compromisedThreshold' => [
            'help' => 'Il numero di volte che una password può apparire in data leaks prima di essere considerata compromessa',
            'label' => [
                'help' => 'Il numero di volte che una password può apparire in data leaks prima di essere considerata compromessa',
            ],
<<<<<<< HEAD
=======
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
>>>>>>> 2024e2e7 (.)
        ],
        'new_password' => [
            'label' => 'new_password',
            'fields' => [
                'label' => 'new_password',
            ],
            'description' => 'new_password',
            'helper_text' => 'new_password',
            'placeholder' => 'new_password',
<<<<<<< HEAD
=======
            'tooltip' => '',
>>>>>>> 2024e2e7 (.)
        ],
    ],
    'actions' => [
        'import' => [
            'fields' => [
                'import_file' => 'Seleziona un file XLS o CSV da caricare',
            ],
        ],
        'export' => [
            'filename_prefix' => 'Aree al',
            'columns' => [
                'name' => 'Nome area',
                'parent_name' => 'Nome area livello superiore',
            ],
        ],
        'change_password' => 'Cambio password',
        'updateDataAction' => [
            'label' => 'updateDataAction',
        ],
    ],
<<<<<<< HEAD
=======
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
>>>>>>> 2024e2e7 (.)
];
