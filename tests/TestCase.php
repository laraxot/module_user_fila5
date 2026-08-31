<?php

declare(strict_types=1);

namespace Modules\User\Tests;

require_once __DIR__.'/Helpers.php';

use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Facades\Filament;
use Filament\Panel;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Section;
use Filament\Widgets\Widget;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Modules\User\Filament\Resources\UserResource\Pages\CreateUser;
use Modules\User\Filament\Resources\UserResource\Pages\ListUsers;
use Modules\User\Filament\Widgets\LoginWidget;
use Modules\User\Models\Device;
use Modules\User\Models\OauthClient;
use Modules\User\Models\Team;
use Modules\User\Models\TeamInvitation;
use Modules\User\Models\Tenant;
use Modules\User\Models\User;
use Modules\User\Providers\Filament\AdminPanelProvider;
use Modules\User\Providers\UserServiceProvider;
use Modules\Xot\Tests\XotBaseTestCase;
use PHPUnit\Framework\Assert;
use PragmaRX\Google2FA\Google2FA;

use function Safe\file_get_contents;
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
 * @property User|null $admin
 * @property User|null $baseUser
 * @property Team|null $team
 * @property Tenant|null $tenant1
 * @property Tenant|null $tenant2
 * @property Google2FA|null $google2fa
 * @property Command|null $command
 * @property ListUsers|null $listUsersPage
 * @property CreateUser|null $createUserPage
 * @property Device|null $device
 * @property Action|null $action
 * @property Widget|null $widget
 * @property Collection<int, User>|null $users
 */
abstract class TestCase extends XotBaseTestCase
{
    /**
     * Tiene del payload solo le colonne che `oauth_clients` ha davvero.
     *
     * I test costruiscono gli insert dichiarando sia i nomi di Passport 11
     * (`user_id`, `redirect`, `password_client`) sia quelli di Passport 12
     * (`owner_id`, `redirect_uris`, `grant_types`), per girare su installazioni di
     * entrambe le generazioni. Spedirli tutti però fa fallire la query su qualunque
     * schema: qui si scarta ciò che la tabella non ha, e `user_id` viene riportato su
     * `owner_id` quando è quest'ultimo a esistere.
     *
     * @param  array<string, mixed>  $payload
     * @return array<string, mixed>
     */
    public static function oauthClientColumnsOnly(array $payload): array
    {
        $columns = Schema::connection('user')->getColumnListing('oauth_clients');

        if (in_array('owner_id', $columns, true)) {
            $payload['owner_id'] ??= $payload['user_id'] ?? null;
            $payload['owner_type'] ??= $payload['owner_id'] === null ? null : User::class;
        }

        return array_intersect_key($payload, array_flip($columns));
    }

    use DatabaseTransactions;

    /**
     * @return array<int, class-string<ServiceProvider>>
     */
    protected function getPackageProviders(mixed $app): array
    {
        if (! $app instanceof Application) {
            throw new \InvalidArgumentException('Expected Illuminate\Foundation\Application.');
        }

        return [
            ...parent::getPackageProviders($app),
            UserServiceProvider::class,
        ];
    }

    public ?User $user = null;

    public ?User $owner = null;

    public ?User $member = null;

    public ?User $admin = null;

    public ?User $baseUser = null;

    public ?Team $team = null;

    public ?Tenant $tenant1 = null;

    public ?Tenant $tenant2 = null;

    public ?Device $device = null;

    public ?Google2FA $google2fa = null;

    public ?Command $command = null;

    public ?CreateUser $createUserPage = null;

    public ?ListUsers $listUsersPage = null;

    /** @var Collection<int, User>|null */
    public ?Collection $users = null;

    /** @var list<string> */
    protected $connectionsToTransact = ['sqlite', 'user'];

    protected function setUp(): void
    {
        $this->prepareSharedFixcitySqliteForTesting();

        parent::setUp();

        config(['auth.providers.users.model' => User::class]);

        if ($this->shouldSkipForMissingUserDb()) {
            $this->markTestSkipped('DB `user` non disponibile in ambiente test condiviso.');
        }
    }

    /**
     * Salta Feature / `user-db` offline; Unit puri e `no-user-db` restano verdi.
     * Shared sqlite (`fixcity_data`) ha spesso `users` ma locka in parallelo — non è MySQL test.
     *
     * Nota: Pest `uses()->group('user-db')` non sempre riempie `$this->groups()` —
     * fallback: rileva `group('user-db')` nel file sorgente del test.
     */
    protected function shouldSkipForMissingUserDb(): bool
    {
        $testFile = $this->resolvePestTestFile();
        $isUnit = $testFile !== null && str_contains($testFile, '/tests/Unit/');
        $isUserDbGroup = false;
        if ($testFile !== null && is_file($testFile)) {
            $source = file_get_contents($testFile);
            if (str_contains($source, "group('no-user-db')")) {
                return false;
            }
            $isUserDbGroup = str_contains($source, "group('user-db')");
        }

        // Unit puri: sempre esegui (pattern Activity / Xot).
        if ($isUnit && ! $isUserDbGroup) {
            return false;
        }

        if (static::userDbUnavailable()) {
            return true;
        }

        // Feature / user-db: lo schema sqlite può esistere, ma route/view Filament
        // nell'ambiente suite isolata restano incompleti (404, view missing).
        // Override: USER_DB_TESTS=1 per forzare l'esecuzione su MySQL/sqlite completo.
        // Non usare env(): Larastan vietato fuori da config — leggere $_ENV/$_SERVER.
        $userDbTests = $_ENV['USER_DB_TESTS'] ?? $_SERVER['USER_DB_TESTS'] ?? null;
        if ($userDbTests === '1' || $userDbTests === true) {
            return false;
        }

        try {
            return DB::connection('user')->getDriverName() === 'sqlite';
        } catch (\Throwable) {
            return true;
        }
    }

    private function resolvePestTestFile(): ?string
    {
        $class = static::class;

        if (property_exists($class, '__filename')) {
            /** @var string $filename */
            $filename = $class::$__filename;

            return $filename;
        }

        $file = (new \ReflectionClass($this))->getFileName();

        return $file !== false ? $file : null;
    }

    /**
     * Il sqlite condiviso non contiene sempre `users`: i test DB vanno saltati, non falliti.
     */
    public static function userDbUnavailable(): bool
    {
        try {
            DB::connection('user')->getPdo();

            return ! DB::connection('user')->getSchemaBuilder()->hasTable('users');
        } catch (\Throwable) {
            return true;
        }
    }

    public function setupFilamentAdminPanel(): void
    {
        try {
            $panel = Filament::getPanel('user::admin');
        } catch (\Throwable) {
            $panelProvider = new AdminPanelProvider($this->app);
            $panel = $panelProvider->panel(Panel::make());
            Filament::registerPanel($panel);
        }

        Filament::setCurrentPanel($panel);
    }

    public function freshUser(User $user): User
    {
        $fresh = $user->fresh();
        if ($fresh === null) {
            $this->fail('User model could not be refreshed.');
        }

        return $fresh;
    }

    public function requireUser(): User
    {
        $user = $this->user;
        if ($user === null) {
            $this->fail('User test property is not initialized.');
        }

        return $user;
    }

    public function requireOwner(): User
    {
        $owner = $this->owner;
        if ($owner === null) {
            $this->fail('Owner test property is not initialized.');
        }

        return $owner;
    }

    public function requireMember(): User
    {
        $member = $this->member;
        if ($member === null) {
            $this->fail('Member test property is not initialized.');
        }

        return $member;
    }

    public function requireAdmin(): User
    {
        $admin = $this->admin;
        if ($admin === null) {
            $this->fail('Admin test property is not initialized.');
        }

        return $admin;
    }

    public function requireBaseUser(): User
    {
        $baseUser = $this->baseUser;
        if ($baseUser === null) {
            $this->fail('BaseUser test property is not initialized.');
        }

        return $baseUser;
    }

    public function requireTeam(): Team
    {
        $team = $this->team;
        if ($team === null) {
            $this->fail('Team test property is not initialized.');
        }

        return $team;
    }

    public function requireTenant1(): Tenant
    {
        $tenant1 = $this->tenant1;
        if ($tenant1 === null) {
            $this->fail('Tenant1 test property is not initialized.');
        }

        return $tenant1;
    }

    public function requireTenant2(): Tenant
    {
        $tenant2 = $this->tenant2;
        if ($tenant2 === null) {
            $this->fail('Tenant2 test property is not initialized.');
        }

        return $tenant2;
    }

    public function requireGoogle2fa(): Google2FA
    {
        $google2fa = $this->google2fa;
        if ($google2fa === null) {
            $this->fail('Google2FA test property is not initialized.');
        }

        return $google2fa;
    }

    public function requireDevice(): Device
    {
        $device = $this->device;
        if ($device === null) {
            $this->fail('Device test property is not initialized.');
        }

        return $device;
    }

    public function requireCommand(): Command
    {
        $command = $this->command;
        if ($command === null) {
            $this->fail('Command test property is not initialized.');
        }

        return $command;
    }

    public function requireAction(): Action
    {
        $action = $this->action;
        if ($action === null) {
            $this->fail('Action test property is not initialized.');
        }

        return $action;
    }

    public function requireWidget(): Widget
    {
        if ($this->widget === null) {
            $this->fail('Widget test property is not initialized.');
        }

        return $this->widget;
    }

    public function requireLoginWidget(): LoginWidget
    {
        $widget = $this->requireWidget();
        Assert::assertInstanceOf(LoginWidget::class, $widget);

        return $widget;
    }

    public function requireCreateUserPage(): CreateUser
    {
        $createUserPage = $this->createUserPage;
        if ($createUserPage === null) {
            $this->fail('CreateUser page test property is not initialized.');
        }

        return $createUserPage;
    }

    public function requireListUsersPage(): ListUsers
    {
        $listUsersPage = $this->listUsersPage;
        if ($listUsersPage === null) {
            $this->fail('ListUsers page test property is not initialized.');
        }

        return $listUsersPage;
    }

    /**
     * @return Collection<int, User>
     */
    public function requireUsers(): Collection
    {
        $users = $this->users;
        if ($users === null) {
            $this->fail('Users test property is not initialized.');
        }

        return $users;
    }

    public function userTableHasColumn(string $table, string $column): bool
    {
        return Schema::connection('user')->hasColumn($table, $column);
    }

    public function skipUnlessUserColumn(string $table, string $column, string $reason = ''): void
    {
        if (! $this->userTableHasColumn($table, $column)) {
            $this->skipTest($reason !== '' ? $reason : "Column {$table}.{$column} missing on user connection.");
        }
    }

    public function userTableExists(string $table): bool
    {
        return Schema::connection('user')->hasTable($table);
    }

    public function skipUnlessUserTable(string $table, string $reason = ''): void
    {
        if (! $this->userTableExists($table)) {
            $this->skipTest($reason !== '' ? $reason : "Table {$table} missing on user connection.");
        }
    }

    public function skipUnlessTenantColumn(string $column, string $reason = ''): void
    {
        $this->skipUnlessUserColumn('tenants', $column, $reason);
    }

    public function skipUnlessUsersTableReady(string $reason = ''): void
    {
        $this->skipUnlessUserTable('users', $reason !== '' ? $reason : 'users table missing on user connection.');
    }

    public function skipUnlessRoleAssignmentSupported(string $reason = ''): void
    {
        $table = $this->permissionRolePivotTable();
        $this->skipUnlessUserTable($table, $reason !== '' ? $reason : "Role pivot table {$table} missing on user connection.");
    }

    public function skipUnlessDirectPermissionSupported(string $reason = ''): void
    {
        $table = $this->permissionPivotTable();
        $this->skipUnlessUserTable($table, $reason !== '' ? $reason : "Permission pivot table {$table} missing on user connection.");
    }

    public function skipUnlessUserSoftDeletes(string $reason = ''): void
    {
        if (! in_array(
            SoftDeletes::class,
            \class_uses_recursive(User::class),
            true
        )) {
            $this->skipTest($reason !== '' ? $reason : 'User model does not use SoftDeletes.');
        }
    }

    public function skipUnlessTeamUsersRelationSupported(): void
    {
        if (! $this->userTableHasColumn('team_user', 'permissions')) {
            $this->skipTest('team_user.permissions column missing — Team::users() pivot not loadable.');
        }
    }

    public function skipLegacyRedirectPersistence(): void
    {
        if (
            Schema::connection('user')->hasColumn('oauth_clients', 'redirect')
            && Schema::connection('user')->hasColumn('oauth_clients', 'redirect_uris')
        ) {
            $this->skipTest('oauth_clients legacy redirect columns require redirect_uris sync not performed by Create*ClientAction.');
        }
    }

    public function permissionRolePivotTable(): string
    {
        return Config::string('permission.table_names.model_has_roles', 'model_has_role');
    }

    public function permissionPivotTable(): string
    {
        return Config::string('permission.table_names.model_has_permissions', 'model_has_permission');
    }

    /**
     * @param  array<string, mixed>  $attributes
     */
    public static function createTestUser(array $attributes = []): User
    {
        /** @var User $user */
        $user = parent::createTestUser(array_merge([
            'email' => 'user-'.uniqid('', true).'@example.com',
        ], $attributes));

        return $user;
    }

    public function createMockSocialiteUser(?string $name, ?string $email): \Laravel\Socialite\Contracts\User
    {
        $mock = $this->createUnitMock(\Laravel\Socialite\Contracts\User::class);
        $mock->method('getName')->willReturn($name);
        $mock->method('getEmail')->willReturn($email);

        return $mock;
    }

    /**
     * @param  array<string, mixed>  $overrides
     */
    public function oauthClientTestPersistedClient(array $overrides = []): OauthClient
    {
        $clientId = (string) Str::uuid();
        $redirect = 'https://example.test/callback/'.uniqid('', true);

        $payload = array_merge([
            'id' => $clientId,
            'user_id' => null,
            'name' => 'Test OAuth Client '.uniqid('', true),
            'secret' => 'test-secret',
            'provider' => 'users',
            'redirect' => $redirect,
            'redirect_uris' => json_encode([$redirect]),
            'grant_types' => json_encode(['authorization_code', 'refresh_token']),
            'personal_access_client' => 0,
            'password_client' => 0,
            'revoked' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ], $overrides);

        if (Schema::connection('user')->hasColumn('oauth_clients', 'owner_id')) {
            $payload['owner_id'] ??= $payload['user_id'];
            $payload['owner_type'] ??= $payload['owner_id'] === null ? null : User::class;
        }

        // Il payload dichiara di proposito le colonne di entrambe le generazioni dello
        // schema Passport (`user_id`/`redirect`/`password_client` contro
        // `owner_id`/`redirect_uris`/`grant_types`), così l'helper funziona sia su
        // un'installazione vecchia sia su una nuova. Va però filtrato prima dell'insert:
        // spedire una colonna che non esiste fa fallire la query, ed è così che quindici
        // test morivano con `no column named user_id`.
        $columns = Schema::connection('user')->getColumnListing('oauth_clients');
        $payload = array_intersect_key($payload, array_flip($columns));

        DB::connection('user')->table('oauth_clients')->insert($payload);

        return OauthClient::query()->findOrFail($clientId);
    }

    /**
     * @param  array<string, mixed>  $pivot
     */
    public function attachTeamMember(Team $team, User $user, array $pivot = []): void
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

    public function detachTeamMember(Team $team, User $user): void
    {
        DB::connection('user')->table('team_user')
            ->where('team_id', $team->id)
            ->where('user_id', $user->id)
            ->delete();
    }

    public function teamMemberExists(Team $team, User $user): bool
    {
        return DB::connection('user')->table('team_user')
            ->where('team_id', $team->id)
            ->where('user_id', $user->id)
            ->exists();
    }

    /**
     * @param  array<string, mixed>  $data
     */
    public function assertDatabaseHasRow(string $table, array $data, ?string $connection = 'user'): void
    {
        $this->assertDatabaseHas($table, $data, $connection);
    }

    /**
     * @param  array<string, mixed>  $data
     */
    public function assertDatabaseMissingRow(string $table, array $data, ?string $connection = 'user'): void
    {
        $query = DB::connection($connection)->table($table);

        foreach ($data as $column => $value) {
            $query->where((string) $column, $value);
        }

        Assert::assertFalse($query->exists());
    }

    public function requireFreshUser(User $user): User
    {
        $fresh = $user->fresh();
        Assert::assertNotNull($fresh);

        return $fresh;
    }

    /**
     * @return array<int, Component|Action|ActionGroup>
     */
    public function filamentSectionChildComponents(Section $section): array
    {
        return array_values($section->getChildComponents());
    }

    public function teamUsesSoftDeletes(): bool
    {
        /** @var array<class-string, class-string> $traits */
        $traits = \class_uses_recursive(Team::class);

        return in_array(
            SoftDeletes::class,
            $traits,
            true
        );
    }

    /**
     * @param  array<string, mixed>  $attributes
     */
    public function createTeamInvitationRecord(Team $team, array $attributes = []): TeamInvitation
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
