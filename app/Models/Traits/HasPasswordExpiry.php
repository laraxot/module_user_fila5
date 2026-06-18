<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

use Illuminate\Database\Eloquent\Model;
use Modules\User\Datas\PasswordData;

trait HasPasswordExpiry
{
    public static function bootHasPasswordExpiry(): void
    {
        $pwd = PasswordData::make();

        static::creating(function ($model) use ($pwd): void {
            if (! $model instanceof Model) {
                return;
            }

            if (filled($model->getAttribute('password'))) {
                $model->setAttribute('password_expires_at', now()->addDays($pwd->expires_in));
            }
        });

        static::updating(function ($model) use ($pwd): void {
            if (! $model instanceof Model) {
                return;
            }

            if ($model->isDirty('password') && filled($model->getAttribute('password'))) {
                $model->setAttribute('password_expires_at', now()->addDays($pwd->expires_in));
            }
        });
    }
}
