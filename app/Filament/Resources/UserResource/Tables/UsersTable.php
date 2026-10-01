<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\Tables;

use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
<<<<<<< HEAD
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Modules\User\Filament\Resources\UserResource\Actions\VerifyEmailAction;
use Modules\User\Models\User;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class UsersTable extends XotBaseResourceTable
{
    /**
     * @var class-string<User>
     */
    protected static string $model = User::class;

    /**
     * @return array<int|string, Action|ActionGroup>
     */
    #[\Override]
    public function getTableActions(): array
    {
        return [
            'verify_email' => VerifyEmailAction::make()->iconButton(),
            ...parent::getTableActions(),
=======
use Filament\Actions\BulkAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ExportBulkAction;
use Modules\User\Filament\Actions\ChangePasswordAction;
use Modules\User\Filament\Resources\UserResource;
use Modules\Xot\Contracts\UserContract;

class UsersTable extends BaseUsersTable
{
    protected static ?string $resource = UserResource::class;

    /**
     * Azioni condivise: la verifica email viene dalla base, quelle di gestione
     * password/disattivazione appartengono alla tabella utenti concreta.
     *
     * @return array<int|string, Action|ActionGroup>
     */
    public function getTableActions(): array
    {
        return [
            'change_password' => ChangePasswordAction::make()
                ->tooltip(__('user::password.actions.change_password'))
                ->iconButton(),
            ...parent::getTableActions(),
            'deactivate' => Action::make('deactivate')
                ->tooltip(__('filament-actions::delete.single.label'))
                ->color('danger')
                ->icon('heroicon-o-trash')
                ->action(static fn (UserContract $user): mixed => $user->delete()),
>>>>>>> laraxot/dev
        ];
    }

    /**
<<<<<<< HEAD
     * @return array<string, Column>
     */
    public function getTableColumns(): array
    {
        return [
            'name' => TextColumn::make('name')->searchable()->sortable(),
            'email' => TextColumn::make('email')->searchable()->sortable()->copyable(),
            'first_name' => TextColumn::make('first_name')->searchable()->sortable(),
            'last_name' => TextColumn::make('last_name')->searchable()->sortable(),
            'is_active' => IconColumn::make('is_active')->boolean()->sortable(),
            'email_verified_at' => TextColumn::make('email_verified_at')->dateTime()->sortable()->placeholder('—'),
            'is_otp' => IconColumn::make('is_otp')->boolean()->sortable()->toggleable(isToggledHiddenByDefault: true),
            'lang' => TextColumn::make('lang')->toggleable(isToggledHiddenByDefault: true),
            'current_team_id' => TextColumn::make('current_team_id')->toggleable(isToggledHiddenByDefault: true),
            'type' => TextColumn::make('type')->toggleable(isToggledHiddenByDefault: true),
            'id' => TextColumn::make('id')->sortable()->copyable()->toggleable(isToggledHiddenByDefault: true),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable()->placeholder('—'),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->placeholder('—')->toggleable(isToggledHiddenByDefault: true),
=======
     * @return array<string, BulkAction>
     */
    public function getTableBulkActions(): array
    {
        return [
            'delete' => DeleteBulkAction::make(),
            'export' => ExportBulkAction::make(),
>>>>>>> laraxot/dev
        ];
    }
}
