<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Modules\Xot\Models\Traits\HasXotFactory;

/**
 * Modules\User\Models\PersonalAccessToken.
 *
 * <<<<<<< .merge_file_tyyoE7
 * =======
 * <<<<<<< .merge_file_phIfFe
 *
 * =======
 * <<<<<<< HEAD
 * =======
 * <<<<<<< HEAD
 *
 * >>>>>>> laraxot/dev
 *
 * @property int         $id
 * @property string      $tokenable_type
 * @property int         $tokenable_id
 * @property string      $name
 * @property string      $token
 *                                       <<<<<<< HEAD
 *                                       =======
 *                                       =======
 *                                       >>>>>>> .merge_file_EIz2KS
 *                                       >>>>>>> .merge_file_prFyhz
 * @property int         $id
 * @property string      $tokenable_type
 * @property int         $tokenable_id
 * @property string      $name
 * @property string      $token
 *                                       <<<<<<< .merge_file_tyyoE7
 *                                       =======
 *                                       <<<<<<< .merge_file_phIfFe
 *                                       =======
 * @property int         $id
 * @property string      $tokenable_type
 * @property int         $tokenable_id
 * @property string      $name
 * @property string      $token
 *                                       =======
 *                                       >>>>>>> laraxot/dev
 *                                       >>>>>>> .merge_file_EIz2KS
 *                                       >>>>>>> laraxot/dev
 *                                       >>>>>>> .merge_file_prFyhz
 * @property string|null $abilities
 * @property Carbon|null $last_used_at
 * @property Carbon|null $expires_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * <<<<<<< .merge_file_tyyoE7
 *
 * @method static \Modules\User\Database\Factories\PersonalAccessTokenFactory factory($count = null, $state = [])
 *                                                                                                                =======
 *                                                                                                                <<<<<<< .merge_file_phIfFe
 *
 * =======
 * <<<<<<< HEAD
 * @method static \Modules\User\Database\Factories\PersonalAccessTokenFactory       factory($count = null, $state = [])
 *                                                                                                                      =======
 *                                                                                                                      <<<<<<< HEAD
 *                                                                                                                      >>>>>>> .merge_file_EIz2KS
 * @method static \Modules\User\Database\Factories\PersonalAccessTokenFactory       factory($count = null, $state = [])
 *                                                                                                                      =======
 * @method static \Modules\User\Database\Factories\PersonalAccessTokenFactory       factory($count = null, $state = [])
 *                                                                                                                      >>>>>>> laraxot/dev
 *                                                                                                                      <<<<<<< .merge_file_phIfFe
 *                                                                                                                      =======
 *                                                                                                                      >>>>>>> laraxot/dev
 *                                                                                                                      >>>>>>> .merge_file_EIz2KS
 *                                                                                                                      >>>>>>> .merge_file_prFyhz
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalAccessToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalAccessToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalAccessToken query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalAccessToken whereAbilities($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalAccessToken whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalAccessToken whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalAccessToken whereLastUsedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalAccessToken whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalAccessToken whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalAccessToken whereTokenableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalAccessToken whereTokenableType($value)
 *
 * @mixin \Eloquent
 */
class PersonalAccessToken extends Model
{
    use HasXotFactory;

    protected $connection = 'user';

    protected $table = 'personal_access_tokens';

    protected $fillable = [
        'tokenable_type',
        'tokenable_id',
        'name',
        'token',
        'abilities',
        'last_used_at',
        'expires_at',
    ];

    protected function casts(): array
    {
        return [
            'abilities' => 'array',
            'last_used_at' => 'datetime',
            'expires_at' => 'datetime',
        ];
    }
}
