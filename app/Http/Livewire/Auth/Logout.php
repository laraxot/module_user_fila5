<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Auth;

<<<<<<< HEAD
<<<<<<< HEAD
use Exception;
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
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
<<<<<<< HEAD
     * @return RedirectResponse|null
     */
    public function mount()
=======
     */
    public function mount(): ?RedirectResponse
>>>>>>> 2024e2e7 (.)
=======
     */
    public function mount(): ?RedirectResponse
>>>>>>> f589f9b2 (.)
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
<<<<<<< HEAD
                Log::info('User logged out successfully', [
=======
                Log::debug('User logged out successfully', [
>>>>>>> 2024e2e7 (.)
=======
                Log::debug('User logged out successfully', [
>>>>>>> f589f9b2 (.)
                    'user_id' => $user->id,
                    'email' => $user->email,
                ]);
            }

            // Redirect alla pagina di login
            return redirect()->route('login');
<<<<<<< HEAD
<<<<<<< HEAD
        } catch (Exception $e) {
=======
        } catch (\Exception $e) {
>>>>>>> 2024e2e7 (.)
=======
        } catch (\Exception $e) {
>>>>>>> f589f9b2 (.)
            Log::error('Logout failed', [
                'error' => $e->getMessage(),
                'user_id' => Auth::id(),
            ]);

            session()->flash('error', __('Si è verificato un errore durante il logout'));
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> 2024e2e7 (.)
=======

>>>>>>> f589f9b2 (.)
            return redirect()->back();
        }
    }

    /**
     * Renderizza il componente.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @return View
     */
    public function render(): View
    {
        return view('user::livewire.auth.logout');
=======
=======
>>>>>>> f589f9b2 (.)
     */
    public function render(): View
    {
        /** @var view-string $viewName */
        $viewName = 'user::livewire.auth.logout';

        return view($viewName);
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    }
}
