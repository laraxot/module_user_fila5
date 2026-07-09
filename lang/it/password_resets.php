<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/it/password_resets.php
return [
    'fields' => [
        'id' => [
            'label' => 'id',
        ],
        'email' => [
            'label' => 'email',
        ],
        'token' => [
            'label' => 'token',
        ],
        'created_at' => [
            'label' => 'created_at',
        ],
    ],
];
