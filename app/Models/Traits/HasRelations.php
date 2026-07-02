<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Modules\User\Models\Device;
use Modules\User\Models\SocialiteUser;
use Nwidart\Modules\Facades\Module as ModuleFacade;
use Nwidart\Modules\Laravel\Module;

/**
 * @property \Illuminate\Database\Eloquent\Collection<int, Device>        $devices
 * @property \Illuminate\Database\Eloquent\Collection<int, SocialiteUser> $socialiteUsers
 */
// ponytail: consolidated from HasDevices, HasSocialite, HasModules
trait HasRelations
{
    /**
     * @return BelongsToMany<Device, $this>
     */
    public function devices(): BelongsToMany
    {
        return $this->belongsToManyX(Device::class);
    }

    /**
     * @return HasMany<SocialiteUser, $this>
     */
    public function socialiteUsers(): HasMany
    {
        return $this->hasMany(SocialiteUser::class);
    }

    public function getProviderField(string $provider, string $field): string
    {
        $socialiteUser = $this->socialiteUsers()->firstWhere(['provider' => $provider]);
        if (null === $socialiteUser) {
            throw new \Exception('SocialiteUser not found');
        }

        return (string) $socialiteUser->{$field};
    }

    public function canAccessSocialite(): bool
    {
        return true;
    }

    /** @return array<string, Module> */
    public function getModules(): array
    {
        $modules = ModuleFacade::getOrdered();

        /** @var array<string, Module> $filteredModules */
        $filteredModules = Arr::where($modules, function ($module, $key) {
            $name = is_string($key) ? $key : (string) $key;
            $role_name = Str::of($name)->lower()->append('::admin')->toString();

            return $this->hasRole($role_name);
        });

        $result = [];
        foreach ($filteredModules as $key => $module) {
            if ($module instanceof Module) {
                $result[(string) $key] = $module;
            }
        }

        return $result;
    }
}
