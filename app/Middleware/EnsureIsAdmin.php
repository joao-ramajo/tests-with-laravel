<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EnsureIsAdmin
{
    public function handle($request, Closure $next)
    {
        if (!Auth::user()?->is_admin) {
            abort(403, 'Acesso negado');
        }

        return $next($request);
    }
}
