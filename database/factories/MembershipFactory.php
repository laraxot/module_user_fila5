<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\Membership;
use Modules\User\Models\Team;
use Modules\User\Models\User;

/**
<<<<<<< HEAD
 * Membership Factory.
=======
 * Membership Factory
>>>>>>> f548be94 (.)
 *
 * Factory for creating Membership model instances for testing and seeding.
 *
 * @extends Factory<Membership>
 */
class MembershipFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Membership>
     */
    protected $model = Membership::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
<<<<<<< HEAD
    /**
     * @return array<string, mixed>
     */
=======
>>>>>>> f548be94 (.)
    public function definition(): array
    {
        return [
            'team_id' => Team::factory(),
            'user_id' => User::factory(),
<<<<<<< HEAD
            'role' => fake()->randomElement(['admin', 'editor', 'member', 'viewer']),
            'customer_id' => fake()->optional(0.3)->uuid(),
=======
            'role' => $this->faker->randomElement(['admin', 'editor', 'member', 'viewer']),
            'customer_id' => $this->faker->optional(0.3)->uuid(),
>>>>>>> f548be94 (.)
        ];
    }

    /**
     * Create membership for a specific team.
<<<<<<< HEAD
     */
    public function forTeam(Team $team): static
    {
        return $this->state(fn (array $_attributes): array => [
=======
     *
     * @param Team $team
     * @return static
     */
    public function forTeam(Team $team): static
    {
        return $this->state(fn(array $_attributes): array => [
>>>>>>> f548be94 (.)
            'team_id' => $team->id,
        ]);
    }

    /**
     * Create membership for a specific user.
<<<<<<< HEAD
     */
    public function forUser(User $user): static
    {
        return $this->state(fn (array $_attributes): array => [
=======
     *
     * @param User $user
     * @return static
     */
    public function forUser(User $user): static
    {
        return $this->state(fn(array $_attributes): array => [
>>>>>>> f548be94 (.)
            'user_id' => $user->id,
        ]);
    }

    /**
     * Set the role to admin.
<<<<<<< HEAD
     */
    public function admin(): static
    {
        return $this->state(fn (array $_attributes): array => [
=======
     *
     * @return static
     */
    public function admin(): static
    {
        return $this->state(fn(array $_attributes): array => [
>>>>>>> f548be94 (.)
            'role' => 'admin',
        ]);
    }

    /**
     * Set the role to editor.
<<<<<<< HEAD
     */
    public function editor(): static
    {
        return $this->state(fn (array $_attributes): array => [
=======
     *
     * @return static
     */
    public function editor(): static
    {
        return $this->state(fn(array $_attributes): array => [
>>>>>>> f548be94 (.)
            'role' => 'editor',
        ]);
    }

    /**
     * Set the role to member.
<<<<<<< HEAD
     */
    public function member(): static
    {
        return $this->state(fn (array $_attributes): array => [
=======
     *
     * @return static
     */
    public function member(): static
    {
        return $this->state(fn(array $_attributes): array => [
>>>>>>> f548be94 (.)
            'role' => 'member',
        ]);
    }

    /**
     * Set the role to viewer.
<<<<<<< HEAD
     */
    public function viewer(): static
    {
        return $this->state(fn (array $_attributes): array => [
=======
     *
     * @return static
     */
    public function viewer(): static
    {
        return $this->state(fn(array $_attributes): array => [
>>>>>>> f548be94 (.)
            'role' => 'viewer',
        ]);
    }
}
