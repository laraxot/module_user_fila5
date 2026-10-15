<?php

declare(strict_types=1);

namespace Tests\Modules\User\Unit\Models\Fixtures;

use Modules\User\Models\Team;

/**
 * Team concreto per test BaseTeam in memoria (no DB).
 */
final class TestBaseTeam extends Team
{
    protected $table = 'test_teams';
}
