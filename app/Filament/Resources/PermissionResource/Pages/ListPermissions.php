<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\PermissionResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Actions\Action;
use Modules\User\Filament\Resources\PermissionResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListPermissions extends XotBaseListRecords
{
    protected static string $resource = PermissionResource::class;

<<<<<<< .merge_file_Ye2XW8
=======
    /**
     * @return array<string, Tables\Columns\Column>
     */
    #[\Override]
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
    #[\Override]
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
    #[\Override]
    public function getTableActions(): array
    {
        return [
            'view' => ViewAction::make(),
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
        Assert::classExists($roleModel = config('permission.models.role'));

        return [
            'delete' => DeleteBulkAction::make(),
            'attach_role' => BulkAction::make('Attach Role')
                ->action(static function (Collection $collection, array $data): void {
                    foreach ($collection as $record) {
                        // Verifichiamo che $record sia un'istanza di Model prima di procedere
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
                        }
                    }
                })
                ->schema([
                    Select::make('role')->options(function () use ($roleModel): array {
                        /** @var Builder<Role> $query */
                        $query = $roleModel::query();

                        return $query->pluck('name', 'id')
                            ->mapWithKeys(static fn (mixed $name, int|string $id): array => is_string($name) || is_int($name) ? [(string) $id => (string) $name] : [])
                            ->all();
                    })->required(),
                ])
                ->deselectRecordsAfterCompletion(),
        ];
    }
>>>>>>> .merge_file_KzqfrC

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
}
