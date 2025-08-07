<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectBasedOnUserRole
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            // إذا كان المستخدم أدمن وهو يحاول الوصول إلى الصفحة الرئيسية، قم بتوجيهه إلى لوحة التحكم
            if (Auth::user()->is_admin && $request->is('/')) {
                return redirect()->route('admin.dashboard');
            }

            // إذا كان المستخدم أدمن ويحاول الوصول إلى صفحات غير مصرح بها
            if (!Auth::user()->is_admin && $request->is('admin*')) {
                return redirect()->route('home')->with('error', 'غير مصرح لك بالوصول إلى هذه الصفحة');
            }
        }

        return $next($request);
    }
}
