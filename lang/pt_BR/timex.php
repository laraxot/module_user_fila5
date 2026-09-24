<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/pt_BR/timex.php
return [
    'model' => [
        'label' => 'Agendamento',
        'pluralLabel' => 'Agendamentos',
    ],
    'modal' => [
        'submit' => 'Criar',
        'cancel' => 'Cancelar',
        'delete' => 'Deletar',
        'edit' => 'Editar',
    ],
    'events' => [
        'empty' => 'Nenhum evento futuro',
    ],
    'event' => [
        'subject' => 'Título',
        'body' => 'Mensagem',
        'category' => 'Categoria',
        'allDay' => 'Dia todo',
        'start' => 'Começo',
        'end' => 'Término',
        'participants' => 'Participantes',
        'attachments' => 'Anexos',
    ],
    'event-list' => [
        'author' => 'Author: :name',
        'start' => 'Start: :start',
        'end' => 'End: :end',
    ],
    'labels' => [
        'navigation' => 'TiMEX',
        'breadcrumbs' => 'TiMEX',
        'title' => 'TiMEX',
        'today' => 'Hoje',
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
    'fields' => [
    ],
    'actions' => [
    ],
];
