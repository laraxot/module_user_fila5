<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\ModelHasPermission;

=======
use Modules\User\Models\ModelHasPermission;

/**
 * @extends Factory<ModelHasPermission>
 */
>>>>>>> 2024e2e7 (.)
class ModelHasPermissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
     *
     * @var class-string<Model>
=======
>>>>>>> 2024e2e7 (.)
     */
    protected $model = ModelHasPermission::class;

    /**
     * Define the model's default state.
<<<<<<< HEAD
     *
     * @psalm-return array<never, never>
=======
     */
    /**
     * @return array<string, mixed>
>>>>>>> 2024e2e7 (.)
     */
    public function definition(): array
    {
        return [];
    }
}
