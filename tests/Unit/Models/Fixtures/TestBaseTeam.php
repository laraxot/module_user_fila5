<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Models\Fixtures;

use Modules\User\Models\Team;
use Modules\User\Models\User;

/**
 * Team concreto per test BaseTeam in memoria (no DB).
 */
final class TestBaseTeam extends Team
{
    protected $table = 'test_teams';
}
