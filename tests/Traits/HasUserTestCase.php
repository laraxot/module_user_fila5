<?php

declare(strict_types=1);

namespace Tests\Modules\User\Traits;

use Modules\User\Models\User;

/**
 * Type-safe $user property for Pest / PHPUnit test cases.
 */
trait HasUserTestCase
{
    protected User $user;
}
