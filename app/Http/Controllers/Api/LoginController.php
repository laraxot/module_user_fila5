<?php

/**
 * This is the start of the PHP code block.
 */

declare(strict_types=1);

namespace Modules\User\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
<<<<<<< HEAD
use Modules\Xot\Contracts\PassportHasApiTokensContract;
=======
use Modules\User\Models\BaseUser;
>>>>>>> 2024e2e7 (.)
use Modules\Xot\Http\Controllers\XotBaseController;
use Webmozart\Assert\Assert;

class LoginController extends XotBaseController
{
    /**
     * Login api.
     */
    public function __invoke(Request $request): JsonResponse
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
<<<<<<< HEAD
            Assert::notNull($user = Auth::user(), '[' . __LINE__ . '][' . class_basename($this) . ']');

            // Verificare che l'utente implementi l'interfaccia PassportHasApiTokensContract
            if (!($user instanceof PassportHasApiTokensContract)) {
                return $this->sendError('User model must implement PassportHasApiTokensContract interface', [
                    'error' => 'Configuration Error',
                ]);
            }
=======
            Assert::notNull($user = Auth::user(), '['.__LINE__.']['.class_basename($this).']');

            Assert::isInstanceOf($user, BaseUser::class, '['.__LINE__.']['.class_basename($this).']');
>>>>>>> 2024e2e7 (.)

            $success = [];
            $success['token'] = $user->createToken('MyApp')->accessToken;
            $success['name'] = $user->name;

            return $this->sendResponse('User login successfully.', $success);
        }

        return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
    }
}
