<?php

/**
 * Handles the registration of a new user.
 *
 * This endpoint accepts a POST request with the following parameters:
 * - `name`: the name of the user
 * - `email`: the email address of the user
 * - `password`: the password for the user
 * - `c_password`: the confirmation password, must match the `password` field
 *
 * If the validation passes, a new user is created and a success response is returned with the user's name and an access token.
 * If the validation fails, an error response is returned with the validation errors.
 *
<<<<<<< HEAD
<<<<<<< HEAD
 * @param Request $request The incoming request
 * @return JsonResponse The JSON response
 */
=======
=======
>>>>>>> f589f9b2 (.)
 * @param  Request  $request  The incoming request
 * @return JsonResponse The JSON response
 */

<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
declare(strict_types=1);

namespace Modules\User\Http\Controllers\Api;

<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Datas\XotData;
use Modules\Xot\Contracts\UserContract;
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password as PasswordRule;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
>>>>>>> 2024e2e7 (.)
=======
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
>>>>>>> f589f9b2 (.)
use Modules\Xot\Http\Controllers\XotBaseController;

class RegisterController extends XotBaseController
{
    /**
     * Register api.
     */
    public function __invoke(Request $request): JsonResponse
    {
        $success = [];
        $messages = __('user::validation');
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email',
                // 'password' => 'required',
                'password' => ['required', PasswordRule::defaults()],
                'c_password' => 'required|same:password',
            ],
            $messages,
        );
        if ($validator->fails()) {
<<<<<<< HEAD
<<<<<<< HEAD
            return $this->sendError('Validation Error.', $validator->errors()->all());
=======
            return $this->sendError('Validation Error.', $validator->errors()->toArray());
>>>>>>> 2024e2e7 (.)
=======
            return $this->sendError('Validation Error.', $validator->errors()->toArray());
>>>>>>> f589f9b2 (.)
        }

        /** @var array<string, mixed> $input */
        $input = $request->all();
<<<<<<< HEAD
<<<<<<< HEAD
        $input['password'] = bcrypt((string) $input['password']);
=======
=======
>>>>>>> f589f9b2 (.)
        $password = $input['password'] ?? null;
        if (! \is_string($password)) {
            return $this->sendError('Validation Error.', ['password' => ['The password must be a string.']]);
        }
        $input['password'] = bcrypt($password);
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
        $user_class = XotData::make()->getUserClass();
        /** @var UserContract */
        $user = $user_class::create($input);
        $success['token'] = $user->createToken('MyApp')->accessToken;
<<<<<<< HEAD
<<<<<<< HEAD
        $success['name'] = $user->name;
=======
        $success['name'] = $user->name ?? '';
>>>>>>> 2024e2e7 (.)
=======
        $success['name'] = $user->name ?? '';
>>>>>>> f589f9b2 (.)

        return $this->sendResponse('User register successfully.', $success);
    }
}
