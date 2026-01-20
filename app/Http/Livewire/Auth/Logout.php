<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Auth;

<<<<<<< HEAD
=======
use Exception;
>>>>>>> f548be94 (.)
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

/**
 * Componente Livewire per la gestione del logout.
 *
 * Questo componente gestisce il processo di logout in modo sicuro:
 * - Emette eventi pre e post logout
 * - Gestisce gli errori in modo robusto
 * - Mantiene un log delle operazioni
 * - Invalida e rigenera la sessione
 */
class Logout extends Component
{
    use WithRateLimiting;

    /**
     * Esegui logout, invalidazione sessione e redirect.
<<<<<<< HEAD
     */
    public function mount(): ?RedirectResponse
=======
     * @return RedirectResponse|null
     */
    public function mount()
>>>>>>> f548be94 (.)
    {
        try {
            // Rate limit
            $this->rateLimit(5);

            // Ottieni l'utente prima del logout per il logging
            $user = Auth::user();

            // Emetti evento pre-logout
            Event::dispatch('auth.logout.attempting', [$user]);

            // Esegui logout
            Auth::logout();

            // Invalida e rigenera la sessione
            session()->invalidate();
            session()->regenerateToken();

            // Emetti evento post-logout
            Event::dispatch('auth.logout.successful');

            // Log per audit
            if ($user) {
<<<<<<< HEAD
                Log::debug('User logged out successfully', [
=======
                Log::info('User logged out successfully', [
>>>>>>> f548be94 (.)
                    'user_id' => $user->id,
                    'email' => $user->email,
                ]);
            }

            // Redirect alla pagina di login
            return redirect()->route('login');
<<<<<<< HEAD
        } catch (\Exception $e) {
=======
        } catch (Exception $e) {
>>>>>>> f548be94 (.)
            Log::error('Logout failed', [
                'error' => $e->getMessage(),
                'user_id' => Auth::id(),
            ]);

            session()->flash('error', __('Si è verificato un errore durante il logout'));
<<<<<<< HEAD

=======
>>>>>>> f548be94 (.)
            return redirect()->back();
        }
    }

    /**
     * Renderizza il componente.
<<<<<<< HEAD
     */
    public function render(): View
    {
        /** @var view-string $viewName */
        $viewName = 'user::livewire.auth.logout';

        return view($viewName);
=======
     *
     * @return View
     */
    public function render(): View
    {
        return view('user::livewire.auth.logout');
>>>>>>> f548be94 (.)
    }
}
