@extends('layout.app')

@section('title', 'نتيجة الاقتراح')

@section('content')
<div class="mb-10 text-center">
    <h1 class="text-4xl font-bold text-gray-800">وجهتك المقترحة</h1>
    <p class="text-gray-500 mt-2 text-xl">تم تحليل تفضيلاتك واختيار أفضل الوجهات المناسبة لك</p>
</div>

@if($suggestedCountries && count($suggestedCountries) > 0)
<div class="max-w-6xl mx-auto bg-white rounded-lg shadow-md p-8 mb-8">
    <div class="flex items-center mb-6">
        <i class="fas fa-map-marker-alt text-pink-500 text-2xl ml-3"></i>
        <h2 class="text-2xl font-bold text-gray-800">أفضل الوجهات المقترحة لرحلتك</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach ($suggestedCountries as $country)
        <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
            @if($country->image_url)
            <div class="relative">
                <img src="{{ asset($country->image_url) }}" alt="{{ $country->name }}" class="w-full h-48 object-cover">
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent py-2 px-4">
                    <h3 class="text-xl font-bold text-white">{{ $country->name }}</h3>
                </div>
            </div>
            @else
            <div class="bg-gray-100 h-48 flex items-center justify-center">
                <div class="text-center">
                    <i class="fas fa-map-marked-alt text-pink-300 text-4xl mb-2"></i>
                    <h3 class="text-xl font-bold text-gray-700">{{ $country->name }}</h3>
                </div>
            </div>
            @endif

            <div class="p-6">
                <p class="text-gray-600 mb-4 line-clamp-2">{{ $country->description }}</p>

                <div class="space-y-3 text-sm">
                    <div class="flex items-center">
                        <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center ml-3">
                            <i class="fas fa-calendar-alt text-blue-500"></i>
                        </div>
                        <div>
                            <span class="font-bold text-gray-700">أفضل وقت للزيارة:</span>
                            <span class="text-gray-600 mr-1">{{ $country->best_month_to_travel }}</span>
                        </div>
                    </div>
                    
                    <div class="flex items-center">
                        <div class="w-8 h-8 rounded-full bg-green-50 flex items-center justify-center ml-3">
                            <i class="fas fa-money-bill-wave text-green-500"></i>
                        </div>
                        <div>
                            <span class="font-bold text-gray-700">الميزانية المقترحة:</span>
                            <span class="text-gray-600 mr-1">{{ $country->preferred_budget }}</span>
                        </div>
                    </div>
                    
                    <div class="flex items-center">
                        <div class="w-8 h-8 rounded-full bg-purple-50 flex items-center justify-center ml-3">
                            <i class="fas fa-star text-purple-500"></i>
                        </div>
                        <div>
                            <span class="font-bold text-gray-700">أبرز المميزات:</span>
                            <span class="text-gray-600 mr-1">{{ $country->attraction }}</span>
                        </div>
                    </div>
                    
                    <div class="flex items-center">
                        <div class="w-8 h-8 rounded-full bg-yellow-50 flex items-center justify-center ml-3">
                            <i class="fas fa-users text-yellow-500"></i>
                        </div>
                        <div>
                            <span class="font-bold text-gray-700">مناسبة للسفر:</span>
                            <span class="text-gray-600 mr-1">{{ $country->travel_with }}</span>
                        </div>
                    </div>
                    
                    <div class="flex items-center">
                        <div class="w-8 h-8 rounded-full bg-red-50 flex items-center justify-center ml-3">
                            <i class="fas fa-language text-red-500"></i>
                        </div>
                        <div>
                            <span class="font-bold text-gray-700">اللغة السائدة:</span>
                            <span class="text-gray-600 mr-1">{{ $country->language_preference }}</span>
                        </div>
                    </div>
                </div>

                <div class="mt-6 text-center">
                    <a href="{{ route('countries.show', $country->slug) }}" class="inline-block bg-gradient-to-r from-pink-500 to-pink-600 hover:from-pink-600 hover:to-pink-700 text-white px-6 py-3 rounded-lg font-bold shadow-md transition-all duration-300">
                        <i class="fas fa-plane-departure ml-2"></i>
                        عرض التفاصيل
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@else
<div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-10 text-center">
    <div class="mb-6">
        <div class="w-20 h-20 bg-pink-50 rounded-full mx-auto flex items-center justify-center">
            <i class="fas fa-search text-pink-400 text-4xl"></i>
        </div>
    </div>
    <h3 class="text-2xl font-bold text-gray-700 mb-3">لا توجد وجهات مطابقة</h3>
    <p class="text-gray-500 mb-6">لا توجد وجهات تطابق تفضيلات السفر التي اخترتها. حاول تعديل معايير البحث.</p>
</div>
@endif

<div class="flex items-center justify-center mt-10 space-x-4 space-x-reverse">
    <a href="{{ route('suggest.form') }}" class="flex items-center bg-white text-pink-500 border-2 border-pink-500 px-6 py-3 rounded-lg font-bold hover:bg-pink-50 transition-colors">
        <i class="fas fa-sliders-h ml-2"></i>
        تعديل التفضيلات
    </a>
    
    <a href="{{ route('trip-planner') }}" class="flex items-center bg-gradient-to-r from-pink-500 to-pink-600 hover:from-pink-600 hover:to-pink-700 text-white px-6 py-3 rounded-lg font-bold shadow-md transition-all duration-300">
        <i class="fas fa-route ml-2"></i>
        تخطيط الرحلة
    </a>
</div>

@endsection
