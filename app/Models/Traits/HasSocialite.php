<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\User\Models\SocialiteUser;
<<<<<<< HEAD
use Modules\Xot\Actions\Cast\SafeStringCastAction;
=======
>>>>>>> laraxot/dev

trait HasSocialite
{
    /**
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
        if ($socialiteUser === null) {
=======
        if (null === $socialiteUser) {
>>>>>>> laraxot/dev
            throw new \Exception('SocialiteUser not found');
        }

        $res = $socialiteUser->{$field};

<<<<<<< HEAD
        return SafeStringCastAction::cast($res);
=======
        return (string) $res;
>>>>>>> laraxot/dev
    }

    public function canAccessSocialite(): bool
    {
        return true;
    }
}
