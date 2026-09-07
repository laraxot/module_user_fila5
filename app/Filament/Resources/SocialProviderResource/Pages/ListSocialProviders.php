<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\SocialProviderResource\Pages;

<<<<<<< HEAD
use Override;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
=======
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
>>>>>>> 2024e2e7 (.)
use Modules\User\Filament\Resources\SocialProviderResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

/**
 * --.
 */
class ListSocialProviders extends XotBaseListRecords
{
    protected static string $resource = SocialProviderResource::class;

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
            'name' => TextColumn::make('name')
                ->searchable()
                ->sortable()
                ->wrap(),
            'active' => IconColumn::make('active')->boolean()->sortable(),
            'stateless' => IconColumn::make('stateless')->boolean()->sortable(),
            'socialite' => IconColumn::make('socialite')->boolean()->sortable(),
            'scopes' => TextColumn::make('scopes')->searchable()->wrap(),
            'parameters' => TextColumn::make('parameters')->searchable()->wrap(),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable(),
        ];
    }

<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> 2024e2e7 (.)
    public function getTableFilters(): array
    {
        return [
            'active' => SelectFilter::make('active')->options([
                true => 'Active',
                false => 'Inactive',
            ]),
        ];
    }
}
