<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\Permission;
use Modules\User\Models\PermissionRole;
use Modules\User\Models\Role;

/**
<<<<<<< HEAD
<<<<<<< HEAD
 * PermissionRole Factory
=======
 * PermissionRole Factory.
>>>>>>> 2024e2e7 (.)
=======
 * PermissionRole Factory.
>>>>>>> f589f9b2 (.)
 *
 * Factory for creating PermissionRole model instances for testing and seeding.
 *
 * @extends Factory<PermissionRole>
 */
class PermissionRoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<PermissionRole>
     */
    protected $model = PermissionRole::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
<<<<<<< HEAD
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
=======
>>>>>>> f589f9b2 (.)
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
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
                'name' => fake()->unique()->slug(),
                'guard_name' => 'web',
            ])->id,
        ];
    }

    /**
     * Create permission-role relationship for a specific permission.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @param Permission $permission
     * @return static
     */
    public function forPermission(Permission $permission): static
    {
        return $this->state(fn(array $_attributes): array => [
=======
=======
>>>>>>> f589f9b2 (.)
     */
    public function forPermission(Permission $permission): static
    {
        return $this->state(fn (array $_attributes): array => [
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
            'permission_id' => $permission->id,
        ]);
    }

    /**
     * Create permission-role relationship for a specific role.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @param Role $role
     * @return static
     */
    public function forRole(Role $role): static
    {
        return $this->state(fn(array $_attributes): array => [
=======
=======
>>>>>>> f589f9b2 (.)
     */
    public function forRole(Role $role): static
    {
        return $this->state(fn (array $_attributes): array => [
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
            'role_id' => $role->id,
        ]);
    }
}
