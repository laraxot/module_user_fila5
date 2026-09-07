<?php

/**
 * Tenant List Management.
 */
<<<<<<< HEAD
=======

>>>>>>> 2024e2e7 (.)
declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantResource\Pages;

<<<<<<< HEAD
use Override;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Str;
use Modules\User\Filament\Resources\TenantResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
=======
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Str;
use Modules\User\Filament\Resources\TenantResource;
use Modules\User\Models\Tenant;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
>>>>>>> 2024e2e7 (.)

class ListTenants extends XotBaseListRecords
{
    protected static string $resource = TenantResource::class;

    /**
     * Definisce le colonne della tabella per la lista tenant.
     */
<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
    /**
     * @return array<string, mixed>
     */
>>>>>>> 2024e2e7 (.)
    public function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')->searchable()->sortable(),
            'name' => TextColumn::make('name')->searchable(),
            'slug' => TextColumn::make('slug')
                ->default(function ($record) {
<<<<<<< HEAD
                    if ($record === null) {
                        return '';
                    }
                    $record->generateSlug();
                    $slug = Str::slug($record->name);
                    $record->slug = $slug;
=======
                    if (null === $record || ! $record instanceof Tenant) {
                        return '';
                    }
                    $record->generateSlug();
                    $name = $record->getAttribute('name');
                    if (! is_string($name)) {
                        $name = '';
                    }
                    $slug = Str::slug($name);
                    $record->setAttribute('slug', $slug);
>>>>>>> 2024e2e7 (.)
                    $record->save();

                    return $slug;
                })
                ->sortable(),
        ];
    }
}
