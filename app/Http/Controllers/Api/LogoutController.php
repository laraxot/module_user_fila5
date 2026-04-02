<?php

declare(strict_types=1);

namespace Modules\User\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\User\Actions\Socialite\LogoutUserAction;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\JsonResponseData;
use Modules\Xot\Http\Controllers\XotBaseController;
use Webmozart\Assert\Assert;

/**
 * Handle API logout for the current authenticated user.
 */
class LogoutController extends XotBaseController
{
    public function __invoke(Request $request): JsonResponse
    {
        Assert::notNull($user = $request->user(), '['.__LINE__.']['.class_basename($this).']');
        Assert::isInstanceOf($user, UserContract::class, 'The authenticated user must implement UserContract.');

        app(LogoutUserAction::class)->execute($user);

        if ($request->hasSession()) {
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return JsonResponseData::from([
            'message' => 'Successfully logged out.',
            'data' => [
                'user_id' => (string) $user->getKey(),
            ],
        ])->response();
    }
}
