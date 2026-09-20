<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Modules\User\Models\Tenant;

/**
 * @extends Factory<Tenant>
 */
<<<<<<< HEAD
=======
=======
>>>>>>> 87273113 (.)
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\Tenant;

<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Modules\User\Models\Tenant;

/**
 * @extends Factory<Tenant>
 */
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
class TenantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     * @var class-string<Tenant>
=======
     * @var class-string<Model>
>>>>>>> f548be94 (.)
=======
     * @var class-string<Model>
=======
     * @var class-string<Tenant>
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
     * @var class-string<Tenant>
>>>>>>> laraxot/dev
     */
    protected $model = Tenant::class;

    /**
     * Define the model's default state.
     */
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
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
=======
    public function definition(): array
    {
        return [];
>>>>>>> f548be94 (.)
=======
    public function definition(): array
    {
        return [];
=======
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
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
    }
}
