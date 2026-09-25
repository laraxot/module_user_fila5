<?php

declare(strict_types=1);

namespace Modules\User\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\Authenticatable;
<<<<<<< HEAD
use Modules\Predict\Models\Profile;
=======
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
    private const int FREE_STARTING_CREDITS = 500;
=======
    private const FREE_STARTING_CREDITS = 500;
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
        if ($userId === null) {
            return;
        }

        /** @var Profile $profile */
        $profile = Profile::firstOrCreate(
=======
        if (null === $userId) {
            return;
        }

        /** @var \Modules\Predict\Models\Profile $profile */
        $profile = \Modules\Predict\Models\Profile::firstOrCreate(
>>>>>>> laraxot/dev
            ['user_id' => $userId],
            ['credits' => self::FREE_STARTING_CREDITS]
        );

<<<<<<< HEAD
        if ($profile->credits === 0) {
=======
        if (0 === $profile->credits) {
>>>>>>> laraxot/dev
            $profile->update(['credits' => self::FREE_STARTING_CREDITS]);
        }
    }
}
