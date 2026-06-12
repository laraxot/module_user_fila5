<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Actions\Socialite;

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
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\SocialiteUser;
use Modules\User\Tests\TestCase;
use RuntimeException;

class SocialiteCoreActionsCoverageTest extends TestCase
{
    public function test_builds_user_attributes_from_oauth_user(): void
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

    public function test_throws_when_provider_is_empty_while_building_attributes(): void
    {
        $oauthUser = configureMock(SocialiteUserContract::class, function (MockInterface $mock): void {
            $mock->allows(['getName' => 'Mario Rossi']);
            $mock->allows(['getEmail' => 'mario.rossi@example.com']);
        });

        try {
            app(GetUserModelAttributesFromSocialiteAction::class)->execute('', $oauthUser);
            $this->fail('Expected InvalidArgumentException was not thrown');
        } catch (InvalidArgumentException $exception) {
            $this->assertSame('Il provider non può essere vuoto', $exception->getMessage());
        }
    }

    public function test_throws_when_oauth_email_is_invalid_while_building_attributes(): void
    {
        $oauthUser = configureMock(SocialiteUserContract::class, function (MockInterface $mock): void {
            $mock->allows(['getName' => 'Mario Rossi']);
            $mock->allows(['getEmail' => null]);
        });

        try {
            app(GetUserModelAttributesFromSocialiteAction::class)->execute('github', $oauthUser);
            $this->fail('Expected RuntimeException was not thrown');
        } catch (RuntimeException $exception) {
            $this->assertSame('L\'email deve essere una stringa non vuota', $exception->getMessage());
        }
    }

    public function test_retrieves_oauth_user_from_socialite_driver(): void
    {
        $oauthUser = configureMock(SocialiteUserContract::class, function (MockInterface $mock): void {
            $mock->allows(['getEmail' => 'user@example.com']);
        });

        $driver = Mockery::mock();
        /** @phpstan-ignore-next-line */
        $driver->shouldReceive('user')->once()->andReturn($oauthUser);

        Socialite::shouldReceive('driver')->with('github')->andReturn($driver);

        $dispatcher = configureMock(Dispatcher::class, function (MockInterface $mock): void {
            $mock->allows(['dispatch' => null]);
        });

        $result = (new RetrieveOauthUserAction($dispatcher))->execute('github');

        $this->assertSame($oauthUser, $result);
    }

    public function test_returns_null_and_dispatches_invalid_state_event_when_socialite_state_is_invalid(): void
    {
        $exception = new InvalidStateException();

        $driver = Mockery::mock();
        /** @phpstan-ignore-next-line */
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

    public function test_creates_socialite_user_model_with_normalized_attributes(): void
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
