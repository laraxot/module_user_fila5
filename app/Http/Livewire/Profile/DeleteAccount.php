<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Profile;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\User\Actions\User\DeleteUserAction;
use Modules\User\Contracts\UserContract;
use Modules\User\Models\User;

class DeleteAccount extends Component
{
    public string $delete_confirm_password = '';

    public function render(): View
    {
        /** @var view-string $viewName */
        $viewName = 'user::livewire.profile.delete-account';

        return view($viewName);
    }

    public function destroy(): void
    {
        /** @var User|null $user */
        $user = Auth::user();
        if (! $user) {
            // @var mixed dispatch('toast', [
                'message' => 'Utente non trovato',
                'type' => 'error',
            ]);

            return;
        }

        // Assicuriamoci che sia del tipo corretto per l'action
        if (! $user instanceof UserContract) {
            // @var mixed dispatch('toast', [
                'message' => 'Tipo di utente non supportato',
                'type' => 'error',
            ]);

            return;
        }

        $result = app(DeleteUserAction::class)->execute($user, // @var mixed delete_confirm_password;

        if (! $result['success']) {
            // @var mixed dispatch('toast', [
                'message' => $result['message'],
                'type' => 'error',
            ]);
            // @var mixed reset(['delete_confirm_password'];

            return;
        }

        // @var mixed redirect('/';
    }
}
