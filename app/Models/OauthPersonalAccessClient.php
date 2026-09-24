<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
<<<<<<< HEAD
use Illuminate\Support\Carbon;
=======
>>>>>>> 350420cb (Check & fix styling)

/**
 * @property string $id
 * @property string $client_id
 * @property OauthClient|null $client
<<<<<<< .merge_file_D60tJx
<<<<<<< HEAD
 * @property Carbon|null      $created_at
 * @property Carbon|null      $updated_at
 * @property string|null      $updated_by
 * @property string|null      $created_by
=======
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
>>>>>>> .merge_file_LTECEb
 *
 * @method static \Modules\User\Database\Factories\OauthPersonalAccessClientFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthPersonalAccessClient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthPersonalAccessClient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OauthPersonalAccessClient query()
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

=======
 */
class OauthPersonalAccessClient extends BaseModel
{
    /** @var string */
    protected $table = 'oauth_personal_access_clients';

    /** @var string */
>>>>>>> 350420cb (Check & fix styling)
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
