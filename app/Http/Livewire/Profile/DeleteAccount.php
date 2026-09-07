<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Profile;

<<<<<<< HEAD
<<<<<<< HEAD
use Modules\User\Models\User;
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\User\Actions\User\DeleteUserAction;
use Modules\User\Contracts\UserContract;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Modules\User\Models\User;
>>>>>>> 2024e2e7 (.)
=======
use Modules\User\Models\User;
>>>>>>> f589f9b2 (.)

class DeleteAccount extends Component
{
    public string $delete_confirm_password = '';

    public function render(): View
    {
<<<<<<< HEAD
<<<<<<< HEAD
        return view('user::livewire.profile.delete-account');
=======
=======
>>>>>>> f589f9b2 (.)
        /** @var view-string $viewName */
        $viewName = 'user::livewire.profile.delete-account';

        return view($viewName);
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    }

    public function destroy(): void
    {
        /** @var User|null $user */
        $user = Auth::user();
<<<<<<< HEAD
<<<<<<< HEAD
        if (!$user) {
=======
        if (! $user) {
>>>>>>> 2024e2e7 (.)
=======
        if (! $user) {
>>>>>>> f589f9b2 (.)
            $this->dispatch('toast', [
                'message' => 'Utente non trovato',
                'type' => 'error',
            ]);
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> 2024e2e7 (.)
=======

>>>>>>> f589f9b2 (.)
            return;
        }

        // Assicuriamoci che sia del tipo corretto per l'action
<<<<<<< HEAD
<<<<<<< HEAD
        if (!($user instanceof UserContract)) {
=======
        if (! $user instanceof UserContract) {
>>>>>>> 2024e2e7 (.)
=======
        if (! $user instanceof UserContract) {
>>>>>>> f589f9b2 (.)
            $this->dispatch('toast', [
                'message' => 'Tipo di utente non supportato',
                'type' => 'error',
            ]);
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> 2024e2e7 (.)
=======

>>>>>>> f589f9b2 (.)
            return;
        }

        $result = app(DeleteUserAction::class)->execute($user, $this->delete_confirm_password);

<<<<<<< HEAD
<<<<<<< HEAD
        if (!$result['success']) {
=======
        if (! $result['success']) {
>>>>>>> 2024e2e7 (.)
=======
        if (! $result['success']) {
>>>>>>> f589f9b2 (.)
            $this->dispatch('toast', [
                'message' => $result['message'],
                'type' => 'error',
            ]);
            $this->reset(['delete_confirm_password']);
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> 2024e2e7 (.)
=======

>>>>>>> f589f9b2 (.)
            return;
        }

        $this->redirect('/');
    }
}
