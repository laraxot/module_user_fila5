<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Actions\Socialite\Utils;

use PHPUnit\Framework\Assert;
use Laravel\Socialite\Contracts\User as SocialiteUser;
use Modules\User\Actions\Socialite\Utils\UserNameFieldsResolver;
use Modules\User\Tests\TestCase;

class UserNameFieldsResolverTest extends TestCase
{
    public function testItResolvesFirstAndLastNameFromFullName(): void
    {
        $ssoUser = $this->createMockSocialiteUser('John Doe', 'john@example.com');
        $resolver = UserNameFieldsResolver::make($ssoUser);

        Assert::assertEquals('John', $resolver->firstName);
        Assert::assertEquals('Doe', $resolver->lastName);
    }
    public function testItResolvesNameFromSingleWord(): void
    {
        $ssoUser = $this->createMockSocialiteUser('John', 'john@example.com');
        $resolver = UserNameFieldsResolver::make($ssoUser);

        Assert::assertEquals('John', $resolver->firstName);
        // Single word name results in firstName = lastName = 'John'
        Assert::assertEquals('John', $resolver->lastName);
    }
    public function testItFallsBackToEmailWhenNameIsEmpty(): void
    {
        $ssoUser = $this->createMockSocialiteUser(null, 'john.doe@example.com');
        $resolver = UserNameFieldsResolver::make($ssoUser);

        Assert::assertEquals('John', $resolver->firstName);
        Assert::assertEquals('Doe', $resolver->lastName);
    }
    public function testItHandlesEmptyNameAndEmail(): void
    {
        $ssoUser = $this->createMockSocialiteUser(null, null);
        $resolver = UserNameFieldsResolver::make($ssoUser);

        Assert::assertEquals('', $resolver->firstName);
        Assert::assertEquals('', $resolver->lastName);
    }
    public function testItHandlesEmptyStringName(): void
    {
        $ssoUser = $this->createMockSocialiteUser('', '');
        $resolver = UserNameFieldsResolver::make($ssoUser);

        Assert::assertEquals('', $resolver->firstName);
        Assert::assertEquals('', $resolver->lastName);
    }
    public function testItResolvesThreeWordNames(): void
    {
        $ssoUser = $this->createMockSocialiteUser('John Michael Doe', 'john@example.com');
        $resolver = UserNameFieldsResolver::make($ssoUser);

        Assert::assertEquals('John', $resolver->firstName);
        Assert::assertEquals('Michael Doe', $resolver->lastName);
    }

    private function createMockSocialiteUser(?string $name, ?string $email): SocialiteUser
    {
        $mock = $this->createMock(SocialiteUser::class);
        $mock->method('getName')->willReturn($name);
        $mock->method('getEmail')->willReturn($email);

        return $mock;
    }
}
