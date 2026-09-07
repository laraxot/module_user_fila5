<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD

namespace Modules\User\Http\Middleware;

use Closure;
=======
namespace Modules\User\Http\Middleware;

>>>>>>> 2024e2e7 (.)
=======
namespace Modules\User\Http\Middleware;

>>>>>>> f589f9b2 (.)
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Route::put('/post/{id}', function (string $id) {
 *   // ...
 * })->middleware(EnsureUserHasRole::class.':editor');
 * Route::put('/post/{id}', function (string $id) {
 *     // ...
<<<<<<< HEAD
<<<<<<< HEAD
 *})->middleware(EnsureUserHasRole::class.':editor,publisher');
 */

=======
 *})->middleware(EnsureUserHasRole::class.':editor,publisher');.
 */
>>>>>>> 2024e2e7 (.)
=======
 *})->middleware(EnsureUserHasRole::class.':editor,publisher');.
 */
>>>>>>> f589f9b2 (.)
class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param Closure(Request):Response $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $user = $request->user();
        // Check if user has role using Spatie Permission's hasRole method
        if (!$user || !method_exists($user, 'hasRole') || !$user->hasRole($role)) {
=======
=======
>>>>>>> f589f9b2 (.)
     * @param \Closure(Request):Response $next
     */
    public function handle(Request $request, \Closure $next, string $role): Response
    {
        $user = $request->user();
        // Check if user has role using Spatie Permission's hasRole method
        if (! $user || ! method_exists($user, 'hasRole') || ! $user->hasRole($role)) {
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
            // Redirect...
            return redirect()->route('home');
        }

        return $next($request);
    }
}
