<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Carbon;
use Modules\Media\Models\Media;
use Modules\TechPlanner\Models\Profile;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;

/**
 * Modules\User\Models\Tenant.
 *
 * @property-read Profile|null $creator
 * @property-read MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read TenantUser|null $pivot
 * @property-read EloquentCollection<int, User> $members
 * @property-read int|null $members_count
 * @property-read Profile|null $updater
 * @property-read EloquentCollection<int, User> $users
 * @property-read int|null $users_count
 *
 * @method static Builder<static>|Tenant newModelQuery()
 * @method static Builder<static>|Tenant newQuery()
 * @method static Builder<static>|Tenant query()
 *
 * @property string $id
 * @property string $name
 * @property string|null $slug
 * @property string|null $domain
 * @property string|null $database
 * @property int $is_active
 * @property array<array-key, mixed>|null $settings
 * @property string|null $email_address
 * @property string|null $phone
 * @property string|null $mobile
 * @property string|null $address
 * @property string|null $primary_color
 * @property string|null $secondary_color
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 *
 * @method static Builder<static>|Tenant whereAddress($value)
 * @method static Builder<static>|Tenant whereCreatedAt($value)
 * @method static Builder<static>|Tenant whereCreatedBy($value)
 * @method static Builder<static>|Tenant whereDatabase($value)
 * @method static Builder<static>|Tenant whereDeletedAt($value)
 * @method static Builder<static>|Tenant whereDeletedBy($value)
 * @method static Builder<static>|Tenant whereDomain($value)
 * @method static Builder<static>|Tenant whereEmailAddress($value)
 * @method static Builder<static>|Tenant whereId($value)
 * @method static Builder<static>|Tenant whereIsActive($value)
 * @method static Builder<static>|Tenant whereMobile($value)
 * @method static Builder<static>|Tenant whereName($value)
 * @method static Builder<static>|Tenant wherePhone($value)
 * @method static Builder<static>|Tenant wherePrimaryColor($value)
 * @method static Builder<static>|Tenant whereSecondaryColor($value)
 * @method static Builder<static>|Tenant whereSlug($value)
 * @method static Builder<static>|Tenant whereUpdatedAt($value)
 * @method static Builder<static>|Tenant whereUpdatedBy($value)
 *
 * @mixin \Eloquent
 */
class Tenant extends BaseTenant {}
