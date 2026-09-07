<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

use Illuminate\Database\Eloquent\Collection;
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Contracts\ProfileContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
=======
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Contracts\ProfileContract;
>>>>>>> 2024e2e7 (.)
=======
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Contracts\ProfileContract;
>>>>>>> f589f9b2 (.)
use Modules\Xot\Contracts\UserContract;

/**
 * @property Collection<int, Model&UserContract> $members
<<<<<<< HEAD
<<<<<<< HEAD
 * @property int|null $members_count
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 *
 * @phpstan-require-extends Model
 */
interface TenantContract extends ModelContract
=======
=======
>>>>>>> f589f9b2 (.)
 * @property int|null                            $members_count
 * @property ProfileContract|null                $creator
 * @property ProfileContract|null                $updater
 *
 * @phpstan-require-extends Model
 */
interface TenantContract
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
{
    // belongstomany or hasmany ?
    // public function users(): HasMany;
}
