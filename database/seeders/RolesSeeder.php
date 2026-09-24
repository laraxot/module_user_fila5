<?php

declare(strict_types=1);

namespace Modules\User\Database\Seeders;

use Illuminate\Console\Command;
use Illuminate\Database\Seeder;
use Modules\User\Models\Role;

<<<<<<< HEAD
final class RolesSeeder extends Seeder
=======
class RolesSeeder extends Seeder
>>>>>>> 350420cb (Check & fix styling)
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
=======
        $roles = [];

        // Display results in a table format
        $this->displayResults($roles);
>>>>>>> 350420cb (Check & fix styling)
    }

    /**
     * Display the seeding results in a table format.
     *
     * @param  array<int, Role>  $roles
     */
    private function displayResults(array $roles): void
    {
        $command = $this->getConsoleCommand();
        $command->info('Roles seeded successfully:');
        $command->table(
            self::$OUTPUT_TABLE_HEADERS,
            collect($roles)
<<<<<<< HEAD
                ->map(static fn (Role $role, int $index) => [
=======
                ->map(fn (Role $role, int $index) => [
>>>>>>> 350420cb (Check & fix styling)
                    $index + 1,
                    $role->name,
                    $role->guard_name,
                ])
                ->toArray(),
        );
    }

    private function getConsoleCommand(): Command
    {
        return $this->command;
    }
}
