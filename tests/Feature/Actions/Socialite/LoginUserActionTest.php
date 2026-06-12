<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature\Actions\Socialite;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Event;
use InvalidArgumentException;
use LogicException;
use Modules\User\Actions\Socialite\LoginUserAction;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Events\SocialiteUserConnected;
use Modules\User\Models\SocialiteUser;
use Modules\User\Tests\TestCase;
use stdClass;

class LoginUserActionTest extends TestCase
{
    public function test_authenticates_connected_socialite_user_and_dispatches_event(): void
    {
        Event::fake([SocialiteUserConnected::class]);

        $user = UserFactory::new()->createOne();

        $socialiteUser = new SocialiteUser([
            'provider' => 'test-provider',
            'provider_id' => 'provider-id-1',
            'email' => (string) $user->email,
        ]);
        $socialiteUser->setRelation('user', $user);

        $response = app(LoginUserAction::class)->execute($socialiteUser);

        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertAuthenticatedAs($user);

        Event::assertDispatched(SocialiteUserConnected::class);
    }

    public function test_throws_when_related_user_is_not_authenticatable(): void
    {
        $socialiteUser = new SocialiteUser([
            'provider' => 'test-provider',
            'provider_id' => 'provider-id-2',
            'email' => 'not-authenticatable@example.com',
        ]);

        $socialiteUser->setRelation('user', new stdClass());

        try {
            app(LoginUserAction::class)->execute($socialiteUser);
            $this->fail('Expected LogicException was not thrown');
        } catch (LogicException $exception) {
            $this->assertSame('User instance must implement Authenticatable.', $exception->getMessage());
        }
    }

    public function test_redirects_to_intended_page_when_available(): void
    {
        $user = UserFactory::new()->createOne();

        $socialiteUser = new SocialiteUser([
            'provider' => 'google',
            'provider_id' => 'google-123',
            'email' => (string) $user->email,
        ]);
        $socialiteUser->setRelation('user', $user);

        $response = app(LoginUserAction::class)->execute($socialiteUser);

        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertAuthenticatedAs($user);
    }

    public function test_dispatches_event_with_correct_socialite_user_instance(): void
    {
        Event::fake();

        $user = UserFactory::new()->createOne();

        $socialiteUser = new SocialiteUser([
            'provider' => 'github',
            'provider_id' => 'github-456',
            'email' => (string) $user->email,
        ]);
        $socialiteUser->setRelation('user', $user);

        app(LoginUserAction::class)->execute($socialiteUser);

        Event::assertDispatched(SocialiteUserConnected::class, function (SocialiteUserConnected $event) use ($socialiteUser): bool {
            return $event->socialiteUser->provider === $socialiteUser->provider
                && $event->socialiteUser->provider_id === $socialiteUser->provider_id;
        });
    }

    public function test_authenticates_different_users_independently(): void
    {
        $user1 = UserFactory::new()->createOne(['email' => 'user1-'.uniqid().'@example.com']);
        $user2 = UserFactory::new()->createOne(['email' => 'user2-'.uniqid().'@example.com']);

        $socialiteUser1 = new SocialiteUser([
            'provider' => 'google',
            'provider_id' => 'google-1',
            'email' => (string) $user1->email,
        ]);
        $socialiteUser1->setRelation('user', $user1);

        $socialiteUser2 = new SocialiteUser([
            'provider' => 'google',
            'provider_id' => 'google-2',
            'email' => (string) $user2->email,
        ]);
        $socialiteUser2->setRelation('user', $user2);

        app(LoginUserAction::class)->execute($socialiteUser1);
        $this->assertAuthenticatedAs($user1);

        app(LoginUserAction::class)->execute($socialiteUser2);
        $this->assertAuthenticatedAs($user2);
    }

    public function test_returns_redirect_response_instance(): void
    {
        $user = UserFactory::new()->createOne();

        $socialiteUser = new SocialiteUser([
            'provider' => 'test',
            'provider_id' => 'test-789',
            'email' => (string) $user->email,
        ]);
        $socialiteUser->setRelation('user', $user);

        $response = app(LoginUserAction::class)->execute($socialiteUser);

        $this->assertInstanceOf(RedirectResponse::class, $response);
    }

    public function test_handles_null_user_assertion_gracefully(): void
    {
        $socialiteUser = new SocialiteUser([
            'provider' => 'test',
            'provider_id' => 'test-null',
            'email' => 'test-null-'.uniqid().'@example.com',
        ]);
        $socialiteUser->setRelation('user', null);

        try {
            app(LoginUserAction::class)->execute($socialiteUser);
            $this->fail('Expected InvalidArgumentException was not thrown');
        } catch (InvalidArgumentException $exception) {
            $this->assertInstanceOf(InvalidArgumentException::class, $exception);
        }
    }

    public function test_preserves_user_attributes_after_login(): void
    {
        $user = UserFactory::new()->createOne([
            'email' => 'preserve-'.uniqid().'@example.com',
            'name' => 'John Doe',
            'is_active' => true,
        ]);

        $socialiteUser = new SocialiteUser([
            'provider' => 'oauth',
            'provider_id' => 'oauth-'.uniqid(),
            'email' => (string) $user->email,
        ]);
        $socialiteUser->setRelation('user', $user);

        app(LoginUserAction::class)->execute($socialiteUser);

        $authenticatedUser = auth()->user();
        $this->assertNotNull($authenticatedUser);
        $this->assertSame($user->email, $authenticatedUser->email);
        $this->assertSame($user->name, $authenticatedUser->name);
        $this->assertTrue($authenticatedUser->is_active);
    }
}
