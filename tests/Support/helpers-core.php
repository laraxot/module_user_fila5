<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Schema;
use Modules\User\Database\Factories\TeamFactory;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\Team;
use Modules\User\Models\User;
use PHPUnit\Framework\Assert;

/**
<<<<<<< .merge_file_fywQxW
 * @param  array<string, mixed>  $attributes
=======
 * @param array<string, mixed> $attributes
>>>>>>> .merge_file_pMXJCN
 */
function createUser(array $attributes = []): User
{
    $factory = User::factory();
    \assert($factory instanceof Factory);

    $user = $factory->create($attributes);
    \assert($user instanceof User);

    return $user;
}

/**
<<<<<<< .merge_file_fywQxW
 * @param  array<string, mixed>  $attributes
=======
 * @param array<string, mixed> $attributes
>>>>>>> .merge_file_pMXJCN
 */
function makeUser(array $attributes = []): User
{
    $factory = User::factory();
    \assert($factory instanceof Factory);

    $user = $factory->make($attributes);
    \assert($user instanceof User);

    return $user;
}

/**
<<<<<<< .merge_file_fywQxW
 * @param  array<string, mixed>  $attributes
=======
 * @param array<string, mixed> $attributes
>>>>>>> .merge_file_pMXJCN
 */
function createTeam(array $attributes = []): Team
{
    return TeamFactory::new()->createOne(array_merge([
        'name' => 'team-'.uniqid(),
    ], $attributes));
}

/**
<<<<<<< .merge_file_fywQxW
 * @param  array<string, mixed>  $attributes
=======
 * @param array<string, mixed> $attributes
>>>>>>> .merge_file_pMXJCN
 */
function createTestUser(array $attributes = []): User
{
    return UserFactory::new()->createOne(array_merge([
        'email' => 'test-'.uniqid('', true).'@example.com',
    ], $attributes));
}

function plainTestPassword(): string
{
    static $password = null;

    if (! is_string($password)) {
        $password = fake()->password(12).'Aa1!';
    }

    return $password;
}

/**
 * @return array{user: User, team: Team, personalTeam: Team}
 */
function bootstrapHasTeamsFixture(): array
{
    $user = createTestUser();
    $team = TeamFactory::new()->createOne(['name' => 'shared-'.uniqid()]);
    $personalTeam = TeamFactory::new()->createOne([
        'user_id' => $user->id,
        'name' => 'personal-'.uniqid(),
        'personal_team' => true,
    ]);

    return [
        'user' => $user,
        'team' => $team,
        'personalTeam' => $personalTeam,
    ];
}

function userTableHasColumn(string $table, string $column): bool
{
    return Schema::connection('user')->hasColumn($table, $column);
}

function pestSkip(string $message): never
{
    Assert::markTestSkipped($message);
}

function skipUnlessUserColumn(string $table, string $column, string $reason = ''): void
{
    if (! userTableHasColumn($table, $column)) {
<<<<<<< .merge_file_fywQxW
        pestSkip($reason !== '' ? $reason : "Column {$table}.{$column} missing on user connection.");
=======
        pestSkip('' !== $reason ? $reason : "Column {$table}.{$column} missing on user connection.");
>>>>>>> .merge_file_pMXJCN
    }
}

function userTableExists(string $table): bool
{
    return Schema::connection('user')->hasTable($table);
}

function skipUnlessUserTable(string $table, string $reason = ''): void
{
    if (! userTableExists($table)) {
<<<<<<< .merge_file_fywQxW
        pestSkip($reason !== '' ? $reason : "Table {$table} missing on user connection.");
=======
        pestSkip('' !== $reason ? $reason : "Table {$table} missing on user connection.");
>>>>>>> .merge_file_pMXJCN
    }
}

function permissionRolePivotTable(): string
{
    return (string) config('permission.table_names.model_has_roles', 'model_has_role');
}

function permissionPivotTable(): string
{
    return (string) config('permission.table_names.model_has_permissions', 'model_has_permission');
}

function skipUnlessUsersTableReady(string $reason = ''): void
{
<<<<<<< .merge_file_fywQxW
    skipUnlessUserTable('users', $reason !== '' ? $reason : 'users table missing on user connection.');
=======
    skipUnlessUserTable('users', '' !== $reason ? $reason : 'users table missing on user connection.');
>>>>>>> .merge_file_pMXJCN
}

function skipUnlessRoleAssignmentSupported(string $reason = ''): void
{
    $table = permissionRolePivotTable();
<<<<<<< .merge_file_fywQxW
    skipUnlessUserTable($table, $reason !== '' ? $reason : "Role pivot table {$table} missing on user connection.");
=======
    skipUnlessUserTable($table, '' !== $reason ? $reason : "Role pivot table {$table} missing on user connection.");
>>>>>>> .merge_file_pMXJCN
}

function skipUnlessDirectPermissionSupported(string $reason = ''): void
{
    $table = permissionPivotTable();
<<<<<<< .merge_file_fywQxW
    skipUnlessUserTable($table, $reason !== '' ? $reason : "Permission pivot table {$table} missing on user connection.");
=======
    skipUnlessUserTable($table, '' !== $reason ? $reason : "Permission pivot table {$table} missing on user connection.");
>>>>>>> .merge_file_pMXJCN
}

function skipUnlessTeamUsersRelationSupported(): void
{
    if (! userTableHasColumn('team_user', 'permissions')) {
        pestSkip('team_user.permissions column missing — Team::users() pivot not loadable.');
    }
}
