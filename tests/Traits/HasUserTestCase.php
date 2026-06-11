<?php

declare(strict_types=1);

uses(Modules\User\Tests\TestCase::class);
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\User;

/**
 * Trait HasUserTestCase.
 *
 * Provides type-safe $user property for Pest test cases.
 *
 * @property User $user The authenticated user instance for testing
 */
trait HasUserTestCase
{
    /**
     * The user instance for testing.
     *
     * Typically initialized in beforeEach() with UserFactory::new()->createOne()
     */
    protected User $user;
}
