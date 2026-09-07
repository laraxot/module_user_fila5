<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\User\Models\Team;
use Modules\User\Models\User;
use Modules\Xot\Actions\Cast\SafeStringCastAction;

/**
 * Factory per il modello Team del modulo User.
 *
=======
=======
>>>>>>> f589f9b2 (.)
use Illuminate\Support\Str;
use Modules\User\Models\Team;
use Modules\User\Models\User;

/**
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
 * @extends Factory<Team>
 */
class TeamFactory extends Factory
{
    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Il nome del modello corrispondente alla factory.
=======
     * The name of the factory's corresponding model.
>>>>>>> 2024e2e7 (.)
=======
     * The name of the factory's corresponding model.
>>>>>>> f589f9b2 (.)
     *
     * @var class-string<Team>
     */
    protected $model = Team::class;

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Definisce lo stato di default del modello.
     *
=======
     * @return array<string, mixed>
     */
    /**
>>>>>>> 2024e2e7 (.)
=======
     * @return array<string, mixed>
     */
    /**
>>>>>>> f589f9b2 (.)
     * @return array<string, mixed>
     */
    public function definition(): array
    {
<<<<<<< HEAD
<<<<<<< HEAD
        $teamTypes = [
            'Amministrazione',
            'Sviluppo',
            'Marketing',
            'Vendite',
            'Supporto Clienti',
            'Risorse Umane',
            'Contabilità',
            'Produzione',
            'Qualità',
            'Logistica',
        ];

        return [
            'name' => app(SafeStringCastAction::class)->execute($this->faker->randomElement($teamTypes)) . ' Team',
            'user_id' => User::factory(),
            'personal_team' => false,
        ];
    }

    /**
     * Indica che il team è un team personale.
     *
     * @return static
     */
    public function personal(): static
    {
        return $this->state(fn(array $_attributes) => [
            'personal_team' => true,
            'name' => $this->faker->firstName() . "'s Team",
        ]);
    }

    /**
     * Crea un team con un owner specifico.
     *
     * @param int $userId
     * @return static
     */
    public function ownedBy(int $userId): static
    {
        return $this->state(fn(array $_attributes) => [
            'user_id' => $userId,
        ]);
    }

    /**
     * Crea un team con un nome specifico.
     *
     * @param string $name
     * @return static
     */
    public function withName(string $name): static
    {
        return $this->state(fn(array $_attributes) => [
            'name' => $name . ' Team',
        ]);
    }
=======
=======
>>>>>>> f589f9b2 (.)
        return [
            'name' => fake()->unique()->company(),
            'personal_team' => 0,
            'user_id' => User::factory(),
            'uuid' => (string) Str::uuid(),
        ];
    }
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
}
