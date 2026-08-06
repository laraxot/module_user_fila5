<?php

declare(strict_types=1);

return [
    'navigation' => [
        'label' => 'Restablecimiento de Contraseña',
<<<<<<< HEAD
        'group' => [
            'name' => 'Autenticación',
            'description' => 'Acceso, registro y credenciales',
        ],
=======
        'group' => 'Seguridad',
>>>>>>> laraxot/dev
        'icon' => 'heroicon-o-key',
        'sort' => 42,
    ],
    'label' => 'Restablecimiento de Contraseña',
    'plural_label' => 'Restablecimientos de Contraseña',
    'fields' => [
        'id' => [
            'label' => 'ID',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'email' => [
            'label' => 'Correo Electrónico',
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
            'label' => 'Creado En',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'actions' => [
        'resend_email' => [
            'label' => 'Reenviar Correo',
        ],
        'view_request' => [
            'label' => 'Ver Solicitud',
        ],
    ],
];
