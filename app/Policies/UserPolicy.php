<?php

declare(strict_types=1);

namespace Modules\User\Policies;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\User\Models\User;

class UserPolicy
{
    public function view(?Authenticatable $user, User $model): bool
    {
        return true;
    }

    public function create(?Authenticatable $user): bool
    {
        return true;
    }

    public function update(?Authenticatable $user, User $model): bool
    {
        return $user !== null && $user->id === $model->id;
    }

    public function delete(?Authenticatable $user, User $model): bool
    {
        return $user !== null && $user->id === $model->id;
    }
}
