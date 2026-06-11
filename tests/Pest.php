<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Factories\Factory;
use Mockery;
use Mockery\MockInterface;
use Modules\User\Database\Factories\TeamFactory;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\Profile;
use Modules\User\Models\Team;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;

use function Safe\json_encode;

/*
 * |--------------------------------------------------------------------------
 * | Test Case
 * |--------------------------------------------------------------------------
 * |
 * | The closure you provide to your test functions is always bound to a specific PHPUnit test
 * | case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
 * | need to change it using the "pest()" function to bind a different classes or traits.
 * |
 */

/*
 * | Test Case — ogni file Pest dichiara uses(\Modules\User\Tests\TestCase::class).
 * | Vietato pest()->extend qui + uses() per file (conflitto Pest).
 */

/*
 * |--------------------------------------------------------------------------
 * | Expectations
 * |--------------------------------------------------------------------------
 * |
 * | When you're writing tests, you often need to check that values meet certain conditions. The
 * | "expect()" function gives you access to a set of "expectations" methods that you can use
 * | to assert different things. Of course, you may extend the Expectation API at any time.
 * |
 */

expect()->extend('toBeUser', function () {
    /** @phpstan-ignore-next-line */
    return $this->toBeInstanceOf(User::class);
});

expect()->extend('toBeTeam', function () {
    /** @phpstan-ignore-next-line */
    return $this->toBeInstanceOf(Team::class);
});

expect()->extend('toBeProfile', function () {
    /** @phpstan-ignore-next-line */
    return $this->toBeInstanceOf(Profile::class);
});

/*
 * |--------------------------------------------------------------------------
 * | Functions
 * |--------------------------------------------------------------------------
 * |
 * | While Pest is very powerful out-of-the-box, you may have some testing code specific to your
 * | project that you don't want to repeat in every file. Here you can also expose helpers as
 * | global functions to help you to reduce the number of lines of code in your test files.
 * |
 */

/**
 * @param  array<string, mixed>  $attributes
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
 * @param  array<string, mixed>  $attributes
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
 * @param  array<string, mixed>  $attributes
 */
function createTeam(array $attributes = []): Team
{
    return TeamFactory::new()->createOne(array_merge([
        'name' => 'team-'.uniqid(),
    ], $attributes));
}

/**
 * @param  array<string, mixed>  $attributes
 */
function createTestUser(array $attributes = []): User
{
    return UserFactory::new()->createOne(array_merge([
        'email' => 'test-'.uniqid('', true).'@example.com',
    ], $attributes));
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
    return \Illuminate\Support\Facades\Schema::connection('user')->hasColumn($table, $column);
}

function pestSkip(string $message): never
{
    \PHPUnit\Framework\Assert::markTestSkipped($message);
}

function skipUnlessUserColumn(string $table, string $column, string $reason = ''): void
{
    if (! userTableHasColumn($table, $column)) {
        pestSkip('' !== $reason ? $reason : "Column {$table}.{$column} missing on user connection.");
    }
}

function userTableExists(string $table): bool
{
    return \Illuminate\Support\Facades\Schema::connection('user')->hasTable($table);
}

function skipUnlessUserTable(string $table, string $reason = ''): void
{
    if (! userTableExists($table)) {
        pestSkip('' !== $reason ? $reason : "Table {$table} missing on user connection.");
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
    skipUnlessUserTable('users', '' !== $reason ? $reason : 'users table missing on user connection.');
}

function skipUnlessRoleAssignmentSupported(string $reason = ''): void
{
    $table = permissionRolePivotTable();
    skipUnlessUserTable($table, '' !== $reason ? $reason : "Role pivot table {$table} missing on user connection.");
}

function skipUnlessDirectPermissionSupported(string $reason = ''): void
{
    $table = permissionPivotTable();
    skipUnlessUserTable($table, '' !== $reason ? $reason : "Permission pivot table {$table} missing on user connection.");
}

function skipUnlessTeamUsersRelationSupported(): void
{
    if (! userTableHasColumn('team_user', 'permissions')) {
        pestSkip('team_user.permissions column missing — Team::users() pivot not loadable.');
    }
}

/**
 * @param  array<string, mixed>  $pivot
 */
function attachTeamMember(Team $team, User $user, array $pivot = []): void
{
    $payload = [
        'team_id' => $team->id,
        'user_id' => $user->id,
        'created_at' => now(),
        'updated_at' => now(),
    ];

    if (isset($pivot['role'])) {
        $payload['role'] = $pivot['role'];
    }

    if (userTableHasColumn('team_user', 'permissions') && array_key_exists('permissions', $pivot)) {
        $permissions = $pivot['permissions'];
        $payload['permissions'] = is_array($permissions) ? json_encode($permissions) : $permissions;
    }

    if (userTableHasColumn('team_user', 'joined_at') && array_key_exists('joined_at', $pivot)) {
        $payload['joined_at'] = $pivot['joined_at'];
    }

    \Illuminate\Support\Facades\DB::connection('user')->table('team_user')->insert($payload);
}

function detachTeamMember(Team $team, User $user): void
{
    \Illuminate\Support\Facades\DB::connection('user')->table('team_user')
        ->where('team_id', $team->id)
        ->where('user_id', $user->id)
        ->delete();
}

function teamMemberExists(Team $team, User $user): bool
{
    return \Illuminate\Support\Facades\DB::connection('user')->table('team_user')
        ->where('team_id', $team->id)
        ->where('user_id', $user->id)
        ->exists();
}

function teamUsesSoftDeletes(): bool
{
    /** @var array<class-string, class-string> $traits */
    $traits = \class_uses_recursive(Team::class);

    return in_array(
        \Illuminate\Database\Eloquent\SoftDeletes::class,
        $traits,
        true
    );
}

/**
 * @param  array<string, mixed>  $attributes
 */
function createProfile(array $attributes = []): Profile
{
    $factory = Profile::factory();
    \assert($factory instanceof Factory);

    $profile = $factory->create($attributes);
    \assert($profile instanceof Profile);

    return $profile;
}

function setupFilamentAdminPanel(): void
{
    $filament = \Filament\Facades\Filament::class;

    try {
        $panel = $filament::getPanel('user::admin');
    } catch (\Throwable) {
        $panelProvider = new \Modules\User\Providers\Filament\AdminPanelProvider(app());
        $panel = $panelProvider->panel(\Filament\Panel::make());
        $filament::registerPanel($panel);
    }

    $filament::setCurrentPanel($panel);
}

/**
 * @param  array<mixed>  $attributes
 */
function mockSocialiteOauthUser(array $attributes = []): \Laravel\Socialite\Contracts\User
{
    /** @var array<string, mixed> $attributes */
    $unique = uniqid();
    $data = array_merge([
        'id' => 'id-'.$unique,
        'name' => 'Mario Rossi',
        'email' => 'user'.$unique.'@example.com',
        'avatar' => 'https://example.com/avatar.jpg',
        'nickname' => 'user'.$unique,
    ], $attributes);

    return configureMock(\Laravel\Socialite\Contracts\User::class, static function (MockInterface $mock) use ($data): void {
        $mock->allows([
            'getId' => $data['id'],
            'getName' => $data['name'],
            'getEmail' => $data['email'],
            'getAvatar' => $data['avatar'],
            'getNickname' => $data['nickname'],
        ]);
    });
}

/**
 * @template T of object
 *
 * @param  class-string<T>  $class
 *
 * @return T&MockInterface
 */
function typedMock(string $class)
{
    /** @var T&MockInterface */
    return Mockery::mock($class);
}

/**
 * Configure a typed mock via Mockery expectations.
 *
 * @template T of object
 *
 * @param  class-string<T>  $class
 * @param  callable(T&MockInterface): void  $configure
 *
 * @return T&MockInterface
 */
function configureMock(string $class, callable $configure)
{
    /** @var T&MockInterface $mock */
    $mock = Mockery::mock($class);
    $configure($mock);

    return $mock;
}
