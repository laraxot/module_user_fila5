<?php

declare(strict_types=1);
/**
 * Tenant List Management.
 */

namespace Modules\User\Filament\Resources\TenantResource\Pages;

use Modules\User\Filament\Resources\TenantResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListTenants extends XotBaseListRecords
{
    protected static string $resource = TenantResource::class;
<<<<<<< .merge_file_Ods04n
=======

    /**
     * Definisce le colonne della tabella per la lista tenant.
     */
    #[\Override]
    /**
     * @return array<string, mixed>
     */
    public function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')->searchable()->sortable(),
            'name' => TextColumn::make('name')->searchable(),
            'slug' => TextColumn::make('slug')
                ->default(function ($record) {
                    if ($record === null || ! $record instanceof Tenant) {
                        return '';
                    }
                    $record->generateSlug();
                    $name = $record->getAttribute('name');
                    if (! is_string($name)) {
                        $name = '';
                    }
                    $slug = Str::slug($name);
                    $record->setAttribute('slug', $slug);
                    $record->save();

                    return $slug;
                })
                ->sortable(),
        ];
    }
>>>>>>> .merge_file_1evtDP
}
