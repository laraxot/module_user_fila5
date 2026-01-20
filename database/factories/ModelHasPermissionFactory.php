<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Modules\User\Models\ModelHasPermission;

/**
 * @extends Factory<ModelHasPermission>
 */
=======
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\ModelHasPermission;

>>>>>>> f548be94 (.)
class ModelHasPermissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
=======
     *
     * @var class-string<Model>
>>>>>>> f548be94 (.)
     */
    protected $model = ModelHasPermission::class;

    /**
     * Define the model's default state.
<<<<<<< HEAD
     */
    /**
     * @return array<string, mixed>
=======
     *
     * @psalm-return array<never, never>
>>>>>>> f548be94 (.)
     */
    public function definition(): array
    {
        return [];
    }
}
