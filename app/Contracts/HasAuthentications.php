<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

use Illuminate\Contracts\Auth\Authenticatable;
use Modules\User\Models\Traits\HasAuthenticationLogTrait;

/**
 * Marker: il modello usa {@see HasAuthenticationLogTrait}.
 */
<<<<<<< HEAD
interface HasAuthentications extends Authenticatable {}
=======
interface HasAuthentications extends Authenticatable
{
}
>>>>>>> laraxot/dev
