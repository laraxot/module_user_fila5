<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\RoleResource\RelationManagers;

<<<<<<< HEAD
use Filament\Tables\Columns\Layout\Component;
use Filament\Tables\Filters\BaseFilter;
use Override;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Modules\UI\Enums\TableLayoutEnum;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
use Modules\Xot\Filament\Traits\HasXotTable;
use Modules\Xot\Filament\Traits\TransTrait;
=======
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Tables;
use Filament\Tables\Columns\Layout\Component;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\BaseFilter;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
>>>>>>> 2024e2e7 (.)

/**
 * UsersRelationManager.
 *
 * Manages the relationship between users and roles, providing functionality
 * for viewing, filtering, and managing users associated with a specific role.
 */
final class UsersRelationManager extends XotBaseRelationManager
{
    protected static string $relationship = 'users';

<<<<<<< HEAD
    protected static null|string $inverseRelationship = 'roles';
=======
    protected static ?string $inverseRelationship = 'roles';
>>>>>>> 2024e2e7 (.)

    /**
     * Returns the form schema structure, defining the input fields for user data.
     *
     * @return array<\Filament\Schemas\Components\Component>
     */
<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> 2024e2e7 (.)
    public function getFormSchema(): array
    {
        return [
            TextInput::make('name')->required()->maxLength(255),
            // Additional fields can be added here as necessary
        ];
    }

    /**
     * Defines the columns displayed in the users list table.
     *
     * @return array<Tables\Columns\Column|Component>
     */
<<<<<<< HEAD
    #[Override]
    public function getTableColumns(): array
    {
        return [
            TextColumn::make('name')
                ->searchable()
                ->sortable()
                ->copyable(),
            TextColumn::make('email')
                ->searchable()
                ->sortable()
                ->copyable(),
            TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(),
            TextColumn::make('updated_at')
=======
    #[\Override]
    public function getTableColumns(): array
    {
        return [
            'name' => TextColumn::make('name')
                ->searchable()
                ->sortable()
                ->copyable(),
            'email' => TextColumn::make('email')
                ->searchable()
                ->sortable()
                ->copyable(),
            'created_at' => TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(),
            'updated_at' => TextColumn::make('updated_at')
>>>>>>> 2024e2e7 (.)
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }

    /**
     * Configures available filters for the table, enabling users to refine their view.
     *
     * @return array<BaseFilter>
     */
<<<<<<< HEAD
    #[Override]
    public function getTableFilters(): array
    {
        return [
            Filter::make('active')->query(fn(Builder $query): Builder => $query->where('is_active', true))->toggle(),
=======
    #[\Override]
    public function getTableFilters(): array
    {
        return [
            Filter::make('active')->query(fn (Builder $query): Builder => $query->where('is_active', true))->toggle(),
>>>>>>> 2024e2e7 (.)
            Filter::make('created_at')
                ->schema([
                    DatePicker::make('created_from'),
                    DatePicker::make('created_until'),
                ])
<<<<<<< HEAD
                ->query(fn(Builder $query, array $data): Builder => $query->when($data['created_from'], fn(
                    Builder $query,
                    $date,
                ) => $query->whereDate('created_at', '>=', $date))->when($data['created_until'], fn(
                    Builder $query,
                    $date,
                ) => $query->whereDate('created_at', '<=', $date)))
=======
                ->query(function (Builder $query, array $data): Builder {
                    if (isset($data['created_from']) && is_string($data['created_from']) && '' !== $data['created_from']) {
                        $query->whereDate('created_at', '>=', $data['created_from']);
                    }

                    if (isset($data['created_until']) && is_string($data['created_until']) && '' !== $data['created_until']) {
                        $query->whereDate('created_at', '<=', $data['created_until']);
                    }

                    return $query;
                })
>>>>>>> 2024e2e7 (.)
                ->columns(2),
        ];
    }
}
