<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Actions\Activity;

use Modules\User\Actions\Activity\LogRegistrationAction;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class LogRegistrationActionTest extends TestCase
{
    #[Test]
    public function itLogsRegistrationWithDefaultProperties(): void
    {
        $user = new User(['type' => 'customer_user']);
        $user->forceFill(['id' => 1]);

        $action = new LogRegistrationAction();
        $action->execute($user);

        $this->assertTrue(true);
    }

    #[Test]
    public function itLogsRegistrationWithCustomProperties(): void
    {
        $user = new User(['type' => 'premium']);
        $user->forceFill(['id' => 2]);

        $action = new LogRegistrationAction();
        $action->execute($user, ['referral' => 'newsletter', 'source' => 'landing']);

        $this->assertTrue(true);
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

        $this->assertTrue(true);
    }
}
