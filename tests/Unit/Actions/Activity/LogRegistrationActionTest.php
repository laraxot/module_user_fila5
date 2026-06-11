<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Actions\Activity;

use PHPUnit\Framework\Assert;
use Modules\User\Actions\Activity\LogRegistrationAction;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class LogRegistrationActionTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        if (! $this->userTableExists('activity_log')) {
            $this->markTestSkipped('activity_log table missing on sqlite test database.');
        }
    }

    #[Test]
    public function itLogsRegistrationWithDefaultProperties(): void
    {
        $user = new User(['type' => 'customer_user']);
        $user->forceFill(['id' => 1]);

        $action = new LogRegistrationAction();
        $action->execute($user);
    }

    #[Test]
    public function itLogsRegistrationWithCustomProperties(): void
    {
        $user = new User(['type' => 'premium']);
        $user->forceFill(['id' => 2]);

        $action = new LogRegistrationAction();
        $action->execute($user, ['referral' => 'newsletter', 'source' => 'landing']);
    }

    #[Test]
    public function itLogsRegistrationWithDifferentUserTypes(): void
    {
        $customerUser = new User(['type' => 'customer_user']);
        $customerUser->forceFill(['id' => 3]);

        $adminUser = new User(['type' => 'admin']);
        $adminUser->forceFill(['id' => 4]);

        $action = new LogRegistrationAction();

        $action->execute($customerUser);
        $action->execute($adminUser);
    }
}
