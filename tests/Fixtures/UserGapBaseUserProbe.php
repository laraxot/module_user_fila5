<?php

declare(strict_types=1);

namespace Modules\User\Tests\Fixtures;

use Modules\User\Models\BaseUser;
use Modules\User\Models\User;

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
