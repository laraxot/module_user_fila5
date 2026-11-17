<?php

declare(strict_types=1);

namespace Modules\User\Support;

use Illuminate\Support\Facades\Auth;
use Modules\Xot\Contracts\UserContract;

/**
 * Risolve la chiave del tenant dell'utente autenticato.
 *
 * Usata da {@see \Modules\User\Models\Scopes\TenantScope} e
 * {@see \Modules\User\Models\Traits\InteractsWithTenant} come fallback quando
 * non c'e' un tenant Filament corrente: i pannelli operativi senza tenancy
 * (es. cameriere, cassa, cucina) vedono comunque solo il proprio tenant.
 *
 * Per utenti con piu' tenant si prende il primo in ordine di appartenenza:
 * il caso d'uso target e' l'utente operativo legato a un solo tenant.
 */
final class AuthenticatedTenantKey
{
    /**
     * Chiave (id) del tenant dell'utente autenticato.
     *
     * @return int|string|null `null` se non c'e' utente autenticato, se
     *                          l'utente non ha tenant o se la chiave non e'
     *                          uno scalare (uuid/stringa o intero).
     */
    public static function resolve(): int|string|null
    {
        $user = Auth::user();

        if (! $user instanceof UserContract) {
            return null;
        }

        $tenant = $user->tenants()->first();
        $key = $tenant?->getKey();

        return is_int($key) || is_string($key) ? $key : null;
    }
}
