<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\Pages;

<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Tables\Columns\Column;
use Filament\Tables\Filters\BaseFilter;
use Override;
use Filament\Tables;
use Filament\Actions\Action;
use Filament\Tables\Actions\ExportBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Query\Builder;
use Modules\User\Filament\Actions\ChangePasswordAction;
use Modules\User\Filament\Resources\UserResource;
use Modules\User\Filament\Resources\UserResource\Widgets\UserOverview;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Filament\Actions\Header\ExportXlsAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
=======
=======
>>>>>>> f589f9b2 (.)
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\BaseFilter;
use Modules\User\Filament\Actions\ChangePasswordAction;
use Modules\User\Filament\Resources\UserResource;
use Modules\Xot\Filament\Actions\Header\ExportXlsAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)

abstract class BaseListUsers extends XotBaseListRecords
{
    protected static string $resource = UserResource::class;

    /**
     * Get table columns for user records.
     *
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
            'name' => TextColumn::make('name')->searchable(),
            'email' => TextColumn::make('email')->searchable(),
        ];
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Get the header actions.
     *
     * @return array<string, Action>
     */
    #[Override]
    protected function getHeaderActions(): array
    {
        return [
            'export_xls' => ExportXlsAction::make('export_xls'),
        ];
    }

    /**
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
     * Get table filters for user records.
     *
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
<<<<<<< HEAD
     * @return array<string, \Filament\Tables\Actions\Action|\Filament\Tables\Actions\ActionGroup>
     * @phpstan-ignore-next-line
     */
    /** @phpstan-ignore-next-line */
    #[Override]
=======
     * @return array<string, Action|ActionGroup>
     */
    #[\Override]
>>>>>>> 2024e2e7 (.)
=======
     * @return array<string, Action|ActionGroup>
     */
    #[\Override]
>>>>>>> f589f9b2 (.)
    public function getTableActions(): array
    {
        $actions = [
            'change_password' => ChangePasswordAction::make()->tooltip('Cambio Password')->iconButton(),
        ];

        // Add parent actions - merge arrays
        $parentActions = parent::getTableActions();
<<<<<<< HEAD
<<<<<<< HEAD
        $actions = array_merge($actions, $parentActions);
=======
=======
>>>>>>> f589f9b2 (.)

        /** @var array<string, Action|ActionGroup> $result */
        $result = array_merge($actions, $parentActions);

        return $result;
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)

        /*
         * // Add deactivate action
         * $actions['deactivate'] = Action::make('deactivate')
         * ->tooltip(__('filament-actions::delete.single.label'))
         * ->color('danger')
         * ->icon('heroicon-o-trash')
         * ->action(static fn (UserContract $user) => $user->delete());
         */
<<<<<<< HEAD
<<<<<<< HEAD
        /** @phpstan-ignore-next-line */
        return $actions;
=======
=======
>>>>>>> f589f9b2 (.)
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
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    }

    /**
     * Get header widgets for the user list page.
     *
     * @return array<class-string>
     */
    protected function getHeaderWidgets(): array
    {
        return [
<<<<<<< HEAD
<<<<<<< HEAD
            //UserOverview::class
=======
            // UserOverview::class
>>>>>>> 2024e2e7 (.)
=======
            // UserOverview::class
>>>>>>> f589f9b2 (.)
        ];
    }
}
