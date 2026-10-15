<?php

declare(strict_types=1);

namespace Tests\Modules\User\Fixtures;

use Modules\User\Models\BaseUser;

/**
 * Named BaseUser probe for offline accessor coverage.
 */
final class UserGapBaseUserProbe extends BaseUser
{
    public function getTable(): string
    {
        return 'users';
    }
}
