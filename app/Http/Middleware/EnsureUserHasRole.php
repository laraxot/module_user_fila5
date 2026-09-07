<?php

declare(strict_types=1);

<<<<<<< HEAD

namespace Modules\User\Http\Middleware;

use Closure;
=======
namespace Modules\User\Http\Middleware;

>>>>>>> 2024e2e7 (.)
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Route::put('/post/{id}', function (string $id) {
 *   // ...
 * })->middleware(EnsureUserHasRole::class.':editor');
 * Route::put('/post/{id}', function (string $id) {
 *     // ...
<<<<<<< HEAD
 *})->middleware(EnsureUserHasRole::class.':editor,publisher');
 */

=======
 *})->middleware(EnsureUserHasRole::class.':editor,publisher');.
 */
>>>>>>> 2024e2e7 (.)
class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
<<<<<<< HEAD
     * @param Closure(Request):Response $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $user = $request->user();
        // Check if user has role using Spatie Permission's hasRole method
        if (!$user || !method_exists($user, 'hasRole') || !$user->hasRole($role)) {
=======
     * @param \Closure(Request):Response $next
     */
    public function handle(Request $request, \Closure $next, string $role): Response
    {
        $user = $request->user();
        // Check if user has role using Spatie Permission's hasRole method
        if (! $user || ! method_exists($user, 'hasRole') || ! $user->hasRole($role)) {
>>>>>>> 2024e2e7 (.)
            // Redirect...
            return redirect()->route('home');
        }

        return $next($request);
    }
}
