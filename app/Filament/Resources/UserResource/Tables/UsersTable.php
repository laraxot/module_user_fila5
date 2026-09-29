<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\Tables;

use Filament\Actions\Action;
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
     * @return array<int|string, \Filament\Actions\Action|\Filament\Actions\ActionGroup>
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
        ];
    }

    /**
     * @return array<string, BulkAction>
     */
    public function getTableBulkActions(): array
    {
        return [
            'delete' => DeleteBulkAction::make(),
            'export' => ExportBulkAction::make(),
        ];
    }
}
