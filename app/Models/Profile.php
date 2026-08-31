<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Support\Carbon;
use Modules\Media\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\Permission\Traits\HasRoles;
use Spatie\SchemalessAttributes\SchemalessAttributes;
use Spatie\SchemalessAttributes\SchemalessAttributesTrait as HasSchemalessAttributes;

/**
 * User Profile Model.
 *
 * Represents a user profile with relationships to devices, teams, and roles.
 *
 * @property SchemalessAttributes $extra
 * @property string|null $bio
 * @property-read string $avatar
 * @property-read \Modules\TechPlanner\Models\Profile|null $creator
 * @property-read Collection<int, DeviceUser> $deviceUsers
 * @property-read int|null $device_users_count
 * @property-read ProfileTeam|DeviceProfile|null $pivot
 * @property-read Collection<int, Device> $devices
 * @property-read int|null $devices_count
 * @property-read string|null $first_name
 * @property-read string|null $full_name
 * @property-read string|null $last_name
 * @property-read MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read Collection<int, DeviceUser> $mobileDeviceUsers
 * @property-read int|null $mobile_device_users_count
 * @property-read Collection<int, Device> $mobileDevices
 * @property-read int|null $mobile_devices_count
 * @property-read DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection<int, Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read Collection<int, Role> $roles
 * @property-read int|null $roles_count
 * @property-read Collection<int, Team> $teams
 * @property-read int|null $teams_count
 * @property-read \Modules\TechPlanner\Models\Profile|null $updater
 * @property-read User|null $user
 * @property-read string|null $user_name
 *
 * @method static \Modules\User\Database\Factories\ProfileFactory factory($count = null, $state = [])
 * @method static Builder<static>|Profile byUuid(string $uuid)
 * @method static Builder<static>|Profile childrenWith(array<string> $relations)
 * @method static Builder<static>|Profile childrenWithCount(array<string> $relations)
 * @method static Builder<static>|Profile newModelQuery()
 * @method static Builder<static>|Profile newQuery()
 * @method static Builder<static>|Profile permission($permissions, bool $without = false)
 * @method static Builder<static>|Profile query()
 * @method static Builder<static>|Profile role($roles, ?string $guard = null, bool $without = false)
 * @method static Builder<static>|Profile team($teams, bool $without = false)
 * @method static Builder<static>|Profile withExtraAttributes()
 * @method static Builder<static>|Profile withoutPermission($permissions)
 * @method static Builder<static>|Profile withoutRole($roles, ?string $guard = null)
 * @method static Builder<static>|Profile withoutTeam($teams)
 *
 * @property int $id
 * @property string|null $user_id
 * @property string|null $type
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $birth_date
 * @property string|null $gender
 * @property string|null $timezone
 * @property string|null $locale
 * @property array<array-key, mixed>|null $preferences
 * @property string|null $status
 * @property bool $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $deleted_by
 *
 * @method static Builder<static>|Profile whereAddress($value)
 * @method static Builder<static>|Profile whereAvatar($value)
 * @method static Builder<static>|Profile whereBio($value)
 * @method static Builder<static>|Profile whereBirthDate($value)
 * @method static Builder<static>|Profile whereCreatedAt($value)
 * @method static Builder<static>|Profile whereCreatedBy($value)
 * @method static Builder<static>|Profile whereDeletedAt($value)
 * @method static Builder<static>|Profile whereDeletedBy($value)
 * @method static Builder<static>|Profile whereEmail($value)
 * @method static Builder<static>|Profile whereExtra($value)
 * @method static Builder<static>|Profile whereFirstName($value)
 * @method static Builder<static>|Profile whereGender($value)
 * @method static Builder<static>|Profile whereId($value)
 * @method static Builder<static>|Profile whereIsActive($value)
 * @method static Builder<static>|Profile whereLastName($value)
 * @method static Builder<static>|Profile whereLocale($value)
 * @method static Builder<static>|Profile wherePhone($value)
 * @method static Builder<static>|Profile wherePreferences($value)
 * @method static Builder<static>|Profile whereStatus($value)
 * @method static Builder<static>|Profile whereTimezone($value)
 * @method static Builder<static>|Profile whereType($value)
 * @method static Builder<static>|Profile whereUpdatedAt($value)
 * @method static Builder<static>|Profile whereUpdatedBy($value)
 * @method static Builder<static>|Profile whereUserId($value)
 * @method static Builder<static>|Profile whereUserName($value)
 *
 * @mixin \Eloquent
 */
class Profile extends BaseProfile implements HasMedia
{
    use HasRoles;
    use HasSchemalessAttributes;
    use InteractsWithMedia;

    /**
     * The table associated with the model.
     */
    protected $table = 'profiles';

    /**
     * Get the teams that the profile belongs to.
     *
     * @return BelongsToMany<Team, $this, Pivot, 'pivot'>
     */
    public function teams(): BelongsToMany
    {
        return $this->belongsToManyX(Team::class);
    }

    /**
     * Scope a query to include schemaless attributes.
     *
     * @param  Builder<static>  $query
     * @return Builder<static>
     */
    public function scopeWithExtraAttributes(Builder $query): Builder
    {
        return $query; // SchemalessAttributesTrait should handle this, but adding for completeness/test
    }

    /**
     * Get the schemaless attributes.
     *
     * @return array<int, string>
     */
    public function getSchemalessAttributes(): array
    {
        return [
            'extra',
        ];
    }

    /**
     * Generate Schema.org ProfilePage/Person JSON-LD structured data.
     *
     * @see https://schema.org/Person
     * @see https://schema.org/ProfilePage
     *
     * @return array<string, mixed>
     */
    public function toSchemaOrg(): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Person',
            'name' => $this->full_name,
            'givenName' => $this->first_name,
            'familyName' => $this->last_name,
            'email' => $this->email,
            'description' => $this->bio,
            'image' => $this->avatar ? asset($this->avatar) : null,
            'url' => url('/profile/'.$this->user_name),
        ];
    }
}
