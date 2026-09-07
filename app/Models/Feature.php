<?php

declare(strict_types=1);

namespace Modules\User\Models;

<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Contracts\ProfileContract;
use Modules\User\Database\Factories\FeatureFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
=======
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\Xot\Contracts\ProfileContract;
>>>>>>> 2024e2e7 (.)
=======
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\Xot\Contracts\ProfileContract;
>>>>>>> f589f9b2 (.)

/**
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
<<<<<<< HEAD
<<<<<<< HEAD
 * @method static FeatureFactory factory($count = null, $state = [])
 * @method static Builder|Feature newModelQuery()
 * @method static Builder|Feature newQuery()
 * @method static Builder|Feature query()
 * @property string $id
 * @property string $name
 * @property string $scope
 * @property string $value
=======
=======
>>>>>>> f589f9b2 (.)
 *
 * @method static Builder|Feature newModelQuery()
 * @method static Builder|Feature newQuery()
 * @method static Builder|Feature query()
 *
 * @property string      $id
 * @property string      $name
 * @property string      $scope
 * @property string      $value
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
<<<<<<< HEAD
<<<<<<< HEAD
=======
 *
>>>>>>> 2024e2e7 (.)
=======
 *
>>>>>>> f589f9b2 (.)
 * @method static Builder|Feature whereCreatedAt($value)
 * @method static Builder|Feature whereCreatedBy($value)
 * @method static Builder|Feature whereDeletedAt($value)
 * @method static Builder|Feature whereDeletedBy($value)
 * @method static Builder|Feature whereId($value)
 * @method static Builder|Feature whereName($value)
 * @method static Builder|Feature whereScope($value)
 * @method static Builder|Feature whereUpdatedAt($value)
 * @method static Builder|Feature whereUpdatedBy($value)
 * @method static Builder|Feature whereValue($value)
<<<<<<< HEAD
<<<<<<< HEAD
 * @mixin IdeHelperFeature
=======
=======
>>>>>>> f589f9b2 (.)
 *
 * @property ProfileContract|null $deleter
 *
 * @method static \Modules\User\Database\Factories\FeatureFactory factory($count = null, $state = [])
 *
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
 * @mixin \Eloquent
 */
class Feature extends BaseModel
{
    /** @var list<string> */
    protected $fillable = [
        'id',
        'name',
        'scope',
        'value',
    ];
}
