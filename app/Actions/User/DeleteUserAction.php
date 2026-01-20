<?php

declare(strict_types=1);

namespace Modules\User\Actions\User;

<<<<<<< HEAD
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Hashing\Hasher;
=======
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
>>>>>>> f548be94 (.)
use Modules\User\Models\User;
use Spatie\QueueableAction\QueueableAction;

class DeleteUserAction
{
    use QueueableAction;

<<<<<<< HEAD
    public function __construct(
        private readonly Hasher $hasher,
        private readonly Guard $authGuard,
    ) {
    }

    /**
     * Elimina l'utente dopo aver verificato la password.
     *
     * @param User   $user            L'utente da eliminare
=======
    /**
     * Elimina l'utente dopo aver verificato la password.
     *
     * @param User $user L'utente da eliminare
>>>>>>> f548be94 (.)
     * @param string $confirmPassword La password di conferma
     *
     * @return array{success: bool, message: string} Risultato dell'operazione
     */
    public function execute(User $user, string $confirmPassword): array
    {
<<<<<<< HEAD
        if (! $this->hasher->check($confirmPassword, $user->password)) {
=======
        if (!Hash::check($confirmPassword, $user->password)) {
>>>>>>> f548be94 (.)
            return [
                'success' => false,
                'message' => 'La password inserita non è corretta',
            ];
        }

        try {
<<<<<<< HEAD
            $this->authGuard->logout();
=======
            Auth::logout();
>>>>>>> f548be94 (.)
            $user->delete();

            return [
                'success' => true,
                'message' => 'Account eliminato con successo',
            ];
<<<<<<< HEAD
        } catch (\Exception $e) {
=======
        } catch (Exception $e) {
>>>>>>> f548be94 (.)
            return [
                'success' => false,
                'message' => 'Si è verificato un errore durante l\'eliminazione dell\'account',
            ];
        }
    }
}
