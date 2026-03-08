<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Actions\Socialite\Utils;

use Laravel\Socialite\Contracts\User as SocialiteUser;
use Modules\User\Actions\Socialite\Utils\UserNameFieldsResolver;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class UserNameFieldsResolverTest extends TestCase
{
    #[Test]
    public function itResolvesFirstAndLastNameFromFullName(): void
    {
        $ssoUser = // @var mixed createMockSocialiteUser('John Doe', 'john@example.com';
        $resolver = UserNameFieldsResolver::make($ssoUser);

        // @var mixed assertEquals('John', $resolver->firstName;
        // @var mixed assertEquals('Doe', $resolver->lastName;
    }

    #[Test]
    public function itResolvesNameFromSingleWord(): void
    {
        $ssoUser = // @var mixed createMockSocialiteUser('John', 'john@example.com';
        $resolver = UserNameFieldsResolver::make($ssoUser);

        // @var mixed assertEquals('John', $resolver->firstName;
        // Single word name results in firstName = lastName = 'John'
        // @var mixed assertEquals('John', $resolver->lastName;
    }

    #[Test]
    public function itFallsBackToEmailWhenNameIsEmpty(): void
    {
        $ssoUser = // @var mixed createMockSocialiteUser(null, 'john.doe@example.com';
        $resolver = UserNameFieldsResolver::make($ssoUser);

        // @var mixed assertEquals('John', $resolver->firstName;
        // @var mixed assertEquals('Doe', $resolver->lastName;
    }

    #[Test]
    public function itHandlesEmptyNameAndEmail(): void
    {
        $ssoUser = // @var mixed createMockSocialiteUser(null, null;
        $resolver = UserNameFieldsResolver::make($ssoUser);

        // @var mixed assertEquals('', $resolver->firstName;
        // @var mixed assertEquals('', $resolver->lastName;
    }

    #[Test]
    public function itHandlesEmptyStringName(): void
    {
        $ssoUser = // @var mixed createMockSocialiteUser('', '';
        $resolver = UserNameFieldsResolver::make($ssoUser);

        // @var mixed assertEquals('', $resolver->firstName;
        // @var mixed assertEquals('', $resolver->lastName;
    }

    #[Test]
    public function itResolvesThreeWordNames(): void
    {
        $ssoUser = // @var mixed createMockSocialiteUser('John Michael Doe', 'john@example.com';
        $resolver = UserNameFieldsResolver::make($ssoUser);

        // @var mixed assertEquals('John', $resolver->firstName;
        // @var mixed assertEquals('Michael Doe', $resolver->lastName;
    }

    private function createMockSocialiteUser(?string $name, ?string $email): SocialiteUser
    {
        $mock = // @var mixed createMock(SocialiteUser::class;
        $mock->method('getName')->willReturn($name);
        $mock->method('getEmail')->willReturn($email);

        return $mock;
    }
}
