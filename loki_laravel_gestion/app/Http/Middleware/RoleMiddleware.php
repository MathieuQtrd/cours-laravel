<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, String $role): Response
    {
        $user = Auth::user(); // on récupère l'utilisateur

        if(!$user || ($user->role !== 'admin' && $user->role !== $role)) {
            abort(403, 'Accès interdit'); // si souci : on bloque.
        }

        return $next($request);
    }
}
