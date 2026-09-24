<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Modules\User\Models\Notification;

/**
 * @extends Factory<Notification>
=======

/**
 * @extends Factory<\Modules\User\Models\Notification>
>>>>>>> 350420cb (Check & fix styling)
 */
class NotificationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
<<<<<<< HEAD
    protected $model = Notification::class;
=======
    protected $model = \Modules\User\Models\Notification::class;
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
