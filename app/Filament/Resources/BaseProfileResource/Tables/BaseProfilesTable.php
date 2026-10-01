<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\BaseProfileResource\Tables;

use Filament\Tables\Columns\Column;
<<<<<<< HEAD
use Filament\Tables\Columns\TextColumn;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;
=======
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\BaseFilter;
use Modules\User\Filament\Tables\Columns\UserColumn;
use Modules\User\Models\BaseProfile;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;
use Modules\Xot\Filament\Tables\Filters\IsActiveFilter;
>>>>>>> laraxot/dev

class BaseProfilesTable extends XotBaseResourceTable
{
    /**
<<<<<<< HEAD
=======
     * @var class-string<BaseProfile>
     */
    protected static string $model = BaseProfile::class;

    /**
     * Profilo operativo: identità, contatto e stato sono visibili; gli identificativi
     * tecnici restano disponibili ma non affollano la prima scansione della tabella.
     *
>>>>>>> laraxot/dev
     * @return array<string, Column>
     */
    public function getTableColumns(): array
    {
<<<<<<< HEAD
        /*
         * @return array<int|string, \Filament\Tables\Columns\Column>
         */
        return [
            'id' => TextColumn::make('id')->sortable(),
            'name' => TextColumn::make('name')->searchable(),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
=======
        return [
            'first_name' => TextColumn::make('first_name')->searchable()->sortable(),
            'last_name' => TextColumn::make('last_name')->searchable()->sortable(),
            'email' => TextColumn::make('email')->searchable()->sortable()->copyable(),
            'phone' => TextColumn::make('phone')->searchable()->toggleable(isToggledHiddenByDefault: true),
            'user' => UserColumn::make()->searchable(),
            'is_active' => IconColumn::make('is_active')
                ->label(__('xot::table-filters.is_active.label'))
                ->boolean()
                ->sortable(),
            'photo' => SpatieMediaLibraryImageColumn::make('photo')->collection('profile'),
            'id' => TextColumn::make('id')->sortable()->copyable()->toggleable(isToggledHiddenByDefault: true),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable()->placeholder('—'),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->placeholder('—')->toggleable(isToggledHiddenByDefault: true),
        ];
    }

    /**
     * Filtro ternario su `is_active`. Vive qui, non sulla pagina, perche' la
     * tabella e costruita dalla Resource: un `getTableFilters()` dichiarato su
     * `ListProfiles` non verrebbe mai chiamato (stessa regola dei `getTableColumns`).
     *
     * Il filtro e riusabile perche' in Xot: `IsActiveFilter` porta con se le
     * stringhe nelle tre lingue e le query, quindi ogni tabella che espone uno
     * stato attivo ottiene lo stesso filtro senza ripeterlo.
     *
     * @return array<string, BaseFilter>
     */
    public function getTableFilters(): array
    {
        return [
            'is_active' => IsActiveFilter::make('is_active'),
>>>>>>> laraxot/dev
        ];
    }
}
