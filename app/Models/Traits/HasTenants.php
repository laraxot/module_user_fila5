<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

<<<<<<< HEAD
use Filament\Panel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Collection;
use Modules\User\Contracts\TeamContract;
use Modules\Xot\Datas\XotData;

/**
 * Trait HasTenants.
=======
use Illuminate\Database\Eloquent\Relations\Pivot;
use Filament\Panel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Modules\User\Contracts\TeamContract;
use Modules\Xot\Actions\Panel\ApplyTenancyToPanelAction;
use Modules\Xot\Datas\XotData;

/**
 * Trait HasTenants
>>>>>>> f548be94 (.)
 *
 * Provides tenant functionality for User models implementing multi-tenancy.
 *
 * @property TeamContract $currentTeam
 */
trait HasTenants
{
    /**
     * Check if the user can access a specific tenant.
<<<<<<< HEAD
=======
     *
     * @param Model $tenant
     * @return bool
>>>>>>> f548be94 (.)
     */
    public function canAccessTenant(Model $tenant): bool
    {
        return $this->tenants()->whereKey($tenant)->exists();
    }

    /**
     * Get tenants for the given panel.
     *
<<<<<<< HEAD
=======
     * @param Panel $_panel
>>>>>>> f548be94 (.)
     * @return array<Model>|Collection<int, Model>
     */
    public function getTenants(Panel $_panel): array|Collection
    {
<<<<<<< HEAD
        /** @var Collection<int, Model> $result */
        $result = $this->tenants->map(
            static fn (Model $tenant): Model => $tenant,
        );

        return $result;
=======
        /** @var Collection<int, Model> $tenants */
        $tenants = $this->tenants;

        return $tenants;
>>>>>>> f548be94 (.)
    }

    /**
     * Get all of the tenants the user belongs to.
     *
<<<<<<< HEAD
     * @return BelongsToMany<Model, Model&static>
     *
     * @phpstan-return BelongsToMany<Model, Model&static, Pivot, 'pivot'>
=======
     * @return BelongsToMany<Model, Pivot>
>>>>>>> f548be94 (.)
     */
    public function tenants(): BelongsToMany
    {
        $xot = XotData::make();
        /** @var class-string<Model> */
        $tenant_class = $xot->getTenantClass();

<<<<<<< HEAD
        /** @var BelongsToMany<Model, Model&static, Pivot, 'pivot'> $relation */
        $relation = $this->belongsToManyX($tenant_class);

        return $relation;
=======
        return $this->belongsToManyX($tenant_class);
>>>>>>> f548be94 (.)
    }
}
