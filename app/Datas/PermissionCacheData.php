<?php

declare(strict_types=1);

namespace Modules\User\Datas;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
use DateInterval;
>>>>>>> f548be94 (.)
=======
use DateInterval;
=======
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
use Spatie\LaravelData\Data;

/**
 * Undocumented class.
 */
class PermissionCacheData extends Data
{
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public \DateInterval $expiration_time;
=======
    public DateInterval $expiration_time;
>>>>>>> f548be94 (.)
=======
    public DateInterval $expiration_time;
=======
    public \DateInterval $expiration_time;
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
    public \DateInterval $expiration_time;
>>>>>>> laraxot/dev

    // => \DateInterval::createFromDateString('24 hours'),
    public string $key;

    // => 'spatie.permission.cache',
    public string $store; // => 'default',
}
