<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Fixtures;

use Illuminate\Support\Collection;
use Modules\User\Models\BaseUser;

/**
 * BaseUser stub con flag per canAccessPanel senza classi anonime.
 */
final class AdminPanelAccessUserFixture extends BaseUser
{
    public bool $superAdmin = false;

    public bool $hasAdminRole = false;

    public function isSuperAdmin(): bool
    {
        return $this->superAdmin;
    }

    /**
     * <<<<<<< .merge_file_mV0RZQ.
     *
     * @param array<int, string>|Collection<int, string> $roles
     *                                                          =======
     * @param array<int, string>|Collection<int, string> $roles
     *                                                          =======
     *                                                          <<<<<<< HEAD
     * @param array<int, string>|Collection<int, string> $roles
     *                                                          =======
     *                                                          <<<<<<< HEAD
     * @param array<int, string>|Collection<int, string> $roles
     *                                                          =======
     * @param array<int, string>|Collection<int, string> $roles
     *                                                          >>>>>>> laraxot/dev
     *                                                          >>>>>>> .merge_file_qtl3FX
     *                                                          >>>>>>> laraxot/dev
     */
    public function hasRole($roles, ?string $guard = null): bool
    {
        return $this->hasAdminRole;
    }
}
