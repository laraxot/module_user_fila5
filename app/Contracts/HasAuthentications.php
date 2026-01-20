<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

<<<<<<< HEAD
use Illuminate\Contracts\Auth\Authenticatable;
use Modules\User\Models\Traits\HasAuthenticationLogTrait;

/**
 * Marker: il modello usa {@see HasAuthenticationLogTrait}.
 */
interface HasAuthentications extends Authenticatable {}
=======
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * Interfaccia che definisce i metodi per gestire i log di autenticazione associati a un utente.
 */
interface HasAuthentications
{
    /**
     * Ottiene tutti i log di autenticazione associati all'utente.
     *
     * @return MorphMany
     */
    public function authentications(): MorphMany;
}
>>>>>>> f548be94 (.)
