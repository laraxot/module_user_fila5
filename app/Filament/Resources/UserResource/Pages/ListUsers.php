<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\Pages;

<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Actions\BulkAction;
use Filament\Tables\Filters\BaseFilter;
use Override;
use Filament\Actions\Action;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ExportBulkAction;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Query\Builder;
use Modules\User\Filament\Actions\ChangePasswordAction;
use Modules\User\Filament\Resources\UserResource;
use Modules\User\Filament\Resources\UserResource\Pages\BaseListUsers;
use Modules\User\Filament\Resources\UserResource\Widgets\UserOverview;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
=======
=======
>>>>>>> f589f9b2 (.)
use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ExportBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\BaseFilter;
use Modules\User\Filament\Actions\ChangePasswordAction;
use Modules\User\Filament\Resources\UserResource;
use Modules\User\Filament\Resources\UserResource\Widgets\UserOverview;
use Modules\Xot\Contracts\UserContract;
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)

class ListUsers extends BaseListUsers
{
    protected static string $resource = UserResource::class;

<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
    public function getTableColumns(): array
    {
        return [
            //'id' => TextColumn::make('id'),
            'name' => TextColumn::make('name')->searchable(),
            'email' => TextColumn::make('email')->searchable(),
            //'email_verified_at' => TextColumn::make('email_verified_at')
            //    ->dateTime(),
            //'created_at' => TextColumn::make('created_at')
=======
=======
>>>>>>> f589f9b2 (.)
    #[\Override]
    public function getTableColumns(): array
    {
        return [
            // 'id' => TextColumn::make('id'),
            'name' => TextColumn::make('name')->searchable(),
            'email' => TextColumn::make('email')->searchable(),
            // 'email_verified_at' => TextColumn::make('email_verified_at')
            //    ->dateTime(),
            // 'created_at' => TextColumn::make('created_at')
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
            //    ->dateTime(),
        ];
    }

    /**
     * @return array<BaseFilter>
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
    public function getTableFilters(): array
    {
        return [
            /*
             * Filter::make('verified')
             * ->query(static fn (Builder $query): Builder => $query->whereNotNull('email_verified_at')),
             * Filter::make('unverified')
             * ->query(static fn (Builder $query): Builder => $query->whereNull('email_verified_at')),
             */
        ];
    }

<<<<<<< HEAD
<<<<<<< HEAD
    /**
     * @phpstan-ignore-next-line
     */
    #[Override]
    public function getTableActions(): array
    {
        /** @phpstan-ignore-next-line */
=======
    #[\Override]
    public function getTableActions(): array
    {
>>>>>>> 2024e2e7 (.)
=======
    #[\Override]
    public function getTableActions(): array
    {
>>>>>>> f589f9b2 (.)
        return [
            'change_password' => ChangePasswordAction::make()->tooltip('Cambio Password')->iconButton(),
            ...parent::getTableActions(),
            'deactivate' => Action::make('deactivate')
                ->tooltip(__('filament-actions::delete.single.label'))
                ->color('danger')
                ->icon('heroicon-o-trash')
<<<<<<< HEAD
<<<<<<< HEAD
                ->action(static fn(UserContract $user) => $user->delete()),
        ];
    }

    #[Override]
    protected function getHeaderWidgets(): array
    {
        return [
            UserOverview::class,
=======
                ->action(static fn (UserContract $user) => $user->delete()),
>>>>>>> 2024e2e7 (.)
=======
                ->action(static fn (UserContract $user) => $user->delete()),
>>>>>>> f589f9b2 (.)
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
            'delete' => DeleteBulkAction::make(),
            'export' => ExportBulkAction::make(),
        ];
    }
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> f589f9b2 (.)

    #[\Override]
    protected function getHeaderWidgets(): array
    {
        return [
            UserOverview::class,
        ];
    }
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
}
