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
 * Class LogoutController.
 *
 * This controller handles user logout functionality.
 */
class LogoutController extends XotBaseController
{
    /**
     * Logout the user.
     *
     * This method logs out the user by executing the LogoutUserAction and
     * handling any necessary cleanup tasks related to tokens and sessions.
     *
     * @param Request $request the incoming request containing the authenticated user
     *
     * @return JsonResponse a JSON response indicating the success of the logout operation
     */
    public function __invoke(Request $request): JsonResponse
    {
        Assert::notNull($user = $request->user(), '['.__LINE__.']['.class_basename($this).']');

        // Verificare che l'utente implementi l'interfaccia UserContract
        if (! $user instanceof UserContract) {
            throw new \InvalidArgumentException('L\'utente deve implementare l\'interfaccia UserContract');
        }

        app(LogoutUserAction::class)->execute($user);

        // Passport token cleanup deferred — see User module oauth refresh token ADR.
        // Assert::notNull($accessToken = $user->token(),'['.__LINE__.']['.class_basename($this).']');
        // if (method_exists($accessToken, 'getKey')) {
        //     OauthRefreshToken::where('access_token_id', $accessToken->getKey())->delete();
        // }
        // if (method_exists($accessToken, 'delete')) {
        //     $accessToken->delete();
        // }

        // Mobile device logout tracking deferred — see Device model lifecycle docs.
        // return response()->json([
        //     'message' => 'Successfully logged out',
        //     'session' => session()->all(),
        // ]);

        return JsonResponseData::from([
            'message' => 'logout succefully',
            // 'data' => $user->toArray(),
            'data' => session()->all(),
        ])->response();
    }
}
