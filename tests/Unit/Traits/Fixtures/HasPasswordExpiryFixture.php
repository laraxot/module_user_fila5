<?php

declare(strict_types=1);

namespace Tests\Modules\User\Unit\Traits\Fixtures;

use Modules\User\Models\Traits\HasPasswordExpiry;
use Modules\User\Models\User;

/** PHPStan fixture: keeps HasPasswordExpiry trait in analysed graph. */
final class HasPasswordExpiryFixture extends User
{
    use HasPasswordExpiry;
}
