<?php

/**
 * --.
 */
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> 2024e2e7 (.)
=======

>>>>>>> f589f9b2 (.)
declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantResource\RelationManagers;

<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Override;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
=======
=======
>>>>>>> f589f9b2 (.)
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
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
use Illuminate\Support\Str;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class DomainsRelationManager extends XotBaseRelationManager
{
    protected static string $relationship = 'domains';

<<<<<<< HEAD
<<<<<<< HEAD
    /**
     * @return array<string, Component>
     */
    #[Override]
=======
=======
>>>>>>> f589f9b2 (.)
    protected static ?string $recordTitleAttribute = 'domain';

    /**
     * @return array<string, Component>
     */
    #[\Override]
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    public function getFormSchema(): array
    {
        return [
            'domain' => TextInput::make('domain')
                ->required()
                ->prefix('http(s)://')
<<<<<<< HEAD
<<<<<<< HEAD
                ->suffix('.' . request()->getHost())
=======
                ->suffix('.'.request()->getHost())
>>>>>>> 2024e2e7 (.)
=======
                ->suffix('.'.request()->getHost())
>>>>>>> f589f9b2 (.)
                ->maxLength(255),
        ];
    }

<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('domain')
            ->columns([
                TextColumn::make('domain'),
                TextColumn::make('full-domain')->getStateUsing(
                    static fn($record) => Str::of($record->domain)->append('.')->append(request()->getHost()),
                ),
            ])
            ->filters([])
            ->headerActions([
                CreateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
=======
=======
>>>>>>> f589f9b2 (.)
    /**
     * @return array<string, Column>
     */
    #[\Override]
    public function getTableColumns(): array
    {
        return [
            'domain' => TextColumn::make('domain'),
            'full-domain' => TextColumn::make('full-domain')->getStateUsing(
                static fn ($record) => is_object($record) && isset($record->domain) && is_string($record->domain) ?
                    Str::of($record->domain)->append('.')->append(request()->getHost()) : '',
            ),
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
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    }
}
