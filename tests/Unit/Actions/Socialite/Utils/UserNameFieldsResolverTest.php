<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Actions\Socialite\Utils;

use Laravel\Socialite\Contracts\User as SocialiteUser;
<<<<<<< HEAD
=======
<<<<<<< .merge_file_AQcAPJ
use Modules\User\Actions\Socialite\Utils\UserNameFieldsResolver;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class UserNameFieldsResolverTest extends TestCase
{
    #[Test]
    public function itResolvesFirstAndLastNameFromFullName(): void
    {
        $ssoUser = $this->createMockSocialiteUser('John Doe', 'john@example.com');
        $resolver = UserNameFieldsResolver::make($ssoUser);

        $this->assertEquals('John', $resolver->firstName);
        $this->assertEquals('Doe', $resolver->lastName);
    }

    #[Test]
    public function itResolvesNameFromSingleWord(): void
    {
        $ssoUser = $this->createMockSocialiteUser('John', 'john@example.com');
        $resolver = UserNameFieldsResolver::make($ssoUser);

        $this->assertEquals('John', $resolver->firstName);
        // Single word name results in firstName = lastName = 'John'
        $this->assertEquals('John', $resolver->lastName);
    }

    #[Test]
    public function itFallsBackToEmailWhenNameIsEmpty(): void
    {
        $ssoUser = $this->createMockSocialiteUser(null, 'john.doe@example.com');
        $resolver = UserNameFieldsResolver::make($ssoUser);

        $this->assertEquals('John', $resolver->firstName);
        $this->assertEquals('Doe', $resolver->lastName);
    }

    #[Test]
    public function itHandlesEmptyNameAndEmail(): void
    {
        $ssoUser = $this->createMockSocialiteUser(null, null);
        $resolver = UserNameFieldsResolver::make($ssoUser);

        $this->assertEquals('', $resolver->firstName);
        $this->assertEquals('', $resolver->lastName);
    }

    #[Test]
    public function itHandlesEmptyStringName(): void
    {
        $ssoUser = $this->createMockSocialiteUser('', '');
        $resolver = UserNameFieldsResolver::make($ssoUser);

        $this->assertEquals('', $resolver->firstName);
        $this->assertEquals('', $resolver->lastName);
    }

    #[Test]
    public function itResolvesThreeWordNames(): void
    {
        $ssoUser = $this->createMockSocialiteUser('John Michael Doe', 'john@example.com');
        $resolver = UserNameFieldsResolver::make($ssoUser);

        $this->assertEquals('John', $resolver->firstName);
        $this->assertEquals('Michael Doe', $resolver->lastName);
    }

    public function createMockSocialiteUser(?string $name, ?string $email): SocialiteUser
    {
        $mock = $this->createMock(SocialiteUser::class);
        $mock->method('getName')->willReturn($name);
        $mock->method('getEmail')->willReturn($email);

        return $mock;
    }
}
=======
>>>>>>> df2ba808 (.)
use Mockery\MockInterface;
use Modules\User\Actions\Socialite\Utils\UserNameFieldsResolver;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

function userNameFieldsResolverMock(?string $name, ?string $email): SocialiteUser
{
    return \configureMock(SocialiteUser::class, static function (MockInterface $mock) use ($name, $email): void {
        $mock->allows([
            'getName' => $name,
            'getEmail' => $email,
        ]);
    });
}

test('it resolves first and last name from full name', function (): void {
    $resolver = UserNameFieldsResolver::make(userNameFieldsResolverMock('John Doe', 'john@example.com'));

    Assert::assertSame('John', $resolver->firstName);
    Assert::assertSame('Doe', $resolver->lastName);
});

test('it resolves name from single word', function (): void {
    $resolver = UserNameFieldsResolver::make(userNameFieldsResolverMock('John', 'john@example.com'));

    Assert::assertSame('John', $resolver->firstName);
    Assert::assertSame('John', $resolver->lastName);
});

test('it falls back to email when name is empty', function (): void {
    $resolver = UserNameFieldsResolver::make(userNameFieldsResolverMock(null, 'john.doe@example.com'));

    Assert::assertSame('John', $resolver->firstName);
    Assert::assertSame('Doe', $resolver->lastName);
});

test('it handles empty name and email', function (): void {
    $resolver = UserNameFieldsResolver::make(userNameFieldsResolverMock(null, null));

    Assert::assertSame('', $resolver->firstName);
    Assert::assertSame('', $resolver->lastName);
});

test('it handles empty string name', function (): void {
    $resolver = UserNameFieldsResolver::make(userNameFieldsResolverMock('', ''));

    Assert::assertSame('', $resolver->firstName);
    Assert::assertSame('', $resolver->lastName);
});

test('it resolves three word names', function (): void {
    $resolver = UserNameFieldsResolver::make(userNameFieldsResolverMock('John Michael Doe', 'john@example.com'));

    Assert::assertSame('John', $resolver->firstName);
    Assert::assertSame('Michael Doe', $resolver->lastName);
});
<<<<<<< HEAD
=======
>>>>>>> .merge_file_7obiBv
>>>>>>> df2ba808 (.)
