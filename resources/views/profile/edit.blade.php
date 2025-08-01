@extends('layout.app')

@section('title', 'ملفي الشخصي - سواح')

@section('content')
    <div class="flex-1 p-6 md:p-10 lg:p-16">
        <div class="bg-white shadow-xl rounded-2xl p-6 md:p-10 w-full max-w-4xl mx-auto">
            <div class="flex flex-col items-center mb-8 text-center">
                <div class="relative w-32 h-32 mb-4">
                    <img class="w-full h-full rounded-full object-cover border-4 border-pink-500 shadow-md"
                         src="https://placehold.co/128x128/fecdd3/e5e7eb?text=صورة+المستخدم"
                         alt="صورة المستخدم">
                </div>
                <h2 class="text-3xl font-bold text-gray-900 mb-1">{{ Auth::user()->name ?? 'اسم المستخدم' }}</h2>
                <p class="text-gray-600 text-lg">مالك الشخصي</p>
            </div>

            <hr class="border-gray-200 mb-8">

            <div class="space-y-6">
                <div class="flex flex-col md:flex-row items-center bg-gray-100 p-4 rounded-xl shadow-inner">
                    <label class="w-full md:w-1/4 text-gray-700 font-semibold mb-2 md:mb-0">الإيميل</label>
                    <div class="flex-1 w-full md:w-3/4 flex items-center justify-between text-gray-800">
                        <span>{{ Auth::user()->email ?? 'البريد الإلكتروني' }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 transform rtl:rotate-180" viewBox="0 0 24 24" fill="currentColor">
                           <path d="M15.41 16.59L10.83 12l4.58-4.59L14 6l-6 6 6 6z"/>
                        </svg>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row items-center bg-gray-100 p-4 rounded-xl shadow-inner">
                    <label class="w-full md:w-1/4 text-gray-700 font-semibold mb-2 md:mb-0">الدولة</label>
                    <div class="flex-1 w-full md:w-3/4 flex items-center justify-between text-gray-800">
                        <span>{{ Auth::user()->country ?? 'القيمة تظهر هنا' }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 transform rtl:rotate-180" viewBox="0 0 24 24" fill="currentColor">
                           <path d="M15.41 16.59L10.83 12l4.58-4.59L14 6l-6 6 6 6z"/>
                        </svg>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row items-center bg-gray-100 p-4 rounded-xl shadow-inner">
                    <label class="w-full md:w-1/4 text-gray-700 font-semibold mb-2 md:mb-0">العملة</label>
                    <div class="flex-1 w-full md:w-3/4 flex items-center justify-between text-gray-800">
                        <span>{{ Auth::user()->currency ?? 'القيمة تظهر هنا' }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 transform rtl:rotate-180" viewBox="0 0 24 24" fill="currentColor">
                           <path d="M15.41 16.59L10.83 12l4.58-4.59L14 6l-6 6 6 6z"/>
                        </svg>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row items-center bg-gray-100 p-4 rounded-xl shadow-inner">
                    <label class="w-full md:w-1/4 text-gray-700 font-semibold mb-2 md:mb-0">حالة الطقس</label>
                    <div class="flex-1 w-full md:w-3/4 flex items-center justify-between text-gray-800">
                        <span>{{ Auth::user()->weather_preference ?? 'القيمة تظهر هنا' }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 transform rtl:rotate-180" viewBox="0 0 24 24" fill="currentColor">
                           <path d="M15.41 16.59L10.83 12l4.58-4.59L14 6l-6 6 6 6z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <hr class="border-gray-200 my-8">

            <div class="flex justify-center">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-pink-500 hover:bg-pink-600 text-white font-bold py-3 px-8 rounded-full shadow-lg transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-opacity-50">
                        تسجيل الخروج
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection