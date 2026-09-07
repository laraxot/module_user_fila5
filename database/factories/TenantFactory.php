<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\Tenant;

=======
=======
>>>>>>> f589f9b2 (.)
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Modules\User\Models\Tenant;

/**
 * @extends Factory<Tenant>
 */
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
class TenantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @var class-string<Model>
=======
     * @var class-string<Tenant>
>>>>>>> 2024e2e7 (.)
=======
     * @var class-string<Tenant>
>>>>>>> f589f9b2 (.)
     */
    protected $model = Tenant::class;

    /**
     * Define the model's default state.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function definition(): array
    {
        return [];
=======
=======
>>>>>>> f589f9b2 (.)
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->company();

        return [
            'id' => (string) Str::ulid(),
            'name' => $name,
            'slug' => Str::slug($name).'-'.Str::random(6),
        ];
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    }
}
