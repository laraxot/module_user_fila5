<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\RelationManagers;

use Filament\Actions\Action;
use Filament\Actions\AttachAction;
use Filament\Actions\BulkAction;
use Filament\Actions\DetachAction;
use Filament\Actions\DetachBulkAction;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use Modules\Xot\Contracts\UserContract;
=======
use Modules\User\Models\User;
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class TeamsRelationManager extends XotBaseRelationManager
{
    protected static string $relationship = 'teams';

    protected static ?string $recordTitleAttribute = 'name';

    /**
     * @return array<string, Column>
     */
    #[\Override]
    public function getTableColumns(): array
    {
        return [
            'name' => TextColumn::make('name')->searchable()->sortable(),
            'personal_team' => IconColumn::make('personal_team')
                ->boolean()
                ->getStateUsing(function (Model $record, self $livewire): bool {
<<<<<<< HEAD
                    $user = $livewire->getOwnerRecord();

                    if (! $user instanceof UserContract) {
=======
                    /** @var User $user */
                    $user = $livewire->getOwnerRecord();

                    if (! $user instanceof User) {
>>>>>>> laraxot/dev
                        return false;
                    }

                    /** @var int|string $recordId */
                    $recordId = $record->getKey();

                    return $user->current_team_id === $recordId;
                }),
        ];
    }

    /**
     * @return array<string, Action>
     */
    #[\Override]
    public function getTableHeaderActions(): array
    {
        return [
            'attach' => AttachAction::make()
                ->schema(fn (AttachAction $action): array => [
                    $action->getRecordSelect(),
                    TextInput::make('role')->default('editor')->required(),
                ]),
        ];
    }

    /**
     * @return array<string, Action>
     */
    #[\Override]
    public function getTableActions(): array
    {
        return [
            'detach' => DetachAction::make()
                ->after(function (Model $record, self $livewire): void {
<<<<<<< HEAD
                    $user = $livewire->getOwnerRecord();

                    if (! $user instanceof UserContract) {
=======
                    /** @var User $user */
                    $user = $livewire->getOwnerRecord();

                    if (! $user instanceof User) {
>>>>>>> laraxot/dev
                        return;
                    }

                    $user->update([
                        'current_team_id' => null,
                    ]);
                }),
        ];
    }

    /**
     * @return array<string, BulkAction>
     */
    #[\Override]
    public function getTableBulkActions(): array
    {
        return [
            'detach' => DetachBulkAction::make(),
        ];
    }
}
