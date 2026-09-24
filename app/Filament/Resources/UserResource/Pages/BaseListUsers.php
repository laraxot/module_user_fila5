<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\Pages;

use Filament\Actions\Action;
<<<<<<< HEAD
use Filament\Actions\ActionGroup;
=======
>>>>>>> 350420cb (Check & fix styling)
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\BaseFilter;
use Modules\User\Filament\Actions\ChangePasswordAction;
use Modules\User\Filament\Resources\UserResource;
use Modules\Xot\Filament\Actions\Header\ExportXlsAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

abstract class BaseListUsers extends XotBaseListRecords
{
    protected static string $resource = UserResource::class;

    /**
     * Get table columns for user records.
     *
     * @return array<string, Column>
     */
    #[\Override]
    public function getTableColumns(): array
    {
        return [
            'name' => TextColumn::make('name')->searchable(),
            'email' => TextColumn::make('email')->searchable(),
        ];
    }

    /**
     * Get table filters for user records.
     *
<<<<<<< HEAD
     * @return array<BaseFilter>
=======
     * @return array<string, BaseFilter>
>>>>>>> 350420cb (Check & fix styling)
     */
    #[\Override]
    public function getTableFilters(): array
    {
        return [
            // Filtri disabilitati per ora, abilitare se necessario
            /*
             * Filter::make('verified')
             * ->query(static fn (Builder $query): Builder => $query->whereNotNull('email_verified_at')),
             * Filter::make('unverified')
             * ->query(static fn (Builder $query): Builder => $query->whereNull('email_verified_at')),
             */
        ];
    }

    /**
     * Get table actions for user records.
     *
<<<<<<< HEAD
     * @return array<string, Action|ActionGroup>
=======
     * @return array<string, Action|\Filament\Actions\ActionGroup>
>>>>>>> 350420cb (Check & fix styling)
     */
    #[\Override]
    public function getTableActions(): array
    {
<<<<<<< HEAD
        $actions = [
            'change_password' => ChangePasswordAction::make()->tooltip('Cambio Password')->iconButton(),
=======
        $changePassword = ChangePasswordAction::make()
            ->tooltip('Cambio Password')
            ->iconButton();

        /** @var array<string, Action|\Filament\Actions\ActionGroup> $actions */
        $actions = [
            'change_password' => $changePassword,
>>>>>>> 350420cb (Check & fix styling)
        ];

        // Add parent actions - merge arrays
        $parentActions = parent::getTableActions();

<<<<<<< HEAD
        /** @var array<string, Action|ActionGroup> $result */
        $result = array_merge($actions, $parentActions);

        return $result;
=======
        /** @var array<string, Action|\Filament\Actions\ActionGroup> $merged */
        $merged = array_merge($actions, $parentActions);

        return $merged;
>>>>>>> 350420cb (Check & fix styling)

        /*
         * // Add deactivate action
         * $actions['deactivate'] = Action::make('deactivate')
         * ->tooltip(__('filament-actions::delete.single.label'))
         * ->color('danger')
         * ->icon('heroicon-o-trash')
         * ->action(static fn (UserContract $user) => $user->delete());
         */
    }

    /**
     * Get the header actions.
     *
     * @return array<string, Action>
     */
    #[\Override]
    protected function getHeaderActions(): array
    {
        return [
            'export_xls' => ExportXlsAction::make('export_xls'),
        ];
    }

    /**
     * Get header widgets for the user list page.
     *
     * @return array<class-string>
     */
    protected function getHeaderWidgets(): array
    {
        return [
            // UserOverview::class
        ];
    }
}
