<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/ru/timex.php
return [
    'model' => [
        'label' => 'Событие',
        'pluralLabel' => 'События',
    ],
    'modal' => [
        'submit' => 'Сохранить',
        'cancel' => 'Отмена',
        'delete' => 'Удалить',
        'edit' => 'Редактировать',
    ],
    'events' => [
        'empty' => 'Нет событий',
    ],
    'event' => [
        'subject' => 'Тема',
        'body' => 'Описание',
        'category' => 'Категория',
        'allDay' => 'Целый день',
        'start' => 'Начало',
        'end' => 'Окончание',
        'participants' => 'Участники',
        'attachments' => 'Вложения',
    ],
    'event-list' => [
        'author' => 'Автор: :name',
        'start' => 'Начало: :start',
        'end' => 'Окончание: :end',
    ],
    'labels' => [
        'navigation' => 'TiMEX',
        'breadcrumbs' => 'TiMEX',
        'title' => 'TiMEX',
        'today' => 'Сегодня',
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
