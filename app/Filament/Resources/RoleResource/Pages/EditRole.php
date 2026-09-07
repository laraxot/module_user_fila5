<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\RoleResource\Pages;

<<<<<<< HEAD
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
=======
>>>>>>> f589f9b2 (.)
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Modules\User\Actions\Shield\GetPermissionModelAction;
use Modules\User\Filament\Resources\RoleResource;
use Modules\User\Models\Role;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
use Webmozart\Assert\Assert;

class EditRole extends XotBaseEditRecord
{
<<<<<<< HEAD
<<<<<<< HEAD
    // //
=======
    /** @var Collection<int, string> */
>>>>>>> 2024e2e7 (.)
=======
    /** @var Collection<int, string> */
>>>>>>> f589f9b2 (.)
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
<<<<<<< HEAD
            $permissionModels->push(Utils::getPermissionModel()::firstOrCreate([
=======
            $permissionModels->push(app(GetPermissionModelAction::class)->execute()::firstOrCreate([
>>>>>>> 2024e2e7 (.)
=======
            $permissionModels->push(app(GetPermissionModelAction::class)->execute()::firstOrCreate([
>>>>>>> f589f9b2 (.)
                'name' => $permission,
                'guard_name' => $data['guard_name'] ?? 'web',
            ]));
        });
<<<<<<< HEAD
<<<<<<< HEAD
        Assert::isInstanceOf($this->record, Role::class, '[' . __LINE__ . '][' . class_basename($this) . ']');
=======
        Assert::isInstanceOf($this->record, Role::class, '['.__LINE__.']['.class_basename($this).']');
>>>>>>> 2024e2e7 (.)
=======
        Assert::isInstanceOf($this->record, Role::class, '['.__LINE__.']['.class_basename($this).']');
>>>>>>> f589f9b2 (.)
        $this->record->syncPermissions($permissionModels);
    }

    protected function getHeaderActions(): array
    {
        return [
<<<<<<< HEAD
<<<<<<< HEAD
            ViewAction::make(),
            DeleteAction::make(),
=======
            'view' => ViewAction::make(),
            'delete' => DeleteAction::make(),
>>>>>>> 2024e2e7 (.)
=======
            'view' => ViewAction::make(),
            'delete' => DeleteAction::make(),
>>>>>>> f589f9b2 (.)
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $this->permissions = collect($data)
            ->filter(
<<<<<<< HEAD
<<<<<<< HEAD
                static fn($_permission, $key): bool => (
                    !\in_array($key, ['name', 'guard_name', 'select_all'], false) && Str::contains($key, '_')
                ),
            )
            ->keys();

        return Arr::only($data, ['name', 'guard_name']);
=======
=======
>>>>>>> f589f9b2 (.)
                static fn ($_permission, $key): bool => ! \in_array($key, ['name', 'guard_name', 'select_all'], false) && Str::contains($key, '_'),
            )
            ->keys();

        /** @var array<string, mixed> $result */
        $result = Arr::only($data, ['name', 'guard_name']);

        return $result;
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    }
}
