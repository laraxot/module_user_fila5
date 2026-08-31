<?php

declare(strict_types=1);

/**
 * inspired by  DutchCodingCompany\FilamentSocialite.
 */

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Modules\TechPlanner\Models\Profile;
use Modules\Xot\Datas\XotData;

/**
 * Modules\User\Models\SocialiteUser.
 *
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @property-read User|null $user
 *
 * @method static Builder<static>|SocialiteUser newModelQuery()
 * @method static Builder<static>|SocialiteUser newQuery()
 * @method static Builder<static>|SocialiteUser query()
 *
 * @property int $id
 * @property string $user_id
 * @property string $provider
 * @property string $provider_id
 * @property string|null $token
 * @property string|null $name
 * @property string|null $email
 * @property string|null $avatar
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 *
 * @method static Builder<static>|SocialiteUser whereAvatar($value)
 * @method static Builder<static>|SocialiteUser whereCreatedAt($value)
 * @method static Builder<static>|SocialiteUser whereCreatedBy($value)
 * @method static Builder<static>|SocialiteUser whereEmail($value)
 * @method static Builder<static>|SocialiteUser whereId($value)
 * @method static Builder<static>|SocialiteUser whereName($value)
 * @method static Builder<static>|SocialiteUser whereProvider($value)
 * @method static Builder<static>|SocialiteUser whereProviderId($value)
 * @method static Builder<static>|SocialiteUser whereToken($value)
 * @method static Builder<static>|SocialiteUser whereUpdatedAt($value)
 * @method static Builder<static>|SocialiteUser whereUpdatedBy($value)
 * @method static Builder<static>|SocialiteUser whereUserId($value)
 *
 * @mixin \Eloquent
 */
class SocialiteUser extends BaseModel
{
    /** @var list<string> */
    protected $fillable = [
        // 'id',
        'user_id',
        'provider',
        'provider_id',
        'token',
        'name',
        'email',
        'avatar',
    ];

    /**
     * @return BelongsTo<Model, $this>
     */
    public function user(): BelongsTo
    {
        /** @var class-string<Model> */
        $user_class = XotData::make()->getUserClass();

        return $this->belongsTo($user_class);
    }
}
