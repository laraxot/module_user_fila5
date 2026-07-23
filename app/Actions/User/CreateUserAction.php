<?php

declare(strict_types=1);

namespace Modules\User\Actions\User;

use Modules\User\Datas\CreateUserData;
use Modules\User\Models\User;
use Spatie\QueueableAction\QueueableAction;

class CreateUserAction
{
    use QueueableAction;

    /**
     * Create a new user.
     */
    public function execute(CreateUserData $data): User
    {
        $attributes = [];
        foreach ($data->toArray() as $key => $value) {
            $attributes[(string) $key] = $value;
        }

        // Use app() to resolve the User model instance
        return app(User::class)->create($attributes);
    }
}
