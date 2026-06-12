<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature\Actions;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Event;
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
}
