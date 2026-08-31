<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\TechPlanner\Models\Profile;

/**
 * Modules\User\Models\SsoProvider.
 *
 * @property array<int, string>|null $domain_whitelist
 * @property array<string, string>|null $role_mapping
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 * @property-read Collection<int, User> $users
 * @property-read int|null $users_count
 *
 * @method static Builder<static>|SsoProvider newModelQuery()
 * @method static Builder<static>|SsoProvider newQuery()
 * @method static Builder<static>|SsoProvider query()
 *
 * @mixin \Eloquent
 */
class SsoProvider extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'display_name',
        'type',
        'entity_id',
        'client_id',
        'client_secret',
        'redirect_url',
        'metadata_url',
        'scopes',
        'settings',
        'domain_whitelist',
        'role_mapping',
        'is_active',
    ];

    /**
     * @return HasMany<User, $this>
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'sso_provider_id');
    }

    /**
     * Check if a given email domain is allowed for this provider.
     */
    public function isAllowedDomain(string $email): bool
    {
        if (empty($this->domain_whitelist)) {
            return true;
        }

        $atPos = strrchr($email, '@');
        if ($atPos === false) {
            return false;
        }

        $domain = substr($atPos, 1);

        return in_array($domain, $this->domain_whitelist, true);
    }

    /**
     * Map SAML/OIDC roles to application roles.
     *
     * @param  array<string>  $samlRoles
     * @return list<string>
     */
    public function mapRoles(array $samlRoles): array
    {
        $mapping = $this->role_mapping ?? [];
        $roles = [];

        foreach ($samlRoles as $samlRole) {
            if (isset($mapping[$samlRole]) && is_string($mapping[$samlRole])) {
                $roles[] = $mapping[$samlRole];
            }
        }

        return $roles;
    }

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'settings' => 'array',
            'domain_whitelist' => 'array',
            'role_mapping' => 'array',
            'is_active' => 'boolean',
        ];
    }
}
