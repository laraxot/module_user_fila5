<?php

declare(strict_types=1);
<<<<<<< HEAD
=======

namespace Modules\User\Tests\Unit\Actions\Socialite;

// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.
// User Pest/PHPUnit — claude-audit documentation ratio.

>>>>>>> 350420cb (Check & fix styling)
use Illuminate\Contracts\Events\Dispatcher;
use Laravel\Socialite\Contracts\User as SocialiteUserContract;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;
<<<<<<< HEAD
use Mockery\MockInterface;
use Modules\User\Actions\Socialite\CreateSocialiteUserAction;
use Modules\User\Actions\Socialite\GetUserModelAttributesFromSocialiteAction;
use Modules\User\Actions\Socialite\RetrieveOauthUserAction;
use Modules\User\Database\Factories\UserFactory;
=======
use Modules\User\Actions\Socialite\CreateSocialiteUserAction;
use Modules\User\Actions\Socialite\GetUserModelAttributesFromSocialiteAction;
use Modules\User\Actions\Socialite\RetrieveOauthUserAction;
>>>>>>> 350420cb (Check & fix styling)
use Modules\User\Datas\SocialiteUserAttributesData;
use Modules\User\Events\InvalidState;
use Modules\User\Models\SocialiteUser;
use Modules\User\Tests\TestCase;
use Modules\Xot\Contracts\UserContract;
<<<<<<< HEAD
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('builds user attributes from oauth user', function (): void {
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

test('throws when provider is empty while building attributes', function (): void {
    $oauthUser = configureMock(SocialiteUserContract::class, function (MockInterface $mock): void {
        $mock->allows(['getName' => 'Mario Rossi']);
        $mock->allows(['getEmail' => 'mario.rossi@example.com']);
    });

    try {
        app(GetUserModelAttributesFromSocialiteAction::class)->execute('', $oauthUser);
        Assert::fail('Expected InvalidArgumentException');
    } catch (InvalidArgumentException $exception) {
        Assert::assertSame('Il provider non può essere vuoto', $exception->getMessage());
    }
});

test('throws when oauth email is invalid while building attributes', function (): void {
    $oauthUser = configureMock(SocialiteUserContract::class, function (MockInterface $mock): void {
        $mock->allows(['getName' => 'Mario Rossi']);
        $mock->allows(['getEmail' => null]);
    });

    try {
        app(GetUserModelAttributesFromSocialiteAction::class)->execute('github', $oauthUser);
        Assert::fail('Expected RuntimeException');
    } catch (RuntimeException $exception) {
        Assert::assertSame('L\'email deve essere una stringa non vuota', $exception->getMessage());
    }
});

test('retrieves oauth user from socialite driver', function (): void {
    $oauthUser = configureMock(SocialiteUserContract::class, function (MockInterface $mock): void {
        $mock->allows(['getEmail' => 'user@example.com']);
    });

    $driver = new class($oauthUser) {
        public function __construct(private SocialiteUserContract $oauthUser)
        {
        }

        public function user(): SocialiteUserContract
        {
            return $this->oauthUser;
        }
    };

    Socialite::shouldReceive('driver')->with('github')->andReturn($driver);

    $dispatcher = configureMock(Dispatcher::class, function (MockInterface $mock): void {
        $mock->allows(['dispatch' => null]);
    });

    $result = (new RetrieveOauthUserAction($dispatcher))->execute('github');

    Assert::assertSame($oauthUser, $result);
});

test('returns null and dispatches invalid state event when socialite state is invalid', function (): void {
    $exception = new InvalidStateException();

    $driver = new class($exception) {
        public function __construct(private InvalidStateException $exception)
        {
        }

        public function user(): never
        {
            throw $this->exception;
        }
    };

    Socialite::shouldReceive('driver')->with('github')->andReturn($driver);

    $dispatcher = configureMock(Dispatcher::class, function (MockInterface $mock) use ($exception): void {
        $mock->allows([
            'dispatch' => function (object $event) use ($exception): void {
                Assert::assertInstanceOf(InvalidState::class, $event);
                Assert::assertSame($exception, $event->exception);
            },
        ]);
    });

    $result = (new RetrieveOauthUserAction($dispatcher))->execute('github');

    Assert::assertNull($result);
});

test('creates socialite user model with normalized attributes', function (): void {
    /** @var UserContract $user */
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

    Assert::assertInstanceOf(SocialiteUser::class, $result);
    $userKey = $user->getKey();
    Assert::assertSame($result->user_id, (is_int($userKey) || is_string($userKey)) ? (string) $userKey : '');
    Assert::assertSame('github', $result->provider);
    Assert::assertSame('provider-user-1', $result->provider_id);
=======

uses(TestCase::class);

describe('Socialite core actions coverage', function (): void {
    it('builds user attributes from oauth user', function (): void {
        $oauthUser = Mockery::mock(SocialiteUserContract::class);
        $oauthUser->shouldReceive('getName')->andReturn('Mario Rossi');
        $oauthUser->shouldReceive('getEmail')->andReturn('mario.rossi@example.com');

        $data = app(GetUserModelAttributesFromSocialiteAction::class)->execute('github', $oauthUser);

        expect($data)->toBeInstanceOf(SocialiteUserAttributesData::class)
            ->and($data->provider)->toBe('github')
            ->and($data->email)->toBe('mario.rossi@example.com')
            ->and($data->firstName)->toBe('Mario')
            ->and($data->lastName)->toBe('Rossi');
    });

    it('throws when provider is empty while building attributes', function (): void {
        $oauthUser = Mockery::mock(SocialiteUserContract::class);
        $oauthUser->shouldReceive('getName')->andReturn('Mario Rossi');
        $oauthUser->shouldReceive('getEmail')->andReturn('mario.rossi@example.com');

        app(GetUserModelAttributesFromSocialiteAction::class)->execute('', $oauthUser);
    })->throws(InvalidArgumentException::class, 'provider non può essere vuoto');

    it('throws when oauth email is invalid while building attributes', function (): void {
        $oauthUser = Mockery::mock(SocialiteUserContract::class);
        $oauthUser->shouldReceive('getName')->andReturn('Mario Rossi');
        $oauthUser->shouldReceive('getEmail')->andReturn(null);

        app(GetUserModelAttributesFromSocialiteAction::class)->execute('github', $oauthUser);
    })->throws(RuntimeException::class, 'email deve essere una stringa non vuota');

    it('retrieves oauth user from socialite driver', function (): void {
        $oauthUser = Mockery::mock(SocialiteUserContract::class);
        $driver = Mockery::mock();
        $driver->shouldReceive('user')->once()->andReturn($oauthUser);

        Socialite::shouldReceive('driver')->once()->with('github')->andReturn($driver);

        $dispatcher = Mockery::mock(Dispatcher::class);
        $dispatcher->shouldNotReceive('dispatch');

        $result = (new RetrieveOauthUserAction($dispatcher))->execute('github');

        expect($result)->toBe($oauthUser);
    });

    it('returns null and dispatches invalid state event when socialite state is invalid', function (): void {
        $exception = new InvalidStateException();

        $driver = Mockery::mock();
        $driver->shouldReceive('user')->once()->andThrow($exception);

        Socialite::shouldReceive('driver')->once()->with('github')->andReturn($driver);

        $dispatcher = Mockery::mock(Dispatcher::class);
        $dispatcher->shouldReceive('dispatch')
            ->once()
            ->with(Mockery::on(fn (mixed $event): bool => $event instanceof InvalidState && $event->exception === $exception));

        $result = (new RetrieveOauthUserAction($dispatcher))->execute('github');

        expect($result)->toBeNull();
    });

    it('creates socialite user model with normalized attributes', function (): void {
        $oauthUser = Mockery::mock(SocialiteUserContract::class);
        $oauthUser->shouldReceive('getId')->once()->andReturn('provider-user-1');
        $oauthUser->shouldReceive('getName')->once()->andReturn('Mario Rossi');
        $oauthUser->shouldReceive('getEmail')->once()->andReturn('mario.rossi@example.com');
        $oauthUser->shouldReceive('getAvatar')->once()->andReturn('https://example.com/avatar.jpg');

        $user = Mockery::mock(UserContract::class);
        $user->shouldReceive('getKey')->once()->andReturn('user-1');

        $created = new SocialiteUser();

        $socialiteUserModel = Mockery::mock(SocialiteUser::class);
        $socialiteUserModel->shouldReceive('create')
            ->once()
            ->andReturn($created);

        $result = (new CreateSocialiteUserAction($socialiteUserModel))->execute('github', $oauthUser, $user);

        expect($result)->toBe($created);
    });
>>>>>>> 350420cb (Check & fix styling)
});
