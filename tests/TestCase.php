<?php

declare(strict_types=1);

namespace Modules\User\Tests;

use Filament\Facades\Filament;
use Filament\Panel;
use Filament\PanelRegistry;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Modules\User\Models\Team;
use Modules\User\Models\TeamInvitation;
use Modules\User\Models\User;
use Modules\User\Providers\Filament\AdminPanelProvider;
use Modules\Xot\Tests\CreatesApplication;

use function Safe\json_encode;

/**
 * Base test case for User module.
 *
 * Uses MySQL from .env.testing.
 * All module connections are mapped by TenantServiceProvider.
 * Migrations must be run ONCE externally: php artisan migrate --env=testing
 * DatabaseTransactions handles rollback between tests.
 *
 * @property User|null $user
 * @property User|null $owner
 * @property User|null $member
 * @property Team|null $team
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use DatabaseTransactions;

    /** @var list<string> */
    protected $connectionsToTransact = ['sqlite', 'user'];

    protected function setUp(): void
    {
        parent::setUp();

        $database = database_path('fixcity_data.sqlite');

        /** @var array<string, array<string, mixed>> $connections */
        $connections = config('database.connections', []);

        foreach (array_keys($connections) as $connection) {
            if (config("database.connections.{$connection}.driver") !== 'sqlite') {
                continue;
            }

            $this->app['config']->set("database.connections.{$connection}.database", $database);
            DB::purge($connection);
        }
    }

    protected function setupFilamentAdminPanel(): void
    {
        try {
            $panel = Filament::getPanel('user::admin');
        } catch (\Throwable) {
            $panelProvider = new AdminPanelProvider($this->app);
            $registry = Filament::getPanelRegistry();
            \assert($registry instanceof PanelRegistry);
            $panel = $panelProvider->panel($registry->makePanel('user::admin'));
            \assert($panel instanceof Panel);
            Filament::registerPanel($panel);
        }

        Filament::setCurrentPanel($panel);
    }

    protected function userTableHasColumn(string $table, string $column): bool
    {
        return \Illuminate\Support\Facades\Schema::connection('user')->hasColumn($table, $column);
    }

    protected function skipUnlessUserColumn(string $table, string $column, string $reason = ''): void
    {
        if (! $this->userTableHasColumn($table, $column)) {
            $this->markTestSkipped('' !== $reason ? $reason : "Column {$table}.{$column} missing on user connection.");
        }
    }

    protected function userTableExists(string $table): bool
    {
        return Schema::connection('user')->hasTable($table);
    }

    protected function skipUnlessUserTable(string $table, string $reason = ''): void
    {
        if (! $this->userTableExists($table)) {
            $this->markTestSkipped('' !== $reason ? $reason : "Table {$table} missing on user connection.");
        }
    }

    protected function permissionRolePivotTable(): string
    {
        return (string) config('permission.table_names.model_has_roles', 'model_has_role');
    }

    protected function permissionPivotTable(): string
    {
        return (string) config('permission.table_names.model_has_permissions', 'model_has_permission');
    }

    protected function skipUnlessUsersTableReady(string $reason = ''): void
    {
        $this->skipUnlessUserTable('users', '' !== $reason ? $reason : 'users table missing on user connection.');
    }

    protected function skipUnlessRoleAssignmentSupported(string $reason = ''): void
    {
        $table = $this->permissionRolePivotTable();
        $this->skipUnlessUserTable($table, '' !== $reason ? $reason : "Role pivot table {$table} missing on user connection.");
    }

    protected function skipUnlessDirectPermissionSupported(string $reason = ''): void
    {
        $table = $this->permissionPivotTable();
        $this->skipUnlessUserTable($table, '' !== $reason ? $reason : "Permission pivot table {$table} missing on user connection.");
    }

    /**
     * @param  array<string, mixed>  $attributes
     */
    protected function createTestUser(array $attributes = []): User
    {
        $factory = User::factory();
        \assert($factory instanceof Factory);

        $user = $factory->create(array_merge([
            'email' => 'user-'.uniqid('', true).'@example.com',
        ], $attributes));
        \assert($user instanceof User);

        return $user;
    }

    protected function skipUnlessTeamUsersRelationSupported(): void
    {
        if (! $this->userTableHasColumn('team_user', 'permissions')) {
            $this->markTestSkipped('team_user.permissions column missing — Team::users() pivot not loadable.');
        }
    }

    /**
     * @param  array<string, mixed>  $pivot
     */
    protected function attachTeamMember(Team $team, User $user, array $pivot = []): void
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

        if ($this->userTableHasColumn('team_user', 'permissions') && array_key_exists('permissions', $pivot)) {
            $permissions = $pivot['permissions'];
            $payload['permissions'] = is_array($permissions) ? json_encode($permissions) : $permissions;
        }

        if ($this->userTableHasColumn('team_user', 'joined_at') && array_key_exists('joined_at', $pivot)) {
            $payload['joined_at'] = $pivot['joined_at'];
        }

        DB::connection('user')->table('team_user')->insert($payload);
    }

    protected function detachTeamMember(Team $team, User $user): void
    {
        DB::connection('user')->table('team_user')
            ->where('team_id', $team->id)
            ->where('user_id', $user->id)
            ->delete();
    }

    protected function teamMemberExists(Team $team, User $user): bool
    {
        return DB::connection('user')->table('team_user')
            ->where('team_id', $team->id)
            ->where('user_id', $user->id)
            ->exists();
    }

    protected function teamUsesSoftDeletes(): bool
    {
        return in_array(
            \Illuminate\Database\Eloquent\SoftDeletes::class,
            class_uses_recursive(Team::class),
            true
        );
    }

    /**
     * @param  array<string, mixed>  $attributes
     */
    protected function createTeamInvitationRecord(Team $team, array $attributes = []): TeamInvitation
    {
        $payload = array_merge([
            'uuid' => (string) Str::uuid(),
            'team_id' => (string) $team->id,
            'email' => 'invite-'.uniqid().'@example.com',
            'role' => 'member',
        ], $attributes);

        $invitation = new TeamInvitation();
        $invitation->forceFill($payload);
        $invitation->save();

        return $invitation->fresh() ?? $invitation;
    }
}
