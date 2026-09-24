<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

<<<<<<< HEAD
use Modules\User\Models\Extra;
use Modules\Xot\Database\Factories\BaseExtraFactory;

/**
 * La forma del dato sta in {@see BaseExtraFactory}, nel modulo che possiede il
 * concetto. Qui si dichiara **solo** il modello: e' quello che porta con se' la
 * connection di questo modulo.
 *
 * @extends BaseExtraFactory<Extra>
 */
class ExtraFactory extends BaseExtraFactory
{
    /** @var class-string<Extra> */
    protected $model = Extra::class;
=======
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\Modules\User\Models\Extra>
 */
class ExtraFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\User\Models\Extra::class;

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
>>>>>>> 350420cb (Check & fix styling)
}
