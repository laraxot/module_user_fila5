<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/zh/passport.php
return [
    'navigation' => [
        'label' => 'Passport',
        'group' => '安全',
        'icon' => 'heroicon-o-shield-check',
        'sort' => 35,
    ],
    'label' => 'Passport',
    'plural_label' => 'Passport',
    'fields' => [
        'id' => [
            'label' => 'ID',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'name' => [
            'label' => '名称',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'client_id' => [
            'label' => '客户端ID',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'client_secret' => [
            'label' => '客户端密钥',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'redirect' => [
            'label' => '重定向',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'personal_access_client' => [
            'label' => '个人访问客户端',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'password_client' => [
            'label' => '密码客户端',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'revoked' => [
            'label' => '已撤销',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'actions' => [
        'create_client' => [
            'label' => '创建客户端',
        ],
        'revoke' => [
            'label' => '撤销',
        ],
    ],
];
