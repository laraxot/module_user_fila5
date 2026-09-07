<?php

declare(strict_types=1);

namespace Modules\User\Models;

<<<<<<< HEAD
<<<<<<< HEAD
use Override;
use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Contracts\ProfileContract;
use Illuminate\Support\Carbon;
use Modules\User\Database\Factories\ModelHasRoleFactory;
=======
=======
>>>>>>> f589f9b2 (.)
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\Xot\Contracts\ProfileContract;
use Webmozart\Assert\Assert;
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)

/**
 * Modules\User\Models\ModelHasRole.
 *
<<<<<<< HEAD
<<<<<<< HEAD
 * @property string $id
 * @property string $role_id
 * @property string $model_type
 * @property string $model_id
 * @property int|null $team_id
=======
=======
>>>>>>> f589f9b2 (.)
 * @property string      $id
 * @property string      $role_id
 * @property string      $model_type
 * @property string      $model_id
 * @property int|null    $team_id
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
<<<<<<< HEAD
<<<<<<< HEAD
 * @method static ModelHasRoleFactory factory($count = null, $state = [])
=======
 *
>>>>>>> 2024e2e7 (.)
=======
 *
>>>>>>> f589f9b2 (.)
 * @method static Builder|ModelHasRole newModelQuery()
 * @method static Builder|ModelHasRole newQuery()
 * @method static Builder|ModelHasRole query()
 * @method static Builder|ModelHasRole whereCreatedAt($value)
 * @method static Builder|ModelHasRole whereCreatedBy($value)
 * @method static Builder|ModelHasRole whereId($value)
 * @method static Builder|ModelHasRole whereModelId($value)
 * @method static Builder|ModelHasRole whereModelType($value)
 * @method static Builder|ModelHasRole whereRoleId($value)
 * @method static Builder|ModelHasRole whereTeamId($value)
 * @method static Builder|ModelHasRole whereUpdatedAt($value)
 * @method static Builder|ModelHasRole whereUpdatedBy($value)
<<<<<<< HEAD
<<<<<<< HEAD
 * @property string $uuid (DC2Type:guid)
 * @method static Builder|ModelHasRole whereUuid($value)
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @mixin IdeHelperModelHasRole
=======
=======
>>>>>>> f589f9b2 (.)
 *
 * @property string $uuid (DC2Type:guid)
 *
 * @method static Builder|ModelHasRole whereUuid($value)
 *
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 * @property ProfileContract|null $deleter
 *
 * @method static \Modules\User\Database\Factories\ModelHasRoleFactory factory($count = null, $state = [])
 *
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
 * @mixin \Eloquent
 */
class ModelHasRole extends BaseMorphPivot
{
<<<<<<< HEAD
<<<<<<< HEAD
    /** @var string */
    protected $table = 'model_has_role';

    /** @var list<string> */
    protected $fillable = [
        'id',
        // 'uuid',
=======
    /** @var list<string> */
    protected $fillable = [
        'id',
>>>>>>> 2024e2e7 (.)
=======
    /** @var list<string> */
    protected $fillable = [
        'id',
>>>>>>> f589f9b2 (.)
        'role_id',
        'model_type',
        'model_id',
        'team_id',
    ];

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Create a new instance and dynamically assign table name from config.
     *
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $table = config('permission.table_names.model_has_roles', 'model_has_role');
        if (\is_string($table)) {
            $this->setTable($table);
        }
    }

    /** @return array<string, string> */
    #[Override]
=======
=======
>>>>>>> f589f9b2 (.)
     * Nome tabella da config Spatie — mai `$table` hardcoded (può cambiare per tenant/overlay).
     */
    #[\Override]
    public function getTable(): string
    {
        Assert::string($table = config('permission.table_names.model_has_roles'));

        return $table;
    }

    /** @return array<string, string> */
    #[\Override]
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    protected function casts(): array
    {
        return [
            'id' => 'string',
            'role_id' => 'string',
            'model_type' => 'string',
            'model_id' => 'string',
            'team_id' => 'string',
<<<<<<< HEAD
<<<<<<< HEAD
            // 'uuid' => 'string',
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)

            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
        ];
    }
}
