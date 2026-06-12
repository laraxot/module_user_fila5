<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature\Actions;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Event;
use Modules\User\Actions\Socialite\LoginUserAction;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Events\SocialiteUserConnected;
use Modules\User\Models\SocialiteUser;
use Modules\User\Tests\TestCase;

class LoginUserActionTest extends TestCase
{
    public function testAuthenticatesConnectedSocialiteUserAndDispatchesEvent(): void
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

    public function testThrowsWhenRelatedUserIsNotAuthenticatable(): void
    {
        $socialiteUser = new SocialiteUser([
            'provider' => 'test-provider',
            'provider_id' => 'provider-id-2',
            'email' => 'not-authenticatable@example.com',
        ]);

        $socialiteUser->setRelation('user', new \stdClass());

        try {
            app(LoginUserAction::class)->execute($socialiteUser);
            $this->fail('Expected LogicException was not thrown');
        } catch (\LogicException $exception) {
            $this->assertSame('User instance must implement Authenticatable.', $exception->getMessage());
        }
    }
}
