<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/en/timex.php
return [
    'model' => [
        'label' => 'Event',
        'pluralLabel' => 'Events',
    ],
    'modal' => [
        'submit' => 'Submit',
        'cancel' => 'Cancel',
        'delete' => 'Delete',
        'edit' => 'Edit',
    ],
    'events' => [
        'empty' => 'No upcoming :label',
    ],
    'event' => [
        'subject' => 'Subject',
        'body' => 'Body',
        'category' => 'Category',
        'allDay' => 'All day',
        'start' => 'Start',
        'end' => 'End',
        'participants' => 'Participants',
        'attachments' => 'Attachments',
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
        'today' => 'Today',
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
