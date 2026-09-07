<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\RoleResource\RelationManagers;

<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Override;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
=======
use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
>>>>>>> 2024e2e7 (.)
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class PermissionsRelationManager extends XotBaseRelationManager
{
    protected static string $relationship = 'permissions';

<<<<<<< HEAD
=======
    protected static ?string $recordTitleAttribute = 'name';

>>>>>>> 2024e2e7 (.)
    /**
     * Configura lo schema del form per la gestione dei permessi.
     *
     * @return array<string, Component>
     */
<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> 2024e2e7 (.)
    public function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')
                ->required()
<<<<<<< HEAD
                ->maxLength(255)
                ->placeholder(__('Inserisci il nome del permesso')),
=======
                ->maxLength(255),
>>>>>>> 2024e2e7 (.)
        ];
    }

    /**
<<<<<<< HEAD
     * Configura la tabella per la visualizzazione e la gestione dei permessi.
     */
    #[Override]
    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
            ])
            ->filters([]) // Aggiungi eventuali filtri qui se necessario
            ->headerActions([
                CreateAction::make()->tooltip(__('Crea un nuovo permesso')),
            ])
            ->recordActions([
                EditAction::make()->tooltip(__('Modifica permesso')),
                DeleteAction::make()->tooltip(__('Elimina permesso')),
            ])
            ->toolbarActions([
                DeleteBulkAction::make()->tooltip(__('Elimina i permessi selezionati')),
            ]);
=======
     * @return array<string, Column>
     */
    #[\Override]
    public function getTableColumns(): array
    {
        return [
            'name' => TextColumn::make('name')->sortable()->searchable(),
        ];
    }

    /**
     * @return array<string, Action>
     */
    #[\Override]
    public function getTableHeaderActions(): array
    {
        return [
            'create' => CreateAction::make(),
        ];
    }

    /**
     * @return array<string, Action>
     */
    #[\Override]
    public function getTableActions(): array
    {
        return [
            'edit' => EditAction::make(),
            'delete' => DeleteAction::make(),
        ];
    }

    /**
     * @return array<string, BulkAction>
     */
    #[\Override]
    public function getTableBulkActions(): array
    {
        return [
            'delete' => DeleteBulkAction::make(),
        ];
>>>>>>> 2024e2e7 (.)
    }
}
