<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

use Illuminate\Contracts\Auth\Authenticatable;
<<<<<<< HEAD
use Modules\User\Models\Traits\HasAuthenticationLogTrait;

/**
 * Marker: il modello usa {@see HasAuthenticationLogTrait}.
 */
interface HasAuthentications extends Authenticatable {}
=======

/**
 * Marker: il modello usa {@see \Modules\User\Models\Traits\HasAuthenticationLogTrait}.
 */
interface HasAuthentications extends Authenticatable
{
}
>>>>>>> laraxot/dev
