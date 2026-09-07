<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\PermissionResource\Pages;

<<<<<<< HEAD
use Filament\Tables\Filters\BaseFilter;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Override;
use Filament\Tables\Filters\SelectFilter;
use Filament\Actions\ViewAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\BulkAction;
use Illuminate\Database\Eloquent\Model;
use Filament\Actions\CreateAction;
=======
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkAction;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
>>>>>>> 2024e2e7 (.)
use Filament\Forms\Components\Select;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Collection;
use Modules\User\Filament\Resources\PermissionResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
=======
use Filament\Tables\Filters\BaseFilter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\User\Filament\Resources\PermissionResource;
use Modules\User\Models\Permission;
use Modules\User\Models\Role;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
>>>>>>> 2024e2e7 (.)
use Webmozart\Assert\Assert;

class ListPermissions extends XotBaseListRecords
{
    protected static string $resource = PermissionResource::class;

    /**
     * @return array<string, Tables\Columns\Column>
     */
<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> 2024e2e7 (.)
    public function getTableColumns(): array
    {
        return [
            'name' => TextColumn::make('name')->searchable()->sortable(),
            'guard_name' => TextColumn::make('guard_name')->searchable()->sortable(),
            'active' => IconColumn::make('active')->boolean(),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
        ];
    }

    /**
     * @return array<string, BaseFilter>
     */
<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> 2024e2e7 (.)
    public function getTableFilters(): array
    {
        return [
            'guard_name' => SelectFilter::make('guard_name')
                ->options([
                    'web' => 'Web',
                    'api' => 'API',
                    'sanctum' => 'Sanctum',
                ])
                ->multiple(),
        ];
    }

    /**
     * @return array<string, Action|ActionGroup>
     */
<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> 2024e2e7 (.)
    public function getTableActions(): array
    {
        return [
            'view' => ViewAction::make(),
            'edit' => EditAction::make(),
            'delete' => DeleteAction::make(),
        ];
    }

    /**
<<<<<<< HEAD
     * @return array<string, Action>
     */
    #[Override]
    protected function getHeaderActions(): array
    {
        return [
            'create' => CreateAction::make(),
        ];
    }

    /**
     * @return array<string, BulkAction>
     */
    #[Override]
=======
     * @return array<string, BulkAction>
     */
    #[\Override]
>>>>>>> 2024e2e7 (.)
    public function getTableBulkActions(): array
    {
        Assert::classExists($roleModel = config('permission.models.role'));

        return [
            'delete' => DeleteBulkAction::make(),
            'attach_role' => BulkAction::make('Attach Role')
                ->action(static function (Collection $collection, array $data): void {
                    foreach ($collection as $record) {
                        // Verifichiamo che $record sia un'istanza di Model prima di procedere
<<<<<<< HEAD
                        Assert::isInstanceOf(
                            $record,
                            Model::class,
                            '[' . __LINE__ . '][' . __CLASS__ . ']',
                        );

                        // Poi verifichiamo che il modello abbia il metodo roles() prima di chiamarlo
                        if (method_exists($record, 'roles')) {
                            $record->roles()->sync($data['role']);
                            $record->save();
=======
                        // This check is redundant as $record is already an instance of Model
                        // Assert::isInstanceOf($record, Model::class, '['.__LINE__.']['.__CLASS__.']');

                        // Poi verifichiamo che il modello abbia il metodo roles() prima di chiamarlo
                        if (method_exists($record, 'roles')) {
                            /** @var BelongsToMany<Role, Permission> $rolesRelation */
                            $rolesRelation = $record->roles();
                            $roleData = $data['role'];
                            if (is_array($roleData) || is_int($roleData) || is_string($roleData)) {
                                $syncData = is_array($roleData) ? $roleData : [$roleData];
                                $rolesRelation->sync($syncData);
                                $record->save();
                            }
>>>>>>> 2024e2e7 (.)
                        }
                    }
                })
                ->schema([
<<<<<<< HEAD
                    Select::make('role')->options($roleModel::query()->pluck('name', 'id'))->required(),
=======
                    Select::make('role')->options(function () use ($roleModel): array {
                        /** @var Builder<Role> $query */
                        $query = $roleModel::query();

                        return $query->pluck('name', 'id')
                            ->mapWithKeys(static fn (mixed $name, mixed $id): array => is_string($name) || is_int($name) ? [(string) $id => (string) $name] : [])
                            ->all();
                    })->required(),
>>>>>>> 2024e2e7 (.)
                ])
                ->deselectRecordsAfterCompletion(),
        ];
    }
<<<<<<< HEAD
=======

    /**
     * @return array<string, Action>
     */
    #[\Override]
    protected function getHeaderActions(): array
    {
        return [
            'create' => CreateAction::make(),
        ];
    }
>>>>>>> 2024e2e7 (.)
}
