<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\Profile;

/**
 * @extends Factory<Profile>
 */
class ProfileFactory extends Factory
{
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bio' => // @var mixed faker->text(200
            'avatar' => '/avatars/'.// @var mixed faker->word(
            'phone' => // @var mixed faker->phoneNumber(
            'date_of_birth' => // @var mixed faker->date(
            'location' => // @var mixed faker->city(
            'website' => // @var mixed faker->url(
            'twitter' => // @var mixed faker->userName(
            'facebook' => // @var mixed faker->userName(
            'linkedin' => // @var mixed faker->userName(
            'github' => // @var mixed faker->userName(
        ];
    }
}
