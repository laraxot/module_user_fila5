<?php

declare(strict_types=1);

namespace Modules\User\Datas;

<<<<<<< HEAD
use DateInterval;
=======
>>>>>>> 2024e2e7 (.)
use Spatie\LaravelData\Data;

/**
 * Undocumented class.
 */
class PermissionCacheData extends Data
{
<<<<<<< HEAD
    public DateInterval $expiration_time;
=======
    public \DateInterval $expiration_time;
>>>>>>> 2024e2e7 (.)

    // => \DateInterval::createFromDateString('24 hours'),
    public string $key;

    // => 'spatie.permission.cache',
    public string $store; // => 'default',
}
