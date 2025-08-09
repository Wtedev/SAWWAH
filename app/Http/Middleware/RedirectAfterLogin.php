<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectAfterLogin
{
    public function handle(Request $request, Closure $next)
    {
        // إذا كان المستخدم مسجل الدخول وهو أدمن ويحاول الوصول إلى /profile
        if (Auth::check() && Auth::user()->is_admin && $request->is('profile')) {
            return redirect('/admin');
        }

        return $next($request);
    }
}
