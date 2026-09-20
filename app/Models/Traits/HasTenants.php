<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
use Filament\Panel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Collection;
use Modules\User\Contracts\TeamContract;
use Modules\Xot\Datas\XotData;

/**
 * Trait HasTenants.
<<<<<<< HEAD
=======
=======
>>>>>>> 87273113 (.)
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
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
use Filament\Panel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Collection;
use Modules\User\Contracts\TeamContract;
use Modules\Xot\Datas\XotData;

/**
 * Trait HasTenants.
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
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
<<<<<<< HEAD
<<<<<<< HEAD
=======
     *
     * @param Model $tenant
     * @return bool
>>>>>>> f548be94 (.)
=======
     *
     * @param Model $tenant
     * @return bool
=======
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
     */
    public function canAccessTenant(Model $tenant): bool
    {
        return $this->tenants()->whereKey($tenant)->exists();
    }

    /**
     * Get tenants for the given panel.
     *
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
     * @param Panel $_panel
>>>>>>> f548be94 (.)
=======
     * @param Panel $_panel
=======
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
     * @return array<Model>|Collection<int, Model>
     */
    public function getTenants(Panel $_panel): array|Collection
    {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
        /** @var Collection<int, Model> $result */
        $result = $this->tenants->map(
            static fn (Model $tenant): Model => $tenant,
        );

        return $result;
<<<<<<< HEAD
=======
=======
>>>>>>> 87273113 (.)
        /** @var Collection<int, Model> $tenants */
        $tenants = $this->tenants;

        return $tenants;
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
        /** @var Collection<int, Model> $result */
        $result = $this->tenants->map(
            static fn (Model $tenant): Model => $tenant,
        );

        return $result;
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
    }

    /**
     * Get all of the tenants the user belongs to.
     *
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     * @return BelongsToMany<Model, Model&static>
     *
     * @phpstan-return BelongsToMany<Model, Model&static, Pivot, 'pivot'>
=======
     * @return BelongsToMany<Model, Pivot>
>>>>>>> f548be94 (.)
=======
     * @return BelongsToMany<Model, Pivot>
=======
     * @return BelongsToMany<Model, Model&static>
     *
     * @phpstan-return BelongsToMany<Model, Model&static, Pivot, 'pivot'>
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
     * @return BelongsToMany<Model, Model&static>
     *
     * @phpstan-return BelongsToMany<Model, Model&static, Pivot, 'pivot'>
>>>>>>> laraxot/dev
     */
    public function tenants(): BelongsToMany
    {
        $xot = XotData::make();
        /** @var class-string<Model> */
        $tenant_class = $xot->getTenantClass();

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
        /** @var BelongsToMany<Model, Model&static, Pivot, 'pivot'> $relation */
        $relation = $this->belongsToManyX($tenant_class);

        return $relation;
<<<<<<< HEAD
=======
        return $this->belongsToManyX($tenant_class);
>>>>>>> f548be94 (.)
=======
        return $this->belongsToManyX($tenant_class);
=======
        /** @var BelongsToMany<Model, Model&static, Pivot, 'pivot'> $relation */
        $relation = $this->belongsToManyX($tenant_class);

        return $relation;
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
    }
}
