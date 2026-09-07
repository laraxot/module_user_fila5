<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\Permission;
use Modules\User\Models\Role;
use Modules\User\Models\RoleHasPermission;

/**
<<<<<<< HEAD
 * RoleHasPermission Factory
=======
 * RoleHasPermission Factory.
>>>>>>> 2024e2e7 (.)
 *
 * @extends Factory<RoleHasPermission>
 */
class RoleHasPermissionFactory extends Factory
{
    protected $model = RoleHasPermission::class;

<<<<<<< HEAD
    public function definition(): array
    {
        return [
            'permission_id' => fn() => Permission::create([
                'name' => fake()->unique()->slug(),
                'guard_name' => 'web',
            ])->id,
            'role_id' => fn() => Role::create([
=======
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'permission_id' => fn () => Permission::create([
                'name' => fake()->unique()->slug(),
                'guard_name' => 'web',
            ])->id,
            'role_id' => fn () => Role::create([
>>>>>>> 2024e2e7 (.)
                'name' => fake()->unique()->slug(),
                'guard_name' => 'web',
            ])->id,
        ];
    }

    public function forPermission(Permission $permission): static
    {
        return $this->state(['permission_id' => $permission->id]);
    }

    public function forRole(Role $role): static
    {
        return $this->state(['role_id' => $role->id]);
    }
}
