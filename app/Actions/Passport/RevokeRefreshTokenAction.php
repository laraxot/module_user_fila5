<?php

declare(strict_types=1);

namespace Modules\User\Actions\Passport;

use Modules\User\Models\OauthRefreshToken;
use Spatie\QueueableAction\QueueableAction;

/**
 * RevokeRefreshTokenAction: Revoca un refresh token OAuth2.
 */
class RevokeRefreshTokenAction
{
    use QueueableAction;

    public function __construct(
        private readonly OauthRefreshToken $refreshTokenModel,
<<<<<<< HEAD
    ) {}
=======
    ) {
    }
>>>>>>> laraxot/dev

    /**
     * Revoca un refresh token OAuth2.
     *
<<<<<<< HEAD
     * @param  OauthRefreshToken|string  $token  Il token da revocare (istanza o ID)
=======
     * @param OauthRefreshToken|string $token Il token da revocare (istanza o ID)
     *
>>>>>>> laraxot/dev
     * @return bool True se il token è stato revocato con successo
     */
    public function execute(OauthRefreshToken|string $token): bool
    {
        if (is_string($token)) {
            $token = $this->refreshTokenModel->find($token);
        }

        if (! $token instanceof OauthRefreshToken) {
            return false;
        }

        $token->setAttribute('revoked', true);
        $token->save();

        return true;
    }
}
