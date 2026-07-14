<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Actions\Socialite;

use Laravel\Socialite\Contracts\User as SocialiteUser;
use Modules\User\Actions\Socialite\ResolveUserNameFieldsFromSocialiteAction;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class ResolveUserNameFieldsFromSocialiteActionTest extends TestCase
{
    #[Test]
    public function itResolvesFirstAndLastNameFromFullName(): void
    {
        $ssoUser = $this->createMockSocialiteUser('John Doe', 'john@example.com');
        $fields = app(ResolveUserNameFieldsFromSocialiteAction::class)->execute($ssoUser);

        $this->assertEquals('John', $fields->firstName);
        $this->assertEquals('Doe', $fields->lastName);
    }

    #[Test]
    public function itResolvesNameFromSingleWord(): void
    {
        $ssoUser = $this->createMockSocialiteUser('John', 'john@example.com');
        $fields = app(ResolveUserNameFieldsFromSocialiteAction::class)->execute($ssoUser);

        $this->assertEquals('John', $fields->firstName);
        $this->assertEquals('John', $fields->lastName);
    }

    #[Test]
    public function itFallsBackToEmailWhenNameIsEmpty(): void
    {
        $ssoUser = $this->createMockSocialiteUser(null, 'john.doe@example.com');
        $fields = app(ResolveUserNameFieldsFromSocialiteAction::class)->execute($ssoUser);

        $this->assertEquals('John', $fields->firstName);
        $this->assertEquals('Doe', $fields->lastName);
    }

    #[Test]
    public function itHandlesEmptyNameAndEmail(): void
    {
        $ssoUser = $this->createMockSocialiteUser(null, null);
        $fields = app(ResolveUserNameFieldsFromSocialiteAction::class)->execute($ssoUser);

        $this->assertEquals('', $fields->firstName);
        $this->assertEquals('', $fields->lastName);
    }

    #[Test]
    public function itHandlesEmptyStringName(): void
    {
        $ssoUser = $this->createMockSocialiteUser('', '');
        $fields = app(ResolveUserNameFieldsFromSocialiteAction::class)->execute($ssoUser);

        $this->assertEquals('', $fields->firstName);
        $this->assertEquals('', $fields->lastName);
    }

    #[Test]
    public function itResolvesThreeWordNames(): void
    {
        $ssoUser = $this->createMockSocialiteUser('John Michael Doe', 'john@example.com');
        $fields = app(ResolveUserNameFieldsFromSocialiteAction::class)->execute($ssoUser);

        $this->assertEquals('John', $fields->firstName);
        $this->assertEquals('Michael Doe', $fields->lastName);
    }

    public function createMockSocialiteUser(?string $name, ?string $email): SocialiteUser
    {
        $mock = $this->createMock(SocialiteUser::class);
        $mock->method('getName')->willReturn($name);
        $mock->method('getEmail')->willReturn($email);

        return $mock;
    }
}
