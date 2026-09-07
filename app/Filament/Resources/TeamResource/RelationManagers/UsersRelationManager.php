<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TeamResource\RelationManagers;

<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Actions\BulkAction;
use Filament\Tables\Columns\Column;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Override;
use Filament\Actions\AttachAction;
use Filament\Actions\ViewAction;
use Filament\Actions\EditAction;
use Filament\Actions\DetachAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DetachBulkAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Modules\User\Filament\Resources\UserResource;
=======
=======
>>>>>>> f589f9b2 (.)
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\AttachAction;
use Filament\Actions\BulkAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DetachAction;
use Filament\Actions\DetachBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class UsersRelationManager extends XotBaseRelationManager
{
    protected static string $relationship = 'users';

<<<<<<< HEAD
<<<<<<< HEAD
    protected static null|string $inverseRelationship = 'teams';

    protected static null|string $recordTitleAttribute = 'name';
=======
    protected static ?string $inverseRelationship = 'teams';

    protected static ?string $recordTitleAttribute = 'name';
>>>>>>> 2024e2e7 (.)
=======
    protected static ?string $inverseRelationship = 'teams';

    protected static ?string $recordTitleAttribute = 'name';
>>>>>>> f589f9b2 (.)

    /**
     * @return array<string, Column>
     */
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> 2024e2e7 (.)
=======
    #[\Override]
>>>>>>> f589f9b2 (.)
    public function getTableColumns(): array
    {
        return [
            'name' => TextColumn::make('name'),
            'email' => TextColumn::make('email'),
            'role' => TextColumn::make('role'),
        ];
    }

    /**
     * @return array<string, Action>
     */
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> 2024e2e7 (.)
=======
    #[\Override]
>>>>>>> f589f9b2 (.)
    public function getTableHeaderActions(): array
    {
        return [
            'attach' => AttachAction::make(),
        ];
    }

    /**
     * @return array<string, Action|ActionGroup>
     */
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> 2024e2e7 (.)
=======
    #[\Override]
>>>>>>> f589f9b2 (.)
    public function getTableActions(): array
    {
        return [
            'view' => ViewAction::make(),
            'edit' => EditAction::make(),
            'detach' => DetachAction::make(),
            'delete' => DeleteAction::make(),
        ];
    }

    /**
     * @return array<string, BulkAction>
     */
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> 2024e2e7 (.)
=======
    #[\Override]
>>>>>>> f589f9b2 (.)
    public function getTableBulkActions(): array
    {
        return [
            'detach' => DetachBulkAction::make(),
            'delete' => DeleteBulkAction::make(),
        ];
    }
}
