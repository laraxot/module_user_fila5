<?php

declare(strict_types=1);

namespace Modules\User\Models;

<<<<<<< HEAD
=======
use App\Support\AccountFeatures;
>>>>>>> laraxot/dev
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasName;
use Filament\Models\Contracts\HasTenants;
use Filament\Panel;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Factories\Factory;
>>>>>>> laraxot/dev
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
<<<<<<< HEAD
use Illuminate\Support\Carbon;
=======
>>>>>>> laraxot/dev
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Passport\Contracts\OAuthenticatable;
use Laravel\Passport\HasApiTokens;
use Modules\User\Contracts\HasAuthentications;
use Modules\User\Models\Traits\HasAuthenticationLogTrait;
use Modules\User\Models\Traits\HasDevices;
use Modules\User\Models\Traits\HasModules;
use Modules\User\Models\Traits\HasSocialite;
use Modules\User\Models\Traits\HasSpatiePermission;
use Modules\User\Models\Traits\HasTeams;
<<<<<<< HEAD
use Modules\Xot\Actions\Cast\SafeStringCastAction;
=======
>>>>>>> laraxot/dev
use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Models\Traits as XotTraits;
use Modules\Xot\Models\Traits\HasXotFactory;
use Parental\HasChildren;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * Base User Model.
 *
 * This is the base user model that provides the core authentication and authorization
 * functionality for the application. It extends Laravel's Authenticatable class
 * and implements the required interfaces for Filament and multi-tenancy.
 *
<<<<<<< HEAD
 * @property Collection<int, OauthClient> $clients
 * @property int|null $clients_count
 * @property Team|null $currentTeam
 * @property Collection<int, Device> $devices
 * @property int|null $devices_count
 * @property string|null $full_name
 * @property DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property int|null $notifications_count
 * @property Collection<int, Team> $ownedTeams
 * @property int|null $owned_teams_count
 * @property Collection<int, Permission> $permissions
 * @property int|null $permissions_count
 * @property ProfileContract|null $profile
 * @property Collection<int, Role> $roles
 * @property int|null $roles_count
 * @property Collection<int, Team> $membershipTeams
 * @property int|null $membership_teams_count
 * @property Collection<int, Tenant> $tenants
 * @property int|null $tenants_count
 * @property Collection<int, OauthToken> $tokens
 * @property int|null $tokens_count
 * @property string $last_name
 * @property string|null $facebook_id
 * @property Collection<int, SocialiteUser> $socialiteUsers
 * @property int|null $socialite_users_count
 * @property string|null $name
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $email
 * @property string|null $password
 * @property string|null $lang
 * @property string|null $current_team_id
 * @property bool|null $is_active
 * @property bool|null $is_otp
 * @property string|null $type
 * @property Carbon|null $password_expires_at
 * @property Carbon|null $email_verified_at
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $deleted_by
 * @property string|null $profile_photo_path
 * @property Pivot|null $pivot
=======
 * @property Collection<int, OauthClient>                              $clients
 * @property int|null                                                  $clients_count
 * @property Team|null                                                 $currentTeam
 * @property Collection<int, Device>                                   $devices
 * @property int|null                                                  $devices_count
 * @property string|null                                               $full_name
 * @property DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property int|null                                                  $notifications_count
 * @property Collection<int, Team>                                     $ownedTeams
 * @property int|null                                                  $owned_teams_count
 * @property Collection<int, Permission>                               $permissions
 * @property int|null                                                  $permissions_count
 * @property ProfileContract|null                                      $profile
 * @property Collection<int, Role>                                     $roles
 * @property int|null                                                  $roles_count
 * @property Collection<int, Team>                                     $membershipTeams
 * @property int|null                                                  $membership_teams_count
 * @property Collection<int, Tenant>                                   $tenants
 * @property int|null                                                  $tenants_count
 * @property Collection<int, OauthToken>                               $tokens
 * @property int|null                                                  $tokens_count
 * @property string                                                    $last_name
 * @property string|null                                               $facebook_id
 * @property Collection<int, SocialiteUser>                            $socialiteUsers
 * @property int|null                                                  $socialite_users_count
 * @property string|null                                               $name
 * @property string|null                                               $first_name
 * @property string|null                                               $last_name
 * @property string|null                                               $email
 * @property string|null                                               $password
 * @property string|null                                               $lang
 * @property string|null                                               $current_team_id
 * @property bool|null                                                 $is_active
 * @property bool|null                                                 $is_otp
 * @property string|null                                               $type
 * @property \DateTime|null                                            $password_expires_at
 * @property \DateTime|null                                            $email_verified_at
 * @property string|null                                               $remember_token
 * @property \DateTime|null                                            $created_at
 * @property \DateTime|null                                            $updated_at
 * @property \DateTime|null                                            $deleted_at
 * @property string|null                                               $created_by
 * @property string|null                                               $updated_by
 * @property string|null                                               $deleted_by
 * @property string|null                                               $profile_photo_path
 * @property Pivot|null                                                $pivot
>>>>>>> laraxot/dev
 *
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User permission($permissions, $without = false)
 * @method static Builder|User query()
 * @method static Builder|User role($roles, $guard = null, $without = false)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereCreatedBy($value)
 * @method static Builder|User whereCurrentTeamId($value)
 * @method static Builder|User whereDeletedAt($value)
 * @method static Builder|User whereDeletedBy($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereFirstName($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereIsActive($value)
 * @method static Builder|User whereLang($value)
 * @method static Builder|User whereLastName($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereProfilePhotoPath($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @method static Builder|User whereUpdatedBy($value)
 * @method static Builder|User withoutPermission($permissions)
 * @method static Builder|User withoutRole($roles, $guard = null)
 * @method static Builder|User whereFacebookId($value)
 * @method static Builder|User whereIsOtp($value)
 * @method static Builder|User wherePasswordExpiresAt($value)
 * @method static Builder|User whereSurname($value)
 *
 * @mixin \Eloquent
 */
abstract class BaseUser extends Authenticatable implements FilamentUser, HasAuthentications, HasMedia, HasName, HasTenants, MustVerifyEmail, OAuthenticatable, UserContract
{
    use HasApiTokens;
    use HasAuthenticationLogTrait;
    use HasChildren;
    use HasDevices;
    use HasModules;
    use HasSocialite;
    use HasSpatiePermission, HasTeams {
        HasSpatiePermission::teams insteadof HasTeams;
        HasTeams::teams as membershipTeams;
    }
    use HasUuids;
<<<<<<< HEAD
    use HasXotFactory;
=======

    /** @phpstan-use HasXotFactory<Factory<static>> */
    use HasXotFactory;

>>>>>>> laraxot/dev
    use InteractsWithMedia;
    use Notifiable;

    // use SoftDeletes;
    use Traits\HasTenants;
    use XotTraits\RelationX;

    public $incrementing = false;

<<<<<<< HEAD
    public ?Pivot $pivot = null;

=======
>>>>>>> laraxot/dev
    protected $connection = 'user';

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    protected string $childColumn = 'type';

    protected $fillable = [
        'id',
        // 'ente',
        // 'matr',
        'name',
        'first_name',
        'last_name',
        'email',
        'password',
        'lang',
        'current_team_id',
        'is_active',
        'is_otp', // is One Time Password
        'password_expires_at',
        'email_verified_at',
        'type',
        'state',
    ];

    /** @var list<string> */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /** @var list<string> */
    protected $with = [
        // Removed 'roles' to reduce memory usage - load explicitly when needed
    ];

    /** @var list<string> */
    protected $appends = [
        // 'profile_photo_url',
    ];

    /** @var array<string, class-string> */
    protected $childTypes = [];

    protected $attributes = [
        'is_active' => true,
    ];

    /**
     * Guard coerente con Spatie/Permission: deve essere 'web'.
     */
    protected string $guard_name = 'web';

    public function __construct(array $attributes = [])
    {
        // Concateno i fillable del parent con quelli della classe corrente
        // array_values() garantisce che sia un array indicizzato (list<string>)
        try {
            $this->fillable = array_values(array_merge(parent::getFillable(), $this->getFillable()));
            parent::__construct($attributes);
        } catch (\Throwable $e) {
            // Fallback in case database connection is not available (e.g., during testing)
            $this->fillable = array_values($this->getFillable());
            // Avoid calling parent constructor if database is not available
            foreach ($attributes as $key => $value) {
                $this->setAttribute($key, $value);
            }
        }
    }

    public function getProviderName(): string
    {
<<<<<<< HEAD
        $providerVal = $this->getAttribute('provider') ?? config('auth.guards.api.provider', 'users');
        $provider = SafeStringCastAction::cast($providerVal);

        return $provider;
=======
        return (string) ($this->getAttribute('provider') ?? config('auth.guards.api.provider', 'users'));
>>>>>>> laraxot/dev
    }

    /*
    public function canAccessFilament(?Panel $panel = null): bool
    {
<<<<<<< HEAD
         throw new \RuntimeException('Removed debug dddx');
=======
         dddx($panel->getId());
>>>>>>> laraxot/dev
        // return $this->role_id === Role::ROLE_ADMINISTRATOR;
        return true;
    }
    */
    /**
     * Get the user's name for Filament.
     */
    public function getFilamentName(): string
    {
<<<<<<< HEAD
        $nameVal = $this->getAttribute('name') ?? '';
        $firstNameVal = $this->getAttribute('first_name') ?? '';
        $lastNameVal = $this->getAttribute('last_name') ?? '';

        $name = SafeStringCastAction::cast($nameVal);
        $firstName = SafeStringCastAction::cast($firstNameVal);
        $lastName = SafeStringCastAction::cast($lastNameVal);
=======
        $name = (string) ($this->getAttribute('name') ?? '');
        $firstName = (string) ($this->getAttribute('first_name') ?? '');
        $lastName = (string) ($this->getAttribute('last_name') ?? '');
>>>>>>> laraxot/dev

        $fullName = trim(\sprintf('%s %s %s', $name, $firstName, $lastName));

        // Ensure we always return a non-empty string
        if (empty($fullName)) {
<<<<<<< HEAD
            $emailVal = $this->getAttribute('email') ?? '';
            $email = SafeStringCastAction::cast($emailVal);
=======
            $email = (string) ($this->getAttribute('email') ?? '');
>>>>>>> laraxot/dev

            return ! empty($email) ? $email : 'User';
        }

        return $fullName;
    }

    /**
     * @return HasOne<Model&ProfileContract, Model&static>
     *
     * @phpstan-return HasOne<Model&ProfileContract, Model&static>
     */
    #[\Override]
    public function profile(): HasOne
    {
        $profileClass = XotData::make()->getProfileClass();
        if (class_exists($profileClass)) {
            /** @var HasOne<Model&ProfileContract, Model&static> $relation */
            $relation = $this->hasOne($profileClass);

            return $relation;
        }

        // Try direct module class if XotData failed
        $directClass = 'Modules\User\Models\Profile';
        if (class_exists($directClass)) {
            /** @var HasOne<Model&ProfileContract, Model&static> $relation */
            $relation = $this->hasOne($directClass);

            return $relation;
        }

        // Fallback: stay on current model if nothing found
        /** @var HasOne<Model&ProfileContract, Model&static> $relation */
        $relation = $this->hasOne(static::class, 'id', 'id')->whereRaw('1=0');

        return $relation;
    }

    /**
     * Verifica se l'utente ha il ruolo di super-admin.
     *
     * @return bool True se l'utente Ã¨ super-admin, altrimenti false
     */
    public function isSuperAdmin(): bool
    {
        return $this->hasRole('super-admin');
    }

    public function assignModule(string $module): void
    {
        $role_name = $module.'::admin';
        $role = Role::firstOrCreate(['name' => $role_name]);
        $this->assignRole($role);
    }

    public function canAccessPanel(Panel $panel): bool
    {
<<<<<<< HEAD
        if ($panel->getId() !== 'admin') {
            return $this->hasRole($panel->getId());
        }

        return $this->isSuperAdmin() || $this->hasRole(['admin', 'super-admin']);
=======
        // $panel->default('admin');
        if ('admin' !== $panel->getId()) {
            $role = $panel->getId();

            // Matrice pannelli/ruoli del gestionale (config/account_features.php):
            // copre i ruoli di dominio (timber_admin, wts_operator, …) senza richiedere
            // un ruolo omonimo al panel id. I panel Laraxot usano id "{modulo}::admin":
            // alla matrice va passata la chiave modulo. hasRole(panelId) resta come fallback.
            $panelKey = str_contains($role, '::') ? (string) strtok($role, ':') : $role;
            if (AccountFeatures::canAccessPanel($this, $panelKey)) {
                return true;
            }

            return $this->hasRole($role);
        }

        return true; // str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();
>>>>>>> laraxot/dev
    }

    public function detach(Model $model): void
    {
        $this->membershipTeams()->detach($model);
    }

    public function attach(Model $model): void
    {
        $this->membershipTeams()->attach($model);
    }

    public function treeLabel(): string
    {
        return (string) ($this->name ?? $this->email);
    }

    /**
     * @return Collection<int, Team>
     */
<<<<<<< HEAD
=======
    /**
     * @return Collection<int, Team>
     */
>>>>>>> laraxot/dev
    public function treeSons(): Collection
    {
        return $this->membershipTeams ?? new Collection();
    }

    /**
     * Get the entity's notifications.
     *
     * @return MorphMany<Notification, $this>
     */
    public function notifications(): MorphMany
    {
        return $this->morphMany(Notification::class, 'notifiable');
    }

    /**
     * Get the user's latest authentication log.
     *
     * @return MorphOne<AuthenticationLog, $this>
     */
    public function latestAuthentication(): MorphOne
    {
        return $this->morphOne(AuthenticationLog::class, 'authenticatable')->latestOfMany();
    }

    public function getFullNameAttribute(?string $value): string
    {
<<<<<<< HEAD
        if ($value !== null) {
=======
        if (null !== $value) {
>>>>>>> laraxot/dev
            return $value;
        }

        $fullName = trim(($this->first_name ?? '').' '.($this->last_name ?? ''));

<<<<<<< HEAD
        return $fullName !== '' ? $fullName : ($this->email ?? 'User');
=======
        return '' !== $fullName ? $fullName : ($this->email ?? 'User');
>>>>>>> laraxot/dev
    }

    public function getNameAttribute(?string $value): string
    {
<<<<<<< HEAD
        if ($value !== null) {
            return $value;
        }

        if ($this->getKey() === null) {
=======
        if (null !== $value) {
            return $value;
        }

        if (null === $this->getKey()) {
>>>>>>> laraxot/dev
            return $this->email ?? 'User';
        }

        $name = Str::of((string) $this->email)->before('@')->toString();
        $i = 1;
        $candidate = $name.'-'.$i;

        // During unit tests, avoid any DB interaction.
        $isTesting = (static function (): bool {
            $app = app();
            if (method_exists($app, 'environment') && $app->environment('testing')) {
                return true;
            }

<<<<<<< HEAD
            return \PHP_SAPI === 'cli' && (getenv('APP_ENV') === 'testing' || getenv('ENV') === 'testing');
=======
            return \PHP_SAPI === 'cli' && ('testing' === getenv('APP_ENV') || 'testing' === getenv('ENV'));
>>>>>>> laraxot/dev
        })();
        if ($isTesting) {
            // Do not call update() here to avoid hitting the database.
            $this->attributes['name'] = $candidate;

            return $candidate;
        }

        try {
            $value = $candidate;
<<<<<<< HEAD
            while (self::firstWhere(['name' => $value]) !== null) {
                $i++;
=======
            while (null !== self::firstWhere(['name' => $value])) {
                ++$i;
>>>>>>> laraxot/dev
                $value = $name.'-'.$i;
            }
            $this->update(['name' => $value]);

            return $value;
        } catch (\Throwable $e) {
            // If any issue occurs (e.g., missing connection/table), fall back without DB.
            $this->attributes['name'] = $candidate;

            return $candidate;
        }
    }

    // public function authentications(): MorphMany
    // {
    //    return $this->morphMany(\Modules\User\Models\Authentication::class, 'authenticatable');
    // }

    /**
     * Check if the user has a specific role.
     *
     * NOTE: This method has been moved to trait HasSpatiePermission.
     * If you need role checking functionality, use the trait method instead.
     *
     * @see HasSpatiePermission::hasRole()
     */
    public function setPasswordAttribute(?string $value): void
    {
        if (empty($value)) {
            unset($this->attributes['password']);

            return;
        }
<<<<<<< HEAD

        // Bcrypt/argon già hashati (~60 char): non ri-hashare. Passphrase lunghe in chiaro: hash.
        if (Hash::isHashed($value)) {
            $this->attributes['password'] = $value;

            return;
        }

        $this->attributes['password'] = Hash::make($value);
=======
        if (\strlen($value) < 32) {
            $this->attributes['password'] = Hash::make($value);

            return;
        }
        $this->attributes['password'] = $value;
>>>>>>> laraxot/dev
    }

    /**
     * User possiede molti Clients OAuth (per autenticazione API).
     *
     * @return MorphMany<OauthClient, $this>
     */
    public function clients(): MorphMany
    {
        return $this->morphMany(OauthClient::class, 'owner');
    }

    /**
     * Find the user instance for the given username.
     */
    public static function findForPassport(string $username): ?self
    {
        return static::where('email', $username)->first();
    }

    /**
     * Validate the password of the user for the given password.
     */
    public function validateForPassportPasswordGrant(string $password): bool
    {
        return Hash::check($password, (string) $this->password);
    }

    /** @return array<string, string> */
    protected function casts(): array
    {
        return [
            'id' => 'string',
            'email_verified_at' => 'datetime',
            // 'password' => 'hashed', //Call to undefined cast [hashed] on column [password] in model [Modules\User\Models\User].
            'is_active' => 'boolean',
            'roles.pivot.id' => 'string',
            // https://github.com/beitsafe/laravel-uuid-auditing
            // ALTER TABLE model_has_role CHANGE COLUMN `id` `id` CHAR(37) NOT NULL DEFAULT uuid();

            'is_otp' => 'boolean',
            'password_expires_at' => 'datetime',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
        ];
    }
}
