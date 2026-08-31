<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Modules\TechPlanner\Models\Profile;

/**
 * @property-read OauthClient|null $client
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthPersonalAccessClient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthPersonalAccessClient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthPersonalAccessClient query()
 *
 * @property int $id
 * @property string $client_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthPersonalAccessClient whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthPersonalAccessClient whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthPersonalAccessClient whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthPersonalAccessClient whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthPersonalAccessClient whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthPersonalAccessClient whereUpdatedBy($value)
 *
 * @mixin \Eloquent
 */
class OauthPersonalAccessClient extends BaseModel
{
    protected $table = 'oauth_personal_access_clients';

    protected $connection = 'user';

    /** @var list<string> */
    protected $fillable = [
        'id',
        'client_id',
    ];

    /**
     * @return BelongsTo<OauthClient, $this>
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(OauthClient::class, 'client_id');
    }
}
