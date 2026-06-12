<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Actions\Socialite;

use Illuminate\Contracts\Events\Dispatcher;
use Laravel\Socialite\Contracts\User as SocialiteUserContract;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;
use Mockery\MockInterface;
use Modules\User\Actions\Socialite\CreateSocialiteUserAction;
use Modules\User\Actions\Socialite\GetUserModelAttributesFromSocialiteAction;
use Modules\User\Actions\Socialite\RetrieveOauthUserAction;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Datas\SocialiteUserAttributesData;
use Modules\User\Events\InvalidState;
use Modules\User\Models\SocialiteUser;
use Modules\User\Tests\TestCase;

class SocialiteCoreActionsCoverageTest extends TestCase
{
    public function testBuildsUserAttributesFromOauthUser(): void
    {
        $oauthUser = configureMock(SocialiteUserContract::class, function (MockInterface $mock): void {
            $mock->allows(['getName' => 'Mario Rossi']);
            $mock->allows(['getEmail' => 'mario.rossi@example.com']);
        });

        $data = app(GetUserModelAttributesFromSocialiteAction::class)->execute('github', $oauthUser);

        $this->assertInstanceOf(SocialiteUserAttributesData::class, $data);
        $this->assertSame('github', $data->provider);
        $this->assertSame('mario.rossi@example.com', $data->email);
        $this->assertSame('Mario', $data->firstName);
        $this->assertSame('Rossi', $data->lastName);
    }

    public function testThrowsWhenProviderIsEmptyWhileBuildingAttributes(): void
    {
        $oauthUser = configureMock(SocialiteUserContract::class, function (MockInterface $mock): void {
            $mock->allows(['getName' => 'Mario Rossi']);
            $mock->allows(['getEmail' => 'mario.rossi@example.com']);
        });

        try {
            app(GetUserModelAttributesFromSocialiteAction::class)->execute('', $oauthUser);
            $this->fail('Expected InvalidArgumentException was not thrown');
        } catch (\InvalidArgumentException $exception) {
            $this->assertSame('Il provider non può essere vuoto', $exception->getMessage());
        }
    }

    public function testThrowsWhenOauthEmailIsInvalidWhileBuildingAttributes(): void
    {
        $oauthUser = configureMock(SocialiteUserContract::class, function (MockInterface $mock): void {
            $mock->allows(['getName' => 'Mario Rossi']);
            $mock->allows(['getEmail' => null]);
        });

        try {
            app(GetUserModelAttributesFromSocialiteAction::class)->execute('github', $oauthUser);
            $this->fail('Expected RuntimeException was not thrown');
        } catch (\RuntimeException $exception) {
            $this->assertSame('L\'email deve essere una stringa non vuota', $exception->getMessage());
        }
    }

    public function testRetrievesOauthUserFromSocialiteDriver(): void
    {
        $oauthUser = configureMock(SocialiteUserContract::class, function (MockInterface $mock): void {
            $mock->allows(['getEmail' => 'user@example.com']);
        });

        $driver = \Mockery::mock();
        /* @phpstan-ignore-next-line */
        $driver->shouldReceive('user')->once()->andReturn($oauthUser);

        Socialite::shouldReceive('driver')->with('github')->andReturn($driver);

        $dispatcher = configureMock(Dispatcher::class, function (MockInterface $mock): void {
            $mock->allows(['dispatch' => null]);
        });

        $result = (new RetrieveOauthUserAction($dispatcher))->execute('github');

        $this->assertSame($oauthUser, $result);
    }

    public function testReturnsNullAndDispatchesInvalidStateEventWhenSocialiteStateIsInvalid(): void
    {
        $exception = new InvalidStateException();

        $driver = \Mockery::mock();
        /* @phpstan-ignore-next-line */
        $driver->shouldReceive('user')->once()->andThrow($exception);

        Socialite::shouldReceive('driver')->with('github')->andReturn($driver);

        $dispatcher = configureMock(Dispatcher::class, function (MockInterface $mock) use ($exception): void {
            $mock->allows([
                'dispatch' => function (mixed $event) use ($exception): void {
                    $this->assertInstanceOf(InvalidState::class, $event);
                    $this->assertSame($exception, $event->exception);
                },
            ]);
        });

        $result = (new RetrieveOauthUserAction($dispatcher))->execute('github');

        $this->assertNull($result);
    }

    public function testCreatesSocialiteUserModelWithNormalizedAttributes(): void
    {
        /** @var \Modules\Xot\Contracts\UserContract $user */
        $user = UserFactory::new()->createOne();

        $oauthUser = configureMock(SocialiteUserContract::class, function (MockInterface $mock): void {
            $mock->allows([
                'getId' => 'provider-user-1',
                'getName' => 'Mario Rossi',
                'getEmail' => 'mario.rossi@example.com',
                'getAvatar' => 'https://example.com/avatar.jpg',
            ]);
        });

        $result = app(CreateSocialiteUserAction::class)->execute('github', $oauthUser, $user);

        $this->assertInstanceOf(SocialiteUser::class, $result);
        $this->assertSame((string) $user->getKey(), (string) $result->user_id);
        $this->assertSame('github', $result->provider);
        $this->assertSame('provider-user-1', $result->provider_id);
    }
}
