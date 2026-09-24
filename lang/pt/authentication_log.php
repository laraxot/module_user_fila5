<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/pt/authentication_log.php
return [
    'navigation' => [
        'group' => 'Autenticação',
        'icon' => 'heroicon-o-shield-exclamation',
        'label' => 'Registros de Autenticação',
        'sort' => 5,
    ],
    'label' => 'Registro de Autenticação',
    'plural_label' => 'Registros de Autenticação',
    'fields' => [
        'id' => [
            'label' => 'ID',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'user_id' => [
            'label' => 'Usuário',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'ip_address' => [
            'label' => 'Endereço IP',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'user_agent' => [
            'label' => 'User Agent',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'login_at' => [
            'label' => 'Acesso Em',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'logout_at' => [
            'label' => 'Desconexão Em',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'login_method' => [
            'label' => 'Método de Acesso',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'success' => [
            'label' => 'Sucesso',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'actions' => [
        'reorderRecords' => [
            'tooltip' => 'Reordenar Registros',
            'icon' => 'reorderRecords',
            'label' => 'Reordenar Registros',
        ],
        'view_details' => [
            'label' => 'Ver Detalhes',
        ],
        'export_logs' => [
            'label' => 'Exportar Registros',
        ],
    ],
];
