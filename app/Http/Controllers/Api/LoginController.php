<?php

<<<<<<< HEAD
declare(strict_types=1);
=======
>>>>>>> laraxot/dev
/**
 * This is the start of the PHP code block.
 */

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> laraxot/dev
namespace Modules\User\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
<<<<<<< HEAD
use Modules\Xot\Contracts\UserContract;
=======
use Modules\User\Models\BaseUser;
>>>>>>> laraxot/dev
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
            Assert::notNull($user = Auth::user(), '['.__LINE__.']['.class_basename($this).']');

<<<<<<< HEAD
            Assert::isInstanceOf($user, UserContract::class, '['.__LINE__.']['.class_basename($this).']');
=======
            Assert::isInstanceOf($user, BaseUser::class, '['.__LINE__.']['.class_basename($this).']');
>>>>>>> laraxot/dev

            $success = [];
            $success['token'] = $user->createToken('MyApp')->accessToken;
            $success['name'] = $user->name;

            return $this->sendResponse('User login successfully.', $success);
        }

        return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
    }
}
