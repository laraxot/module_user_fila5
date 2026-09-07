<?php

declare(strict_types=1);

namespace Modules\User\Actions\User;

<<<<<<< HEAD
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
=======
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Hashing\Hasher;
>>>>>>> 2024e2e7 (.)
use Modules\User\Models\User;
use Spatie\QueueableAction\QueueableAction;

class DeleteUserAction
{
    use QueueableAction;

<<<<<<< HEAD
    /**
     * Elimina l'utente dopo aver verificato la password.
     *
     * @param User $user L'utente da eliminare
=======
    public function __construct(
        private readonly Hasher $hasher,
        private readonly Guard $authGuard,
    ) {
    }

    /**
     * Elimina l'utente dopo aver verificato la password.
     *
     * @param User   $user            L'utente da eliminare
>>>>>>> 2024e2e7 (.)
     * @param string $confirmPassword La password di conferma
     *
     * @return array{success: bool, message: string} Risultato dell'operazione
     */
    public function execute(User $user, string $confirmPassword): array
    {
<<<<<<< HEAD
        if (!Hash::check($confirmPassword, $user->password)) {
=======
        if (! $this->hasher->check($confirmPassword, $user->password)) {
>>>>>>> 2024e2e7 (.)
            return [
                'success' => false,
                'message' => 'La password inserita non è corretta',
            ];
        }

        try {
<<<<<<< HEAD
            Auth::logout();
=======
            $this->authGuard->logout();
>>>>>>> 2024e2e7 (.)
            $user->delete();

            return [
                'success' => true,
                'message' => 'Account eliminato con successo',
            ];
<<<<<<< HEAD
        } catch (Exception $e) {
=======
        } catch (\Exception $e) {
>>>>>>> 2024e2e7 (.)
            return [
                'success' => false,
                'message' => 'Si è verificato un errore durante l\'eliminazione dell\'account',
            ];
        }
    }
}
