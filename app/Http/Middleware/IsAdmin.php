<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        if ($user && $user->role === 'admin') {
            return $next($request);
        }

        abort(403, '🚫 ليس لديك صلاحية الوصول لهذه الصفحة.');
    }
}

