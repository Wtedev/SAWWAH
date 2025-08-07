<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app['auth']->viaRequest('api', function ($request) {
            return Auth::user();
        });

        // تعديل مسار التوجيه بعد تسجيل الدخول
        $this->app['auth']->loginUsingId(function ($user) {
            return $user->is_admin ? route('admin.dashboard') : route('home');
        });
    }

    public function register()
    {
        //
    }
}
