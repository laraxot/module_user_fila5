<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Illuminate\Support\Str;
use Modules\User\Models\Team;
use Modules\User\Models\User;

/**
=======
use Modules\User\Models\Team;
use Modules\User\Models\User;
use Modules\Xot\Actions\Cast\SafeStringCastAction;

/**
 * Factory per il modello Team del modulo User.
 *
>>>>>>> f548be94 (.)
 * @extends Factory<Team>
 */
class TeamFactory extends Factory
{
    /**
<<<<<<< HEAD
     * The name of the factory's corresponding model.
=======
     * Il nome del modello corrispondente alla factory.
>>>>>>> f548be94 (.)
     *
     * @var class-string<Team>
     */
    protected $model = Team::class;

    /**
<<<<<<< HEAD
     * @return array<string, mixed>
     */
    /**
=======
     * Definisce lo stato di default del modello.
     *
>>>>>>> f548be94 (.)
     * @return array<string, mixed>
     */
    public function definition(): array
    {
<<<<<<< HEAD
        return [
            'name' => fake()->unique()->company(),
            'personal_team' => 0,
            'user_id' => User::factory(),
            'uuid' => (string) Str::uuid(),
        ];
    }
=======
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
>>>>>>> f548be94 (.)
}
