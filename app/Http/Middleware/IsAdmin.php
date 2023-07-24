<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Si l'utilisateur est connecté et qu'il est un administrateur
        if (Auth::check() && Auth::user()->is_admin) {
            // On le laisse accéder à la route
            return $next($request);
        }

        // Sinon, on le redirige vers une autre page
        return redirect('/')->with('error', 'Vous n\'avez pas les droits nécessaires pour accéder à cette page.');
    }
}
