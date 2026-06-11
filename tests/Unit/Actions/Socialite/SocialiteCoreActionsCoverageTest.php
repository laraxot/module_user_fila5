<?php

declare(strict_types=1);

uses(\Modules\User\Tests\TestCase::class);
use Illuminate\Contracts\Events\Dispatcher;
use InvalidArgumentException;
use Laravel\Socialite\Contracts\User as SocialiteUserContract;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;
use Mockery;
use Mockery\MockInterface;
use Modules\User\Actions\Socialite\CreateSocialiteUserAction;
use Modules\User\Actions\Socialite\GetUserModelAttributesFromSocialiteAction;
use Modules\User\Actions\Socialite\RetrieveOauthUserAction;
use Modules\User\Datas\SocialiteUserAttributesData;
use Modules\User\Events\InvalidState;
use Modules\User\Models\SocialiteUser;
use Modules\Xot\Contracts\UserContract;
use PHPUnit\Framework\Assert;
use RuntimeException;

describe('Socialite core actions coverage', function (): void {
    it('builds user attributes from oauth user', function (): void {
        $oauthUser = configureMock(SocialiteUserContract::class, function (MockInterface $mock): void {
            $mock->allows(['getName' => 'Mario Rossi']);
            $mock->allows(['getEmail' => 'mario.rossi@example.com']);
        });

        $data = app(GetUserModelAttributesFromSocialiteAction::class)->execute('github', $oauthUser);

        Assert::assertInstanceOf(SocialiteUserAttributesData::class, $data);
        Assert::assertSame('github', $data->provider);
        Assert::assertSame('mario.rossi@example.com', $data->email);
        Assert::assertSame('Mario', $data->firstName);
        Assert::assertSame('Rossi', $data->lastName);
    });

    it('throws when provider is empty while building attributes', function (): void {
        $oauthUser = configureMock(SocialiteUserContract::class, function (MockInterface $mock): void {
            $mock->allows(['getName' => 'Mario Rossi']);
            $mock->allows(['getEmail' => 'mario.rossi@example.com']);
        });

        try {
            app(GetUserModelAttributesFromSocialiteAction::class)->execute('', $oauthUser);
            Assert::fail('Expected InvalidArgumentException was not thrown');
        } catch (InvalidArgumentException $exception) {
            Assert::assertSame('provider non può essere vuoto', $exception->getMessage());
        }
    });

    it('throws when oauth email is invalid while building attributes', function (): void {
        $oauthUser = configureMock(SocialiteUserContract::class, function (MockInterface $mock): void {
            $mock->allows(['getName' => 'Mario Rossi']);
            $mock->allows(['getEmail' => null]);
        });

        try {
            app(GetUserModelAttributesFromSocialiteAction::class)->execute('github', $oauthUser);
            Assert::fail('Expected RuntimeException was not thrown');
        } catch (RuntimeException $exception) {
            Assert::assertSame('email deve essere una stringa non vuota', $exception->getMessage());
        }
    });

    it('retrieves oauth user from socialite driver', function (): void {
        $oauthUser = configureMock(SocialiteUserContract::class, function (MockInterface $mock): void {
            $mock->allows(['getEmail' => 'user@example.com']);
        });

        /** @var \Mockery\MockInterface $driver */
        $driver = Mockery::mock();
        $driver->allows(['user' => $oauthUser]);

        Socialite::shouldReceive('driver')->with('github')->andReturn($driver);

        $dispatcher = configureMock(Dispatcher::class, function (MockInterface $mock): void {
            $mock->allows(['dispatch' => null]);
        });

        $result = (new RetrieveOauthUserAction($dispatcher))->execute('github');

        Assert::assertSame($oauthUser, $result);
    });

    it('returns null and dispatches invalid state event when socialite state is invalid', function (): void {
        $exception = new InvalidStateException();

        /** @var \Mockery\MockInterface $driver */
        $driver = Mockery::mock();
        $driver->allows(['user' => fn (): never => throw $exception]);

        Socialite::shouldReceive('driver')->with('github')->andReturn($driver);

        $dispatcher = configureMock(Dispatcher::class, function (MockInterface $mock) use ($exception): void {
            $mock->allows([
                'dispatch' => function (mixed $event) use ($exception): void {
                    Assert::assertInstanceOf(InvalidState::class, $event);
                    Assert::assertSame($exception, $event->exception);
                },
            ]);
        });

        $result = (new RetrieveOauthUserAction($dispatcher))->execute('github');

        Assert::assertNull($result);
    });

    it('creates socialite user model with normalized attributes', function (): void {
        $oauthUser = configureMock(SocialiteUserContract::class, function (MockInterface $mock): void {
            $mock->allows([
                'getId' => 'provider-user-1',
                'getName' => 'Mario Rossi',
                'getEmail' => 'mario.rossi@example.com',
                'getAvatar' => 'https://example.com/avatar.jpg',
            ]);
        });

        $user = configureMock(UserContract::class, function (MockInterface $mock): void {
            $mock->allows(['getKey' => 'user-1']);
        });

        $created = new SocialiteUser();

        $socialiteUserModel = configureMock(SocialiteUser::class, function (MockInterface $mock) use ($created): void {
            $mock->allows(['create' => $created]);
        });

        $result = (new CreateSocialiteUserAction($socialiteUserModel))->execute('github', $oauthUser, $user);

        Assert::assertSame($created, $result);
    });
});
