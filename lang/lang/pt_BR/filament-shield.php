<?php

declare(strict_types=1);

// User translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/User/docs/wiki — domain i18n only.
// File: lang/lang/pt_BR/filament-shield.php
return [
    /*
     * |--------------------------------------------------------------------------
     * | Table Columns
     * |--------------------------------------------------------------------------
     */

    'column.name' => 'Nome',
    'column.guard_name' => 'Guard',
    'column.roles' => 'Funções',
    'column.permissions' => 'Permissões',
    'column.updated_at' => 'Alterado em',
    /*
     * |--------------------------------------------------------------------------
     * | Form Fields
     * |--------------------------------------------------------------------------
     */

    'field.name' => 'Nome',
    'field.guard_name' => 'Guard',
    'field.permissions' => 'Permissões',
    'field.select_all.name' => 'Selecionar todos',
    'field.select_all.message' => 'Habilitar todas as permissões para essa função',
    /*
     * |--------------------------------------------------------------------------
     * | Navigation & Resource
     * |--------------------------------------------------------------------------
     */

    'nav.group' => 'Filament Shield',
    'nav.role.label' => 'Funções',
    'nav.role.icon' => 'heroicon-o-shield-check',
    'resource.label.role' => 'Função',
    'resource.label.roles' => 'Funções',
    /*
     * |--------------------------------------------------------------------------
     * | Section & Tabs
     * |--------------------------------------------------------------------------
     */
    'section' => 'Entidades',
    'resources' => 'Recursos',
    'widgets' => 'Widgets',
    'pages' => 'Páginas',
    'custom' => 'Permissões customizadas',
    /*
     * |--------------------------------------------------------------------------
     * | Messages
     * |--------------------------------------------------------------------------
     */

    'forbidden' => 'Você não tem permissão para acessar',
    /*
     * |--------------------------------------------------------------------------
     * | Resource Permissions' Labels
     * |--------------------------------------------------------------------------
     */
    // 'resource_permission_prefixes_labels' => [
    //     'view' => 'View',
    //     'view_any' => 'View Any',
    //     'create' => 'Create',
    //     'update' => 'Update',
    //     'delete' => 'Delete',
    //     'delete_any' => 'Delete Any',
    //     'force_delete' => 'Force Delete',
    //     'force_delete_any' => 'Force Delete Any',
    //     'restore' => 'Restore',
    //     'reorder' => 'Reorder',
    //     'restore_any' => 'Restore Any',
    //     'replicate' => 'Replicate',
    // ],
];
