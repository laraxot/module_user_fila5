<?php

declare(strict_types=1);

namespace Modules\User\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\Authenticatable;
<<<<<<< HEAD
=======
use Modules\Predict\Models\Profile;
>>>>>>> laraxot/dev

/**
 * Listener per assegnare crediti iniziali gratuiti ai nuovi utenti.
 *
 * Richiede il modulo Predict con Profile (credits). Se assente, non esegue nulla.
 */
class AssignFreeCreditsListener
{
    /**
     * Crediti iniziali gratuiti per nuovi utenti.
     */
<<<<<<< HEAD
    private const FREE_STARTING_CREDITS = 500;
=======
    private const int FREE_STARTING_CREDITS = 500;
>>>>>>> laraxot/dev

    /**
     * Handle the event.
     */
    public function handle(Registered $event): void
    {
        if (! class_exists('Modules\\Predict\\Models\\Profile')) {
            return;
        }

        $user = $event->user;
        if (! $user instanceof Authenticatable) {
            return;
        }

        $userId = $user->getAuthIdentifier();
<<<<<<< HEAD
        if (null === $userId) {
            return;
        }

        /** @var \Modules\Predict\Models\Profile $profile */
        $profile = \Modules\Predict\Models\Profile::firstOrCreate(
=======
        if ($userId === null) {
            return;
        }

        /** @var Profile $profile */
        $profile = Profile::firstOrCreate(
>>>>>>> laraxot/dev
            ['user_id' => $userId],
            ['credits' => self::FREE_STARTING_CREDITS]
        );

<<<<<<< HEAD
        if (0 === $profile->credits) {
=======
        if ($profile->credits === 0) {
>>>>>>> laraxot/dev
            $profile->update(['credits' => self::FREE_STARTING_CREDITS]);
        }
    }
}
