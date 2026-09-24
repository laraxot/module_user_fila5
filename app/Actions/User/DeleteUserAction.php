<?php

declare(strict_types=1);

namespace Modules\User\Actions\User;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Hashing\Hasher;
<<<<<<< HEAD
use Modules\User\Contracts\UserContract;
=======
use Modules\User\Models\User;
>>>>>>> 350420cb (Check & fix styling)
use Spatie\QueueableAction\QueueableAction;

class DeleteUserAction
{
    use QueueableAction;

    public function __construct(
        private readonly Hasher $hasher,
        private readonly Guard $authGuard,
    ) {
    }

    /**
     * Elimina l'utente dopo aver verificato la password.
     *
<<<<<<< HEAD
     * @return array{success: bool, message: string}
     */
    public function execute(UserContract $user, string $confirmPassword): array
    {
        $hashedPassword = $user->getAttribute('password');
        if (! is_string($hashedPassword) || ! $this->hasher->check($confirmPassword, $hashedPassword)) {
=======
     * @param User   $user            L'utente da eliminare
     * @param string $confirmPassword La password di conferma
     *
     * @return array{success: bool, message: string} Risultato dell'operazione
     */
    public function execute(User $user, string $confirmPassword): array
    {
        if (! $this->hasher->check($confirmPassword, $user->password)) {
>>>>>>> 350420cb (Check & fix styling)
            return [
                'success' => false,
                'message' => 'La password inserita non è corretta',
            ];
        }

        try {
            $this->authGuard->logout();
            $user->delete();

            return [
                'success' => true,
                'message' => 'Account eliminato con successo',
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Si è verificato un errore durante l\'eliminazione dell\'account',
            ];
        }
    }
}
