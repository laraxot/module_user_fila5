<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\User\Models\SocialiteUser;

trait HasSocialite
{
    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Get the socialite users associated with the user.
     *
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
     * @return HasMany<SocialiteUser, $this>
     */
    public function socialiteUsers(): HasMany
    {
        return $this->hasMany(SocialiteUser::class);
    }

    public function getProviderField(string $provider, string $field): string
    {
        $socialiteUser = $this->socialiteUsers()->firstWhere(['provider' => $provider]);
<<<<<<< HEAD
<<<<<<< HEAD
        if (null === $socialiteUser) {
=======
        if ($socialiteUser === null) {
>>>>>>> 2024e2e7 (.)
=======
        if ($socialiteUser === null) {
>>>>>>> f589f9b2 (.)
            throw new \Exception('SocialiteUser not found');
        }

        $res = $socialiteUser->{$field};

<<<<<<< HEAD
<<<<<<< HEAD
        return (string) $res;
=======
=======
>>>>>>> f589f9b2 (.)
        if (\is_scalar($res) || $res instanceof \Stringable) {
            return (string) $res;
        }

        throw new \Exception(\sprintf('SocialiteUser field "%s" is not stringable', $field));
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    }

    public function canAccessSocialite(): bool
    {
        return true;
    }
}
