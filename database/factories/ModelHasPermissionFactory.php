<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Modules\User\Models\ModelHasPermission;

/**
 * @extends Factory<ModelHasPermission>
=======

/**
 * @extends Factory<\Modules\User\Models\ModelHasPermission>
>>>>>>> 350420cb (Check & fix styling)
 */
class ModelHasPermissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
<<<<<<< HEAD
    protected $model = ModelHasPermission::class;
=======
    protected $model = \Modules\User\Models\ModelHasPermission::class;
>>>>>>> 350420cb (Check & fix styling)

    /**
     * Define the model's default state.
     */
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [];
    }
}
