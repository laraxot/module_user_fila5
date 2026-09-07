<?php

declare(strict_types=1);

namespace Modules\User\Database\Seeders;

<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Modules\User\Enums\UserTypeEnum;
use Modules\User\Models\Role;

class RolesSeeder extends Seeder
=======
=======
>>>>>>> f589f9b2 (.)
use Illuminate\Console\Command;
use Illuminate\Database\Seeder;
use Modules\User\Models\Role;

final class RolesSeeder extends Seeder
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
{
    /**
     * Table headers for output display.
     *
     * @var array<int, string>
     */
    private static array $OUTPUT_TABLE_HEADERS = [
        '#',
        'Name',
        'Guard',
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
<<<<<<< HEAD
<<<<<<< HEAD
        $roles = [];

        // Display results in a table format
        $this->displayResults($roles);
=======
=======
>>>>>>> f589f9b2 (.)
        $roles = [
            ['name' => 'super-admin', 'guard_name' => 'web'],
            ['name' => 'admin', 'guard_name' => 'web'],
            ['name' => 'moderator', 'guard_name' => 'web'],
            ['name' => 'editor', 'guard_name' => 'web'],
            ['name' => 'user', 'guard_name' => 'web'],
            ['name' => 'guest', 'guard_name' => 'web'],
        ];

        $createdRoles = [];
        foreach ($roles as $roleData) {
            $createdRoles[] = Role::firstOrCreate($roleData);
        }

        // Display results in a table format
        $this->displayResults($createdRoles);
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    }

    /**
     * Display the seeding results in a table format.
     *
     * @param array<int, Role> $roles
     */
    private function displayResults(array $roles): void
    {
<<<<<<< HEAD
<<<<<<< HEAD
        $this->command->info('Roles seeded successfully:');
        $this->command->table(
            self::$OUTPUT_TABLE_HEADERS,
            collect($roles)
                ->map(fn(Role $role, int $index) => [
=======
=======
>>>>>>> f589f9b2 (.)
        $command = $this->getConsoleCommand();
        $command->info('Roles seeded successfully:');
        $command->table(
            self::$OUTPUT_TABLE_HEADERS,
            collect($roles)
                ->map(static fn (Role $role, int $index) => [
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
                    $index + 1,
                    $role->name,
                    $role->guard_name,
                ])
                ->toArray(),
        );
    }
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> f589f9b2 (.)

    private function getConsoleCommand(): Command
    {
        return $this->command;
    }
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
}
