<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
// //use Laravel\Scout\Searchable;
<<<<<<< HEAD
=======
use Modules\Xot\Models\Traits\HasXotFactory;
>>>>>>> 350420cb (Check & fix styling)
use Modules\Xot\Models\XotBaseUuidModel;
use Modules\Xot\Traits\Updater;

/**
 * Class BaseUuidModel.
 */
abstract class BaseUuidModel extends XotBaseUuidModel
{
    use HasUuids;

    // use Searchable;
    // //use Cachable;
<<<<<<< HEAD
=======
    /** @use HasXotFactory<\Illuminate\Database\Eloquent\Factories\Factory<static>> */
    use HasXotFactory;
>>>>>>> 350420cb (Check & fix styling)
    use Updater;

    /**
     * Indicates whether attributes are snake cased on arrays.
     *
     * @see https://laravel-news.com/6-eloquent-secrets
<<<<<<< HEAD
     */
    public static $snakeAttributes = true;

    public $incrementing = false;

    public $timestamps = true;

    protected $keyType = 'string';

    protected $primaryKey = 'id';

    protected $perPage = 30;

=======
     *
     * @var bool
     */
    public static $snakeAttributes = true;

    /** @var bool */
    public $incrementing = false;

    /** @var bool */
    public $timestamps = true;

    /** @var string */
    protected $keyType = 'string';

    /** @var string */
    protected $primaryKey = 'id';

    /** @var int */
    protected $perPage = 30;

    /** @var string */
>>>>>>> 350420cb (Check & fix styling)
    protected $connection = 'user';

    /** @var list<string> */
    protected $appends = [];

    /** @var list<string> */
    protected $hidden = [
        // 'password'
    ];

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
