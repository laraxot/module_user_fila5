<?php

<<<<<<< HEAD
declare(strict_types=1);
/**
 * Tenant List Management.
 */
=======
/**
 * Tenant List Management.
 */
declare(strict_types=1);
>>>>>>> 350420cb (Check & fix styling)

namespace Modules\User\Filament\Resources\TenantResource\Pages;

use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Str;
use Modules\User\Filament\Resources\TenantResource;
use Modules\User\Models\Tenant;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListTenants extends XotBaseListRecords
{
    protected static string $resource = TenantResource::class;

    /**
     * Definisce le colonne della tabella per la lista tenant.
     */
<<<<<<< HEAD
    #[\Override]
    /**
     * @return array<string, mixed>
     */
=======
    /**
     * @return array<string, \Filament\Tables\Columns\Column>
     */
    #[\Override]
>>>>>>> 350420cb (Check & fix styling)
    public function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')->searchable()->sortable(),
            'name' => TextColumn::make('name')->searchable(),
            'slug' => TextColumn::make('slug')
                ->default(function (mixed $record): string {
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
}
