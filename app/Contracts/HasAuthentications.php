<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Contracts\Auth\Authenticatable;

/**
 * Marker: il modello usa {@see \Modules\User\Models\Traits\HasAuthenticationLogTrait}.
 */
interface HasAuthentications extends Authenticatable
{
    /**
     * Ottiene tutti i log di autenticazione associati all'utente.
     */
    public function authentications(): MorphMany;
}
