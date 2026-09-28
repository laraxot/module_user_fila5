<?php

declare(strict_types=1);

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Modules\User\Models\Role;
use Modules\User\Models\User;
use Modules\Xot\Datas\XotData;

/**
 * Utenti demo deterministici per il front-office del progetto ospite (login + owner).
 *
 * Idempotente: updateOrCreate su email.
 */
class DemoUserSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        if (! app()->environment(['local', 'testing', 'demo'])) {
            if ($this->command !== null) {
                $this->command->warn('DemoUserSeeder: skipped outside local, testing and demo environments.');
            }

            return;
        }

        $userClass = XotData::make()->getUserClass();
        \assert(is_subclass_of($userClass, User::class));

        $demoUsers = [
            [
                'email' => 'admin@fixcity.example.test',
                'name' => 'FixCity Demo Administrator',
                'password' => 'DemoAdmin#2026',
                'type' => 'master_admin',
                'role' => 'super-admin',
            ],
            [
                'email' => 'citizen@fixcity.example.test',
                'name' => 'Cittadino Demo',
                'password' => 'DemoCitizen#2026',
                'type' => 'customer_user',
                'role' => 'user',
            ],
        ];

        foreach ($demoUsers as $demo) {
            $roleName = $demo['role'];
            unset($demo['role']);

            /** @var User $user */
            $user = $userClass::query()->updateOrCreate(
                ['email' => $demo['email']],
                [
                    'name' => $demo['name'],
                    'password' => Hash::make($demo['password']),
                    'email_verified_at' => now(),
                    'is_active' => true,
                    'lang' => 'it',
                    'type' => $demo['type'],
                    'state' => 'active',
                ],
            );

            $role = Role::query()->where('name', $roleName)->where('guard_name', 'web')->first();
            if (null !== $role && ! $user->hasRole($roleName)) {
                $user->assignRole($role);
            }
        }

        if (null !== $this->command) {
            $this->command->info('DemoUserSeeder: '.count($demoUsers).' utenti demo pronti.');
        }
    }
}
