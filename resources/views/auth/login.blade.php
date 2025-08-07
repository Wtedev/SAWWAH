@extends('layout.app')

@section('title', 'تسجيل الدخول - سواح')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <!-- Logo -->
        <div class="text-center">
            <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-pink-50 flex items-center justify-center">
                <i class="fas fa-plane text-pink-500 text-3xl"></i>
            </div>
            <h2 class="text-3xl font-extrabold text-gray-900">
                مرحباً بك في سواح
            </h2>
            <p class="mt-2 text-sm text-gray-600">
                سجل دخولك لتبدأ رحلتك معنا
            </p>
        </div>

        <!-- Session Status -->
        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif

        <!-- Login Form -->
        <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
            @csrf

            <div class="rounded-2xl shadow-sm bg-white p-8 space-y-6">
                <!-- Email Input -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">
                        البريد الإلكتروني
                    </label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" autocomplete="email" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm" value="{{ old('email') }}">
                    </div>
                    @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Input -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">
                        كلمة المرور
                    </label>
                    <div class="mt-1">
                        <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm">
                    </div>
                    @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-pink-600 focus:ring-pink-500 border-gray-300 rounded">
                        <label for="remember_me" class="mr-2 block text-sm text-gray-900">
                            تذكرني
                        </label>
                    </div>

                    @if (Route::has('password.request'))
                    <div class="text-sm">
                        <a href="{{ route('password.request') }}" class="font-medium text-pink-600 hover:text-pink-500">
                            نسيت كلمة المرور؟
                        </a>
                    </div>
                    @endif
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-pink-600 hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                        تسجيل الدخول
                    </button>
                </div>
            </div>
        </form>

        <!-- Register Link -->
        <div class="text-center">
            <p class="text-sm text-gray-600">
                ليس لديك حساب؟
                <a href="{{ route('register') }}" class="font-medium text-pink-600 hover:text-pink-500">
                    سجل الآن
                </a>
            </p>
        </div>
    </div>
</div>
@endsection
