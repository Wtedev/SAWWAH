@extends('layouts.app') {{-- لوراثة الـ layout الأساسي --}}

@section('title', 'قائمة الدول - سواح') {{-- عنوان الصفحة في المتصفح --}}

@section('content')
    <div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-10">
                <h1 class="text-4xl font-extrabold text-gray-900 mb-4">اكتشف وجهاتك السياحية القادمة 🌍</h1>
                <p class="text-lg text-gray-600">
                    استكشف أجمل الدول والمعالم السياحية في جميع أنحاء العالم
                </p>
            </div>

            <div class="mb-10 flex justify-center">
                <div class="relative w-full max-w-lg">
                    <input type="text" placeholder="ابحث عن دولة..."
                           class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-full shadow-sm
                                  focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-lg">
                    <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                        <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach ($countries as $country) {{-- استخدام بيانات الدول من قاعدة البيانات --}}
                    <a href="{{ route('countries.show', $country->slug) }}" class="block bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <img class="w-full h-48 object-cover" src="{{ $country->image_url }}" alt="{{ $country->name }}">
                        <div class="p-4">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $country->name }}</h3>
                            <p class="text-gray-600 text-sm">{{ $country->description }}</p>
                            <div class="mt-3 flex items-center text-gray-500 text-sm">
                                <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span>{{ $country->destinations_count }} وجهة</span> {{-- عدد الوجهات --}}
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection

