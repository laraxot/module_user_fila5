<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\RoleResource\Pages;

<<<<<<< HEAD
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Modules\User\Filament\Resources\RoleResource;
use Modules\User\Models\Role;
use Modules\User\Support\Utils;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
=======
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Modules\User\Actions\Shield\GetPermissionModelAction;
use Modules\User\Filament\Resources\RoleResource;
use Modules\User\Models\Role;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
>>>>>>> 2024e2e7 (.)
use Webmozart\Assert\Assert;

class EditRole extends XotBaseEditRecord
{
<<<<<<< HEAD
    // //
=======
    /** @var Collection<int, string> */
>>>>>>> 2024e2e7 (.)
    public Collection $permissions;

    // public Role $record;
    protected static string $resource = RoleResource::class;

    /**
     *  ---.
     */
    public function afterSave(): void
    {
        $permissionModels = collect();
        Assert::isArray($data = $this->data);
        $this->permissions->each(static function ($permission) use ($permissionModels, $data): void {
<<<<<<< HEAD
            $permissionModels->push(Utils::getPermissionModel()::firstOrCreate([
=======
            $permissionModels->push(app(GetPermissionModelAction::class)->execute()::firstOrCreate([
>>>>>>> 2024e2e7 (.)
                'name' => $permission,
                'guard_name' => $data['guard_name'] ?? 'web',
            ]));
        });
<<<<<<< HEAD
        Assert::isInstanceOf($this->record, Role::class, '[' . __LINE__ . '][' . class_basename($this) . ']');
=======
        Assert::isInstanceOf($this->record, Role::class, '['.__LINE__.']['.class_basename($this).']');
>>>>>>> 2024e2e7 (.)
        $this->record->syncPermissions($permissionModels);
    }

    protected function getHeaderActions(): array
    {
        return [
<<<<<<< HEAD
            ViewAction::make(),
            DeleteAction::make(),
=======
            'view' => ViewAction::make(),
            'delete' => DeleteAction::make(),
>>>>>>> 2024e2e7 (.)
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $this->permissions = collect($data)
            ->filter(
<<<<<<< HEAD
                static fn($_permission, $key): bool => (
                    !\in_array($key, ['name', 'guard_name', 'select_all'], false) && Str::contains($key, '_')
                ),
            )
            ->keys();

        return Arr::only($data, ['name', 'guard_name']);
=======
                static fn ($_permission, $key): bool => ! \in_array($key, ['name', 'guard_name', 'select_all'], false) && Str::contains($key, '_'),
            )
            ->keys();

        /** @var array<string, mixed> $result */
        $result = Arr::only($data, ['name', 'guard_name']);

        return $result;
>>>>>>> 2024e2e7 (.)
    }
}
