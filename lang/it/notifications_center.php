<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/it/notifications_center.php
return [
    'page' => [
        'meta_title' => [
            'label' => 'Notifiche — area personale',
        ],
        'title' => [
            'label' => 'Notifiche',
        ],
        'description' => [
            'label' => 'Aggiornamenti sulle tue segnalazioni e sulle comunicazioni del Comune.',
        ],
    ],
    'summary' => [
        'unread' => [
            'text' => '{0} Nessuna notifica non letta|{1} :count notifica non letta|[2,*] :count notifiche non lette',
        ],
    ],
    'actions' => [
        'mark_read' => [
            'label' => 'Segna come letta',
        ],
        'mark_all_read' => [
            'label' => 'Segna tutte come lette',
        ],
        'open_link' => [
            'label' => 'Apri dettaglio',
        ],
    ],
    'badge' => [
        'unread' => [
            'label' => 'Non letta',
        ],
    ],
    'empty' => [
        'text' => [
            'label' => 'Non hai ancora ricevuto notifiche.',
        ],
    ],
];
