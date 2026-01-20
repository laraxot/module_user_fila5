<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

use Illuminate\Database\Eloquent\Collection;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Contracts\ProfileContract;
=======
use Modules\Xot\Contracts\ProfileContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
>>>>>>> f548be94 (.)
use Modules\Xot\Contracts\UserContract;

/**
 * @property Collection<int, Model&UserContract> $members
<<<<<<< HEAD
 * @property int|null                            $members_count
 * @property ProfileContract|null                $creator
 * @property ProfileContract|null                $updater
 *
 * @phpstan-require-extends Model
 */
interface TenantContract
=======
 * @property int|null $members_count
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 *
 * @phpstan-require-extends Model
 */
interface TenantContract extends ModelContract
>>>>>>> f548be94 (.)
{
    // belongstomany or hasmany ?
    // public function users(): HasMany;
}
