<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

<<<<<<< HEAD
use Throwable;
=======
>>>>>>> 2024e2e7 (.)
use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\User\Contracts\TeamContract;
use Modules\User\Models\Scopes\TenantScope;
use Modules\User\Models\Tenant;
<<<<<<< HEAD
use Modules\Xot\Datas\XotData;
=======
>>>>>>> 2024e2e7 (.)

/**
 * @property TeamContract $currentTeam
 */
trait InteractsWithTenant
{
    /**
     * Tenant corrente.
<<<<<<< HEAD
     *
     * @var Model|null
     */
    protected null|Model $currentTenant = null;
=======
     */
    protected ?Model $currentTenant = null;
>>>>>>> 2024e2e7 (.)

    /**
     * Relazione con il tenant a cui appartiene il modello.
     *
     * @return BelongsTo<Model, self>
<<<<<<< HEAD
=======
     *
>>>>>>> 2024e2e7 (.)
     * @phpstan-return BelongsTo<Model, $this>
     */
    public function tenant(): BelongsTo
    {
        $tenant = $this->getTenant();
        if ($tenant === null) {
            $this->loadTenantFromSession();
            $tenant = $this->getTenant();
        }

        $tenantClass = config('tenant.tenant_model', Tenant::class);

<<<<<<< HEAD
        // @phpstan-ignore argument.type, argument.templateType
=======
        // @phpstan-ignore-next-line
>>>>>>> 2024e2e7 (.)
        return $this->belongsTo($tenantClass, 'tenant_id');
    }

    /**
     * Ottiene il tenant corrente.
<<<<<<< HEAD
     *
     * @return Model|null
     */
    protected function getTenant(): null|Model
=======
     */
    protected function getTenant(): ?Model
>>>>>>> 2024e2e7 (.)
    {
        return $this->currentTenant;
    }

    /**
     * Carica il tenant dalla sessione.
<<<<<<< HEAD
     *
     * @return void
=======
>>>>>>> 2024e2e7 (.)
     */
    protected function loadTenantFromSession(): void
    {
        try {
            $this->currentTenant = Filament::getTenant();
<<<<<<< HEAD
        } catch (Throwable $e) {
=======
        } catch (\Throwable $e) {
>>>>>>> 2024e2e7 (.)
            // Se Filament non è disponibile, lascia il tenant come null
            $this->currentTenant = null;
        }
    }

    /**
     * The "booted" method of the model.
     */
    protected static function bootInteractsWithTenant(): void
    {
<<<<<<< HEAD
        static::addGlobalScope(new TenantScope());

        static::creating(static function ($model): void {
            if ($model !== null) {
                $tenant = Filament::getTenant();
                if ($tenant !== null) {
                    $model->tenant_id = $tenant->getKey();
=======
        static::addGlobalScope(new TenantScope);

        static::creating(static function (mixed $model): void {
            // PHPStan Level 10: Verifica se il modello ha tenant_id
            // Uso isFillable() invece di property_exists() per Eloquent magic properties
            if ($model !== null && $model instanceof Model && $model->isFillable('tenant_id')) {
                $tenant = Filament::getTenant();
                if ($tenant !== null) {
                    // Usa setAttribute() invece di assegnazione diretta per PHPStan
                    $model->setAttribute('tenant_id', $tenant->getKey());
>>>>>>> 2024e2e7 (.)
                }
            }
        });
    }

    /**
     * Interact with the user's first name.
     */
<<<<<<< HEAD
    protected function setTenantIdAttribute(null|int $value): void
=======
    protected function setTenantIdAttribute(?int $value): void
>>>>>>> 2024e2e7 (.)
    {
        $tenant = Filament::getTenant();
        if ($value === null && $tenant !== null) {
            $tenantId = $tenant->getKey();
            if (is_int($tenantId)) {
                $value = $tenantId;
            }
        }

        if ($value !== null) {
            $this->attributes['tenant_id'] = $value;
        }
    }

    /**
     * Applica lo scope del tenant.
     */
    protected function applyTenantScope(): void
    {
        $tenant = $this->getTenant();
        if ($tenant === null) {
            $this->loadTenantFromSession();
            $tenant = $this->getTenant();
        }

        if ($tenant !== null) {
            $tenantId = $tenant->getKey();
            if ($tenantId !== null) {
<<<<<<< HEAD
                static::addGlobalScope(new TenantScope());
=======
                static::addGlobalScope(new TenantScope);
>>>>>>> 2024e2e7 (.)
            }
        }
    }
}
