<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

use Illuminate\Support\Str;

trait BaseUserUniqueNameAttribute
{
    public function getNameAttribute(?string $value): string
    {
        if ($value !== null) {
            return $value;
        }

        if ($this->getKey() === null) {
            return $this->email ?? 'User';
        }

        $name = Str::of((string) $this->email)->before('@')->toString();
        $candidate = $name.'-1';

        if ($this->shouldAvoidNamePersistenceDuringTests()) {
            $this->attributes['name'] = $candidate;

            return $candidate;
        }

        try {
            $uniqueName = $this->resolveUniqueUserName($name);

            $this->update(['name' => $uniqueName]);

            return $uniqueName;
        } catch (\Throwable) {
            $this->attributes['name'] = $candidate;

            return $candidate;
        }
    }

    protected function shouldAvoidNamePersistenceDuringTests(): bool
    {
        $app = app();
        if (method_exists($app, 'environment') && $app->environment('testing')) {
            return true;
        }

        return \PHP_SAPI === 'cli' && (getenv('APP_ENV') === 'testing' || getenv('ENV') === 'testing');
    }

    protected function resolveUniqueUserName(string $name): string
    {
        $i = 1;
        $value = $name.'-'.$i;

        while (static::firstWhere(['name' => $value]) !== null) {
            $i++;
            $value = $name.'-'.$i;
        }

        return $value;
    }
}
