@extends('layout.app')

@section('title', 'إنشاء حساب جديد - سواح')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <!-- Logo -->
        <div class="text-center">
            <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-pink-50 flex items-center justify-center">
                <i class="fas fa-plane text-pink-500 text-3xl"></i>
            </div>
            <h2 class="text-3xl font-extrabold text-gray-900">
                إنشاء حساب جديد
            </h2>
            <p class="mt-2 text-sm text-gray-600">
                انضم إلينا واكتشف أفضل الوجهات السياحية
            </p>
        </div>

        <!-- Registration Form -->
        <form class="mt-8 space-y-6" action="{{ route('register') }}" method="POST">
            @csrf

            <div class="rounded-2xl shadow-sm bg-white p-8 space-y-6">
                <!-- Name Input -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">
                        الاسم
                    </label>
                    <div class="mt-1">
                        <input id="name" name="name" type="text" autocomplete="name" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm" value="{{ old('name') }}">
                    </div>
                    @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

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
                        <input id="password" name="password" type="password" autocomplete="new-password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm">
                    </div>
                    @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                        تأكيد كلمة المرور
                    </label>
                    <div class="mt-1">
                        <input id="password_confirmation" name="password_confirmation" type="password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm">
                    </div>
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-pink-600 hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                        إنشاء الحساب
                    </button>
                </div>
            </div>
        </form>

        <!-- Login Link -->
        <div class="text-center">
            <p class="text-sm text-gray-600">
                لديك حساب بالفعل؟
                <a href="{{ route('login') }}" class="font-medium text-pink-600 hover:text-pink-500">
                    سجل دخولك
                </a>
            </p>
        </div>
    </div>
</div>
@endsection
