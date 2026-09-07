<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\Factory;
// //use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Xot\Actions\Factory\GetFactoryAction;
=======
// //use Laravel\Scout\Searchable;
>>>>>>> 2024e2e7 (.)
=======
// //use Laravel\Scout\Searchable;
>>>>>>> f589f9b2 (.)
use Modules\Xot\Models\XotBaseUuidModel;
use Modules\Xot\Traits\Updater;

/**
 * Class BaseUuidModel.
 */
abstract class BaseUuidModel extends XotBaseUuidModel
{
<<<<<<< HEAD
<<<<<<< HEAD
    // use Searchable;
    // //use Cachable;
    use HasFactory;
    use HasUuids;
=======
=======
>>>>>>> f589f9b2 (.)
    use HasUuids;

    // use Searchable;
    // //use Cachable;
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    use Updater;

    /**
     * Indicates whether attributes are snake cased on arrays.
     *
     * @see https://laravel-news.com/6-eloquent-secrets
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @var bool
     */
    public static $snakeAttributes = true;

    /** @var bool */
    public $incrementing = false;

    /** @var string */
    protected $keyType = 'string';

    /** @var string */
    protected $primaryKey = 'id';

    /** @var bool */
    public $timestamps = true;

    /** @var int */
    protected $perPage = 30;

    /** @var string */
=======
=======
>>>>>>> f589f9b2 (.)
     */
    public static $snakeAttributes = true;

    public $incrementing = false;

    public $timestamps = true;

    protected $keyType = 'string';

    protected $primaryKey = 'id';

    protected $perPage = 30;

<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    protected $connection = 'user';

    /** @var list<string> */
    protected $appends = [];

    /** @var list<string> */
    protected $hidden = [
        // 'password'
    ];

<<<<<<< HEAD
<<<<<<< HEAD
    /**
     * Create a new factory instance for the model.
     *
     * @return Factory<static>
     */
    protected static function newFactory()
    {
        // return app(\Modules\Xot\Actions\Factory\GetFactoryAction::class)->execute(static::class);
        return app(GetFactoryAction::class)->execute(static::class);
    }

=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    /** @return array<string, string> */
    protected function casts(): array
    {
        return [
            'id' => 'string',
            'published_at' => 'datetime',
            'verified_at' => 'datetime',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
        ];
    }
}
