<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/it/team_invitation.php
return [
    'navigation' => [
        'label' => 'Team Invitations',
        'group' => 'Teams',
        'icon' => 'heroicon-o-envelope',
        'sort' => 34,
    ],
    'label' => 'Team Invitation',
    'plural_label' => 'Team Invitation (Plurale)',
    'fields' => [
        'id' => [
            'label' => 'Identificativo',
            'tooltip' => 'Identificativo univoco del record',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'Data Creazione',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'updated_at' => [
            'label' => 'Ultima Modifica',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'actions' => [
        'create' => [
            'label' => 'Crea Team Invitation',
        ],
        'edit' => [
            'label' => 'Modifica Team Invitation',
        ],
        'delete' => [
            'label' => 'Elimina Team Invitation',
        ],
    ],
];
