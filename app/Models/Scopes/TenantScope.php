<?php

declare(strict_types=1);

namespace Modules\User\Models\Scopes;

use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
<<<<<<< HEAD

/**
 * Scope che limita le query ai record associati al tenant corrente.
 *
 * @implements Scope<Model>
=======
use Modules\User\Models\Tenant;

/**
 * Scope che limita le query ai record associati al tenant corrente.
>>>>>>> f548be94 (.)
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
        if (null !== $tenant_id) {
=======
        if ($tenant_id !== null) {
>>>>>>> f548be94 (.)
            $builder->where('tenant_id', '=', $tenant_id);
        }
    }
}
