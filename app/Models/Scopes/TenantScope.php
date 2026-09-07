<?php

declare(strict_types=1);

namespace Modules\User\Models\Scopes;

use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\User\Models\Tenant;

/**
 * Scope che limita le query ai record associati al tenant corrente.
=======
=======
>>>>>>> f589f9b2 (.)

/**
 * Scope che limita le query ai record associati al tenant corrente.
 *
 * @implements Scope<Model>
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
 */
class TenantScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $_model): void
    {
        $tenant_id = Filament::getTenant()?->getKey();
<<<<<<< HEAD
<<<<<<< HEAD
        if ($tenant_id !== null) {
=======
        if (null !== $tenant_id) {
>>>>>>> 2024e2e7 (.)
=======
        if (null !== $tenant_id) {
>>>>>>> f589f9b2 (.)
            $builder->where('tenant_id', '=', $tenant_id);
        }
    }
}
