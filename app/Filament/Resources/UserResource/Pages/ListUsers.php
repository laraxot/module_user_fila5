<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\Pages;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ExportBulkAction;
<<<<<<< HEAD
use Filament\Tables\Columns\TextColumn;
=======
>>>>>>> laraxot/dev
use Filament\Tables\Filters\BaseFilter;
use Modules\User\Filament\Actions\ChangePasswordAction;
use Modules\User\Filament\Resources\UserResource;
use Modules\User\Filament\Resources\UserResource\Widgets\UserOverview;
use Modules\Xot\Contracts\UserContract;
<<<<<<< HEAD
=======
=======
>>>>>>> 87273113 (.)
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
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
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
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev

class ListUsers extends BaseListUsers
{
    protected static string $resource = UserResource::class;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
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
=======
=======
>>>>>>> 87273113 (.)
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
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
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
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
            //    ->dateTime(),
        ];
    }

    /**
     * @return array<BaseFilter>
     */
<<<<<<< HEAD
<<<<<<< HEAD
    #[\Override]
=======
    #[Override]
>>>>>>> f548be94 (.)
=======
    #[Override]
=======
    #[\Override]
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
    /**
     * @return array<BaseFilter>
     */
    #[\Override]
>>>>>>> laraxot/dev
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
<<<<<<< HEAD
    #[\Override]
    public function getTableActions(): array
    {
=======
=======
>>>>>>> 87273113 (.)
    /**
     * @phpstan-ignore-next-line
     */
    #[Override]
    public function getTableActions(): array
    {
        /** @phpstan-ignore-next-line */
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
    #[\Override]
    public function getTableActions(): array
    {
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
    #[\Override]
    public function getTableActions(): array
    {
>>>>>>> laraxot/dev
        return [
            'change_password' => ChangePasswordAction::make()->tooltip('Cambio Password')->iconButton(),
            ...parent::getTableActions(),
            'deactivate' => Action::make('deactivate')
                ->tooltip(__('filament-actions::delete.single.label'))
                ->color('danger')
                ->icon('heroicon-o-trash')
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                ->action(static fn (UserContract $user) => $user->delete()),
=======
=======
>>>>>>> 87273113 (.)
                ->action(static fn(UserContract $user) => $user->delete()),
        ];
    }

    #[Override]
    protected function getHeaderWidgets(): array
    {
        return [
            UserOverview::class,
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
                ->action(static fn (UserContract $user) => $user->delete()),
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
                ->action(static fn (UserContract $user) => $user->delete()),
>>>>>>> laraxot/dev
        ];
    }

    /**
     * @return array<string, BulkAction>
     */
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    #[\Override]
=======
    #[Override]
>>>>>>> f548be94 (.)
=======
    #[Override]
=======
    #[\Override]
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
    #[\Override]
>>>>>>> laraxot/dev
    public function getTableBulkActions(): array
    {
        return [
            'delete' => DeleteBulkAction::make(),
            'export' => ExportBulkAction::make(),
        ];
    }
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev

    #[\Override]
    protected function getHeaderWidgets(): array
    {
        return [
            UserOverview::class,
        ];
    }
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> f548be94 (.)
=======
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
}
