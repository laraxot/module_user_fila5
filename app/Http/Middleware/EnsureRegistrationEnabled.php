<?php

declare(strict_types=1);

<<<<<<< HEAD
namespace Modules\User\Http\Middleware;

=======

namespace Modules\User\Http\Middleware;

use Closure;
>>>>>>> f548be94 (.)
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;

class EnsureRegistrationEnabled
{
    /**
     * Handle an incoming request.
     *
<<<<<<< HEAD
     * @param \Closure(Request):Response $next
     */
    public function handle(Request $request, \Closure $next): Response
    {
        $enabled = Config::boolean('auth.registration_enabled', true);
        // Controlla se la registrazione è disabilitata
        if (! $enabled) {
=======
     * @param Closure(Request):Response $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $enabled = Config::boolean('auth.registration_enabled', true);
        // Controlla se la registrazione è disabilitata
        if (!$enabled) {
>>>>>>> f548be94 (.)
            return redirect()->route('pages.view', ['slug' => 'register_disabled']);
        }

        return $next($request);
    }
}
