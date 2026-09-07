<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Profile;

<<<<<<< HEAD
use Modules\User\Models\User;
=======
>>>>>>> 2024e2e7 (.)
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\User\Actions\User\DeleteUserAction;
use Modules\User\Contracts\UserContract;
<<<<<<< HEAD
=======
use Modules\User\Models\User;
>>>>>>> 2024e2e7 (.)

class DeleteAccount extends Component
{
    public string $delete_confirm_password = '';

    public function render(): View
    {
<<<<<<< HEAD
        return view('user::livewire.profile.delete-account');
=======
        /** @var view-string $viewName */
        $viewName = 'user::livewire.profile.delete-account';

        return view($viewName);
>>>>>>> 2024e2e7 (.)
    }

    public function destroy(): void
    {
        /** @var User|null $user */
        $user = Auth::user();
<<<<<<< HEAD
        if (!$user) {
=======
        if (! $user) {
>>>>>>> 2024e2e7 (.)
            $this->dispatch('toast', [
                'message' => 'Utente non trovato',
                'type' => 'error',
            ]);
<<<<<<< HEAD
=======

>>>>>>> 2024e2e7 (.)
            return;
        }

        // Assicuriamoci che sia del tipo corretto per l'action
<<<<<<< HEAD
        if (!($user instanceof UserContract)) {
=======
        if (! $user instanceof UserContract) {
>>>>>>> 2024e2e7 (.)
            $this->dispatch('toast', [
                'message' => 'Tipo di utente non supportato',
                'type' => 'error',
            ]);
<<<<<<< HEAD
=======

>>>>>>> 2024e2e7 (.)
            return;
        }

        $result = app(DeleteUserAction::class)->execute($user, $this->delete_confirm_password);

<<<<<<< HEAD
        if (!$result['success']) {
=======
        if (! $result['success']) {
>>>>>>> 2024e2e7 (.)
            $this->dispatch('toast', [
                'message' => $result['message'],
                'type' => 'error',
            ]);
            $this->reset(['delete_confirm_password']);
<<<<<<< HEAD
=======

>>>>>>> 2024e2e7 (.)
            return;
        }

        $this->redirect('/');
    }
}
