<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $roles = func_get_args();
        // args: ($request, Closure $next, ...roles)
        // Remove first two (request, next)
        $allowed = array_slice($roles, 2);
        $user = $request->user();
        if (!$user) {
            return redirect()->route('login');
        }
        if (!empty($allowed) && !in_array($user->role, $allowed)) {
            abort(403, 'Unauthorized');
        }
        return $next($request);
    }
}
