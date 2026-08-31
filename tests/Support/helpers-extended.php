<?php

declare(strict_types=1);

use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Forms\Components\Field;
use Filament\Panel;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Section;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Laravel\Passport\ClientRepository;
use Laravel\Passport\Passport;
use Mockery\MockInterface;
use Modules\User\Actions\Socialite\IsUserAllowedAction;
use Modules\User\Database\Factories\TeamFactory;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\Profile;
use Modules\User\Models\Team;
use Modules\User\Models\User;
use Modules\User\Providers\Filament\AdminPanelProvider;
use Modules\User\Tests\TestCase;
<<<<<<< HEAD
use Modules\Xot\Actions\Cast\SafeStringCastAction;
=======
>>>>>>> laraxot/dev
use PHPUnit\Framework\Assert;
use PragmaRX\Google2FA\Google2FA;

use function Safe\glob;
use function Safe\json_decode;
use function Safe\json_encode;

/**
<<<<<<< HEAD
 * @param  array<string, mixed>  $pivot
=======
 * @param array<string, mixed> $pivot
>>>>>>> laraxot/dev
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

    DB::connection('user')->table('team_user')->insert($payload);
}

function detachTeamMember(Team $team, User $user): void
{
    DB::connection('user')->table('team_user')
        ->where('team_id', $team->id)
        ->where('user_id', $user->id)
        ->delete();
}

function teamMemberExists(Team $team, User $user): bool
{
    return DB::connection('user')->table('team_user')
        ->where('team_id', $team->id)
        ->where('user_id', $user->id)
        ->exists();
}

function teamUsesSoftDeletes(): bool
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
<<<<<<< HEAD
 * @param  array<string, mixed>  $attributes
=======
 * @param array<string, mixed> $attributes
>>>>>>> laraxot/dev
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
    $filament = Filament\Facades\Filament::class;

    try {
        $panel = $filament::getPanel('user::admin');
    } catch (Throwable) {
        $panelProvider = new AdminPanelProvider(app());
        $panel = $panelProvider->panel(Panel::make());
        $filament::registerPanel($panel);
    }

    $filament::setCurrentPanel($panel);
}

/**
<<<<<<< HEAD
 * @param  array<mixed>  $attributes
=======
 * @param array<mixed> $attributes
>>>>>>> laraxot/dev
 */
function mockSocialiteOauthUser(array $attributes = []): Laravel\Socialite\Contracts\User
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

    return configureMock(Laravel\Socialite\Contracts\User::class, static function (MockInterface $mock) use ($data): void {
        $mock->allows([
            'getId' => $data['id'],
            'getName' => $data['name'],
            'getEmail' => $data['email'],
            'getAvatar' => $data['avatar'],
            'getNickname' => $data['nickname'],
        ]);
    });
}

if (! function_exists('typedMock')) {
    /**
     * @template T of object
     *
<<<<<<< HEAD
     * @param  class-string<T>  $class
=======
     * @param class-string<T> $class
     *
>>>>>>> laraxot/dev
     * @return T&MockInterface
     */
    function typedMock(string $class): MockInterface
    {
        /** @var T&MockInterface $mock */
        $mock = Mockery::mock($class);

        return $mock;
    }
}

/**
 * @template T of object
 *
<<<<<<< HEAD
 * @param  class-string<T>  $class
 * @param  callable(T&MockInterface): void  $configure
=======
 * @param class-string<T>                 $class
 * @param callable(T&MockInterface): void $configure
 *
>>>>>>> laraxot/dev
 * @return T&MockInterface
 */
function configureMock(string $class, callable $configure): MockInterface
{
    /** @var T&MockInterface $mock */
    $mock = Mockery::mock($class);
    $configure($mock);

    return $mock;
}

function fakeSocialiteUser(string $email): Laravel\Socialite\Contracts\User
{
    return configureMock(Laravel\Socialite\Contracts\User::class, static function (MockInterface $mock) use ($email): void {
        $mock->allows(['getEmail' => $email]);
    });
}

function makeIsUserAllowedAction(): IsUserAllowedAction
{
    return new IsUserAllowedAction();
}

/**
 * @return list<string>
 */
function userMigrationFiles(): array
{
    $basePath = dirname(__DIR__, 2).'/database/migrations';
    /** @var list<string> $files */
    $files = glob($basePath.'/*.php');
    sort($files);

    return $files;
}

function skipUserTest(string $message): never
{
    Assert::markTestSkipped($message);
}

function skipLegacyRedirectPersistenceCheck(): void
{
    if (
        Schema::connection('user')->hasColumn('oauth_clients', 'redirect')
        && Schema::connection('user')->hasColumn('oauth_clients', 'redirect_uris')
    ) {
        skipUserTest('oauth_clients legacy redirect columns require redirect_uris sync not performed by Create*ClientAction.');
    }
}

function ensurePersonalAccessClient(): void
{
    $clientModel = Passport::client();

    if ($clientModel->newQuery()->where('revoked', false)->exists()) {
        return;
    }

    $repository = app(ClientRepository::class);
    $repository->createPersonalAccessGrantClient('Test Personal Access Client');
}

/**
 * @return array<int, Component|Action|ActionGroup>
 */
function userResourceSectionComponents(TestCase $testCase, Component $section): array
{
    Assert::assertInstanceOf(Section::class, $section);

    /* @var \Filament\Schemas\Components\Section $section */
    return $testCase->filamentSectionChildComponents($section);
}

/**
<<<<<<< HEAD
 * @param  array<int, Component|Action|ActionGroup>  $components
=======
 * @param array<int, Component|Action|ActionGroup> $components
>>>>>>> laraxot/dev
 */
function userResourceFindComponentByName(array $components, string $name): ?Component
{
    foreach ($components as $component) {
        if (! $component instanceof Field) {
            continue;
        }

        if ($component->getName() === $name) {
            return $component;
        }
    }

    return null;
}

/**
<<<<<<< HEAD
 * @param  array<string, mixed>  $attributes
=======
 * @param array<string, mixed> $attributes
>>>>>>> laraxot/dev
 */
function stubUser(array $attributes = []): User
{
    return UserFactory::new()->makeOne($attributes);
}

/**
<<<<<<< HEAD
 * @param  array<string, mixed>  $attributes
=======
 * @param array<string, mixed> $attributes
>>>>>>> laraxot/dev
 */
function hasTeamsCurrentCreateUser(array $attributes = []): User
{
    return createTestUser($attributes);
}

/**
<<<<<<< HEAD
 * @param  array<string, mixed>  $attributes
=======
 * @param array<string, mixed> $attributes
>>>>>>> laraxot/dev
 */
function hasTeamsCurrentCreateTeam(User $user, array $attributes = []): Team
{
    return TeamFactory::new()->createOne(array_merge([
        'user_id' => $user->id,
        'personal_team' => true,
    ], $attributes));
}

/**
<<<<<<< HEAD
 * @param  array<string, mixed>  $attributes
=======
 * @param array<string, mixed> $attributes
 *
>>>>>>> laraxot/dev
 * @return array{secret: string, qr_code: string, recovery_codes: array<int, string>}
 */
function enableTwoFactorForUser(User $user, Google2FA $google2fa, array $attributes = []): array
{
    $secret = (string) $google2fa->generateSecretKey();
<<<<<<< HEAD
    $qrCode = $google2fa->getQRCodeUrl(SafeStringCastAction::cast(config('app.name')), $user->email, $secret);
=======
    $qrCode = $google2fa->getQRCodeUrl((string) config('app.name'), $user->email, $secret);
>>>>>>> laraxot/dev

    $recoveryCodes = array_map(
        static fn (): string => substr(str_shuffle('0123456789ABCDEF'), 0, 10).'-'.substr(str_shuffle('0123456789ABCDEF'), 0, 10),
        range(1, 10)
    );

    $user->two_factor_secret = encrypt($secret);
    $user->two_factor_recovery_codes = encrypt(json_encode($recoveryCodes));
    $user->save();

    return [
        'secret' => $secret,
        'qr_code' => $qrCode,
        'recovery_codes' => $recoveryCodes,
    ];
}

function confirmTwoFactorForUser(User $user, Google2FA $google2fa, string $secret, string $code): bool
{
    if (! $google2fa->verifyKey($secret, $code)) {
        return false;
    }

    $user->two_factor_confirmed_at = now()->toDateTimeString();
    $user->save();

    return true;
}

function verifyTwoFactorCode(User $user, Google2FA $google2fa, string $code): bool
{
    if (! $user->two_factor_secret) {
        return false;
    }

<<<<<<< HEAD
    $secret = SafeStringCastAction::cast(decrypt($user->two_factor_secret));

    return $google2fa->verifyKey($secret, $code) !== false;
=======
    $secret = (string) decrypt($user->two_factor_secret);

    return false !== $google2fa->verifyKey($secret, $code);
>>>>>>> laraxot/dev
}

function disableTwoFactorForUser(User $user): void
{
    $user->two_factor_secret = null;
    $user->two_factor_recovery_codes = null;
    $user->two_factor_confirmed_at = null;
    $user->save();
}

function verifyTwoFactorRecoveryCode(User $user, string $code): bool
{
    if (! $user->two_factor_recovery_codes) {
        return false;
    }

<<<<<<< HEAD
    $codes = json_decode(SafeStringCastAction::cast(decrypt($user->two_factor_recovery_codes)), true);
=======
    $codes = json_decode((string) decrypt($user->two_factor_recovery_codes), true);
>>>>>>> laraxot/dev
    if (! is_array($codes)) {
        return false;
    }

    $codes = array_values(array_filter($codes, static fn ($c): bool => $c !== $code));
    $user->two_factor_recovery_codes = encrypt(json_encode($codes));
    $user->save();

    return true;
}

/**
 * @return array<int, string>
 */
function readStoredRecoveryCodes(User $user): array
{
    if (! $user->two_factor_recovery_codes) {
        return [];
    }

<<<<<<< HEAD
    $codes = json_decode(SafeStringCastAction::cast(decrypt($user->two_factor_recovery_codes)), true);
=======
    $codes = json_decode((string) decrypt($user->two_factor_recovery_codes), true);
>>>>>>> laraxot/dev
    if (! is_array($codes)) {
        return [];
    }

    /** @var array<int, string> $stringCodes */
    $stringCodes = array_values(array_filter($codes, 'is_string'));

    return $stringCodes;
}

/**
 * @return array<int, string>
 */
function regenerateTwoFactorRecoveryCodes(User $user): array
{
    $codes = array_map(
        static fn (): string => substr(str_shuffle('0123456789ABCDEF'), 0, 10).'-'.substr(str_shuffle('0123456789ABCDEF'), 0, 10),
        range(1, 10)
    );

    $user->two_factor_recovery_codes = encrypt(json_encode($codes));
    $user->save();

    return $codes;
}
