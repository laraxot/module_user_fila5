<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/pt/password_reset.php
return [
    'navigation' => [
        'label' => 'Redefinição de Senha',
        'group' => 'Segurança',
        'icon' => 'heroicon-o-key',
        'sort' => 42,
    ],
    'label' => 'Redefinição de Senha',
    'plural_label' => 'Redefinições de Senha',
    'fields' => [
        'id' => [
            'label' => 'ID',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'email' => [
            'label' => 'Email',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'token' => [
            'label' => 'Token',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'Criado Em',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'actions' => [
        'resend_email' => [
            'label' => 'Reenviar Email',
        ],
        'view_request' => [
            'label' => 'Ver Solicitação',
        ],
    ],
];
