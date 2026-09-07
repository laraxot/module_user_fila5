<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\OauthClient;
use Modules\User\Models\OauthPersonalAccessClient;

/**
<<<<<<< HEAD
<<<<<<< HEAD
 * OauthPersonalAccessClient Factory
=======
 * OauthPersonalAccessClient Factory.
>>>>>>> 2024e2e7 (.)
=======
 * OauthPersonalAccessClient Factory.
>>>>>>> f589f9b2 (.)
 *
 * @extends Factory<OauthPersonalAccessClient>
 */
class OauthPersonalAccessClientFactory extends Factory
{
    protected $model = OauthPersonalAccessClient::class;

<<<<<<< HEAD
<<<<<<< HEAD
    public function definition(): array
    {
        return [
            'client_id' => OauthClient::factory()->personalAccess(),
=======
=======
>>>>>>> f589f9b2 (.)
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'client_id' => OauthClient::factory()->asPersonalAccessTokenClient()->create()->id,
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
        ];
    }
}
