<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Relations\Pivot;
>>>>>>> 2024e2e7 (.)
=======
use Illuminate\Database\Eloquent\Relations\Pivot;
>>>>>>> f589f9b2 (.)
use Modules\User\Contracts\TeamContract;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;

/**
 * Undocumented trait.
 *
 * @property TeamContract $currentTeam
 */
trait IsTenant
{
    /**
     * Get all users associated with this tenant.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @return BelongsToMany<Model&UserContract, static>
=======
     * @return BelongsToMany<Model&UserContract, $this, Pivot, 'pivot'>
>>>>>>> 2024e2e7 (.)
=======
     * @return BelongsToMany<Model&UserContract, $this, Pivot, 'pivot'>
>>>>>>> f589f9b2 (.)
     */
    public function users(): BelongsToMany
    {
        $xot = XotData::make();
        $userClass = $xot->getUserClass();

        // $this->setConnection('mysql');
<<<<<<< HEAD
<<<<<<< HEAD
        /** @var class-string<Model&UserContract> $userClass */
=======
        /* @var class-string<Model&UserContract> $userClass */
>>>>>>> 2024e2e7 (.)
=======
        /* @var class-string<Model&UserContract> $userClass */
>>>>>>> f589f9b2 (.)
        return $this->belongsToManyX($userClass, null, 'tenant_id', 'user_id');

        // ->as('membership')
    }
<<<<<<< HEAD
<<<<<<< HEAD

    /*
     * Method to create a belongsToMany relationship.
     *
     * @template TRelatedModel of \Illuminate\Database\Eloquent\Model
     *
     * @param class-string<TRelatedModel> $related The related model class
     * @param string|null $table The pivot table name
     * @param string $foreignPivotKey The foreign key in pivot table
     * @param string $relatedPivotKey The related key in pivot table
     * @param string|null $parentKey The parent key
     * @param string|null $relatedKey The related key
     * @param string|null $relation The relation name
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<TRelatedModel, static>
     *
     * public function belongsToManyX(
     * string $related,
     * ?string $table = null,
     * ?string $foreignPivotKey = 'tenant_id',
     * ?string $relatedPivotKey = 'user_id',
     * ?string $parentKey = null,
     * ?string $relatedKey = null,
     * ?string $relation = null
     * ): BelongsToMany {
     * return $this->belongsToMany($related, $table, $foreignPivotKey, $relatedPivotKey, $parentKey, $relatedKey, $relation);
     * }
     */
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
}
