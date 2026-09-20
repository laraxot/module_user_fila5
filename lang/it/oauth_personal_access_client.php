<?php

declare(strict_types=1);

return [
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
    'navigation' => ['label' => 'Personal Access Client', 'plural_label' => 'Personal Access Client', 'group' => 'OAuth', 'icon' => 'heroicon-o-key', 'sort' => 6],
    'label' => 'Personal Access Client',
    'plural_label' => 'Personal Access Client',
    'fields' => [
        'client_id' => ['label' => 'Client OAuth', 'tooltip' => 'Client OAuth associato', 'placeholder' => 'Seleziona un client OAuth', 'helper_text' => 'Il client OAuth associato a questo personal access client', 'description' => 'Client OAuth per personal access'],
        'id' => ['label' => 'ID', 'tooltip' => 'Identificativo univoco', 'helper_text' => 'Identificativo univoco del personal access client', 'description' => 'ID del personal access client'],
        'created_at' => ['label' => 'Data Creazione', 'tooltip' => 'Data di creazione', 'helper_text' => 'Data e ora di creazione del personal access client', 'description' => 'Timestamp di creazione'],
        'updated_at' => ['label' => 'Data Aggiornamento', 'tooltip' => 'Data di ultimo aggiornamento', 'helper_text' => 'Data e ora dell\'ultimo aggiornamento', 'description' => 'Timestamp di aggiornamento'],
        'client' => [
            'name' => ['label' => 'client.name'],
        ],
<<<<<<< HEAD
=======
        'value' => ['label' => 'value', 'placeholder' => 'value', 'helper_text' => 'value', 'description' => 'value'],
>>>>>>> laraxot/dev
    ],
    'actions' => [
        'create' => ['label' => 'Crea Personal Access Client', 'tooltip' => 'Crea un nuovo personal access client', 'helper_text' => 'Crea un nuovo personal access client', 'description' => 'Azione per creare', 'success' => 'Personal Access Client creato con successo', 'error' => 'Errore durante la creazione del Personal Access Client', 'icon' => 'create'],
        'edit' => ['label' => 'Modifica Personal Access Client', 'tooltip' => 'Modifica il personal access client', 'helper_text' => 'Modifica il personal access client', 'description' => 'Azione per modificare', 'success' => 'Personal Access Client aggiornato con successo', 'error' => 'Errore durante l\'aggiornamento del Personal Access Client', 'icon' => 'edit'],
        'delete' => ['label' => 'Elimina Personal Access Client', 'tooltip' => 'Elimina il personal access client', 'helper_text' => 'Elimina il personal access client', 'description' => 'Azione per eliminare', 'success' => 'Personal Access Client eliminato con successo', 'error' => 'Errore durante l\'eliminazione del Personal Access Client', 'confirmation' => 'Sei sicuro di voler eliminare questo Personal Access Client?', 'icon' => 'delete'],
        'logout' => ['label' => 'Logout', 'tooltip' => 'Disconnettiti', 'helper_text' => 'Esci dall\'account', 'description' => 'Azione di logout', 'icon' => 'heroicon-o-arrow-right-on-rectangle'],
        'createAnother' => ['label' => 'createAnother', 'icon' => 'createAnother', 'tooltip' => 'createAnother'],
        'save' => ['label' => 'save', 'icon' => 'save', 'tooltip' => 'save'],
<<<<<<< HEAD
        'view' => ['label' => 'view', 'icon' => 'view', 'tooltip' => 'view'],
    ],
    'messages' => ['created' => 'Personal Access Client creato con successo', 'updated' => 'Personal Access Client aggiornato con successo', 'deleted' => 'Personal Access Client eliminato con successo'],
    'sections' => [
        'OAuth Personal Access Client Information' => ['label' => 'OAuth Personal Access Client Information', 'heading' => 'OAuth Personal Access Client Information'],
        'empty' => ['label' => '', 'heading' => ''],
=======
=======
>>>>>>> 87273113 (.)
    'navigation' => [
        'label' => 'Personal Access Client',
        'plural_label' => 'Personal Access Client',
        'group' => 'OAuth',
        'icon' => 'heroicon-o-key',
        'sort' => 6,
    ],
    'label' => 'Personal Access Client',
    'plural_label' => 'Personal Access Client',
    'fields' => [
        'client_id' => [
            'label' => 'Client OAuth',
            'tooltip' => 'Client OAuth associato',
            'placeholder' => 'Seleziona un client OAuth',
            'helper_text' => 'Il client OAuth associato a questo personal access client',
            'description' => 'Client OAuth per personal access',
        ],
        'id' => [
            'label' => 'ID',
            'tooltip' => 'Identificativo univoco',
            'helper_text' => 'Identificativo univoco del personal access client',
            'description' => 'ID del personal access client',
        ],
        'created_at' => [
            'label' => 'Data Creazione',
            'tooltip' => 'Data di creazione',
            'helper_text' => 'Data e ora di creazione del personal access client',
            'description' => 'Timestamp di creazione',
        ],
        'updated_at' => [
            'label' => 'Data Aggiornamento',
            'tooltip' => 'Data di ultimo aggiornamento',
            'helper_text' => 'Data e ora dell\'ultimo aggiornamento',
            'description' => 'Timestamp di aggiornamento',
        ],
    ],
    'actions' => [
        'create' => [
            'label' => 'Crea Personal Access Client',
            'tooltip' => 'Crea un nuovo personal access client',
            'helper_text' => 'Crea un nuovo personal access client',
            'description' => 'Azione per creare',
            'success' => 'Personal Access Client creato con successo',
            'error' => 'Errore durante la creazione del Personal Access Client',
        ],
        'edit' => [
            'label' => 'Modifica Personal Access Client',
            'tooltip' => 'Modifica il personal access client',
            'helper_text' => 'Modifica il personal access client',
            'description' => 'Azione per modificare',
            'success' => 'Personal Access Client aggiornato con successo',
            'error' => 'Errore durante l\'aggiornamento del Personal Access Client',
        ],
        'delete' => [
            'label' => 'Elimina Personal Access Client',
            'tooltip' => 'Elimina il personal access client',
            'helper_text' => 'Elimina il personal access client',
            'description' => 'Azione per eliminare',
            'success' => 'Personal Access Client eliminato con successo',
            'error' => 'Errore durante l\'eliminazione del Personal Access Client',
            'confirmation' => 'Sei sicuro di voler eliminare questo Personal Access Client?',
        ],
        'logout' => [
            'label' => 'Logout',
            'tooltip' => 'Disconnettiti',
            'helper_text' => 'Esci dall\'account',
            'description' => 'Azione di logout',
            'icon' => 'heroicon-o-arrow-right-on-rectangle',
        ],
    ],
    'messages' => [
        'created' => 'Personal Access Client creato con successo',
        'updated' => 'Personal Access Client aggiornato con successo',
        'deleted' => 'Personal Access Client eliminato con successo',
>>>>>>> 60a2c9a9 (.)
    ],
=======
    'navigation' => ['label' => 'Personal Access Client', 'plural_label' => 'Personal Access Client', 'group' => 'OAuth', 'icon' => 'heroicon-o-key', 'sort' => 6],
    'label' => 'Personal Access Client',
    'plural_label' => 'Personal Access Client',
    'fields' => [
        'client_id' => ['label' => 'Client OAuth', 'tooltip' => 'Client OAuth associato', 'placeholder' => 'Seleziona un client OAuth', 'helper_text' => 'Il client OAuth associato a questo personal access client', 'description' => 'Client OAuth per personal access'],
        'id' => ['label' => 'ID', 'tooltip' => 'Identificativo univoco', 'helper_text' => 'Identificativo univoco del personal access client', 'description' => 'ID del personal access client'],
        'created_at' => ['label' => 'Data Creazione', 'tooltip' => 'Data di creazione', 'helper_text' => 'Data e ora di creazione del personal access client', 'description' => 'Timestamp di creazione'],
        'updated_at' => ['label' => 'Data Aggiornamento', 'tooltip' => 'Data di ultimo aggiornamento', 'helper_text' => 'Data e ora dell\'ultimo aggiornamento', 'description' => 'Timestamp di aggiornamento'],
        'client' => [
            'name' => ['label' => 'client.name'],
        ],
    ],
    'actions' => [
        'create' => ['label' => 'Crea Personal Access Client', 'tooltip' => 'Crea un nuovo personal access client', 'helper_text' => 'Crea un nuovo personal access client', 'description' => 'Azione per creare', 'success' => 'Personal Access Client creato con successo', 'error' => 'Errore durante la creazione del Personal Access Client', 'icon' => 'create'],
        'edit' => ['label' => 'Modifica Personal Access Client', 'tooltip' => 'Modifica il personal access client', 'helper_text' => 'Modifica il personal access client', 'description' => 'Azione per modificare', 'success' => 'Personal Access Client aggiornato con successo', 'error' => 'Errore durante l\'aggiornamento del Personal Access Client', 'icon' => 'edit'],
        'delete' => ['label' => 'Elimina Personal Access Client', 'tooltip' => 'Elimina il personal access client', 'helper_text' => 'Elimina il personal access client', 'description' => 'Azione per eliminare', 'success' => 'Personal Access Client eliminato con successo', 'error' => 'Errore durante l\'eliminazione del Personal Access Client', 'confirmation' => 'Sei sicuro di voler eliminare questo Personal Access Client?', 'icon' => 'delete'],
        'logout' => ['label' => 'Logout', 'tooltip' => 'Disconnettiti', 'helper_text' => 'Esci dall\'account', 'description' => 'Azione di logout', 'icon' => 'heroicon-o-arrow-right-on-rectangle'],
        'createAnother' => ['label' => 'createAnother', 'icon' => 'createAnother', 'tooltip' => 'createAnother'],
        'save' => ['label' => 'save', 'icon' => 'save', 'tooltip' => 'save'],
        'view' => ['label' => 'view', 'icon' => 'view', 'tooltip' => 'view'],
    ],
    'messages' => ['created' => 'Personal Access Client creato con successo', 'updated' => 'Personal Access Client aggiornato con successo', 'deleted' => 'Personal Access Client eliminato con successo'],
>>>>>>> 2024e2e7 (.)
=======
        'applyFilters' => ['label' => 'applyFilters', 'icon' => 'applyFilters', 'tooltip' => 'applyFilters'],
        'openFilters' => ['label' => 'openFilters', 'icon' => 'openFilters', 'tooltip' => 'openFilters'],
        'resetFilters' => ['label' => 'resetFilters', 'icon' => 'resetFilters', 'tooltip' => 'resetFilters'],
        'applyTableColumnManager' => ['label' => 'applyTableColumnManager', 'icon' => 'applyTableColumnManager', 'tooltip' => 'applyTableColumnManager'],
        'openColumnManager' => ['label' => 'openColumnManager', 'icon' => 'openColumnManager', 'tooltip' => 'openColumnManager'],
        'resetColumnManager' => ['label' => 'resetColumnManager', 'icon' => 'resetColumnManager', 'tooltip' => 'resetColumnManager'],
        'reorderRecords' => ['label' => 'reorderRecords', 'icon' => 'reorderRecords', 'tooltip' => 'reorderRecords'],
        'profile' => ['label' => 'profile', 'icon' => 'profile', 'tooltip' => 'profile'],
    ],
    'messages' => ['created' => 'Personal Access Client creato con successo', 'updated' => 'Personal Access Client aggiornato con successo', 'deleted' => 'Personal Access Client eliminato con successo'],
>>>>>>> laraxot/dev
];
