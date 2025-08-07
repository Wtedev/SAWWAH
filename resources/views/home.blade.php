@extends('layout.app')

@section('title', 'الصفحة الرئيسية')

@section('content')
<!-- الترحيب -->
<section class="relative text-center mb-16">
    <div class="absolute inset-0 bg-cover bg-center opacity-10" style="background-image: url('/images/bg-hero.jpg');"></div>
    <div class="relative z-10 py-20">
        <h1 class="text-4xl font-bold text-pink-600 animate-pulse">مرحباً بك في <span class="text-gray-800">سَوّاح</span>!</h1>
        <p class="text-gray-500 mt-4 text-lg">منصة تساعدك على تخطيط رحلاتك بسهولة وذكاء</p>
    </div>
</section>

<!-- الأدوات -->
<section class="mb-16 px-4">
    <h2 class="text-2xl font-bold text-gray-800 text-center mb-10">أدوات سواح الذكية:</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- فعالية -->
        <a href="/events" class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-1">
            <img src="/images/events.png" alt="فعاليات" class="mx-auto mb-4 w-16">
            <h3 class="text-xl font-bold mb-2 text-pink-600"> أهم الفعاليات</h3>
            <p class="text-gray-500 text-sm">تعرف على أحدث الفعاليات السياحية في وجهتك.</p>
        </a>
        <!-- مخطط الرحلات -->
        <a href="/trip-planner" class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-1">
            <img src="/images/trip.png" alt="رحلات" class="mx-auto mb-4 w-16">
            <h3 class="text-xl font-bold mb-2 text-pink-600"> مخطط الرحلات</h3>
            <p class="text-gray-500 text-sm">نظم رحلتك كاملة وفقاً لميزانيتك وتفضيلاتك.</p>
        </a>
        <!-- الاقتراح الذكي -->
        <a href="/suggest" class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-1">
            <img src="/images/ai.png" alt="اقتراح ذكي" class="mx-auto mb-4 w-16">
            <h3 class="text-xl font-bold mb-2 text-pink-600"> نظام الاقتراح الذكي</h3>
            <p class="text-gray-500 text-sm">نقترح عليك وجهات بناءً على اهتماماتك وميزانيتك.</p>
        </a>
    </div>
</section>

<!-- الوجهات الرائجة -->
<section class="py-20 bg-white">
    <div class="text-center mb-12">
        <h2 class="text-4xl font-bold text-gray-800 mb-3">وجهات لا تفوّت!</h2>
        <p class="text-gray-500">اكتشف أجمل المناطق داخل المملكة وخارجها</p>
    </div>

    <div class="px-6 md:px-20 space-y-12">

        <!-- الوجهات الرائجة -->
        <h3 class="text-2xl font-semibold text-pink-500">الوجهات الرائجة</h3>
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($popularCountries as $country)
            <a href="{{ route('countries.show', $country->slug) }}" class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition transform hover:-translate-y-1">
                <div class="h-48 overflow-hidden">
                    <img src="{{ asset('images/' . $country->image) }}" alt="{{ $country->name }}" class="w-full h-full object-cover">
                </div>
                <div class="p-4">
                    <h4 class="font-bold text-lg mb-1">{{ $country->name }}</h4>
                    <p class="text-gray-500 text-sm line-clamp-2">{{ $country->description }}</p>
                    @if(isset($country->weather_info) && isset($country->weather_info->temp))
                    <div class="flex items-center mt-2 text-sm text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-pink-500 ml-1" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M15 13V5c0-1.66-1.34-3-3-3S9 3.34 9 5v8c-1.21.91-2 2.37-2 4 0 2.76 2.24 5 5 5s5-2.24 5-5c0-1.63-.79-3.09-2-4zm-4-8c0-.55.45-1 1-1s1 .45 1 1h-2z"/>
                        </svg>
                        <span>{{ $country->weather_info->temp }}° C</span>
                    </div>
                    @endif
                </div>
            </a>
            @empty
            <div class="col-span-4 text-center py-8 text-gray-500">
                لا توجد وجهات متاحة حالياً
            </div>
            @endforelse
        </div>

    </div>

    <div class="text-center mt-10">
        <a href="{{ route('countries.index') }}" class="bg-pink-500 text-white px-8 py-3 rounded-full font-semibold hover:bg-pink-600 transition">
            استعرض كل الوجهات
        </a>
    </div>
</section>


{{-- موجود زر له حذفته اعتقدت مكرر (قابل للترجيع اذا مهم)   --}}
{{-- <!-- زر دعوة لتجربة النظام الذكي -->
<div class="text-center mt-10">
    <a href="/suggest" class="inline-block bg-pink-600 hover:bg-pink-700 text-white px-8 py-3 rounded-full text-lg font-bold shadow animate-bounce">
        جرب نظام الاقتراح الذكي الآن!
    </a>
</div> --}}

@endsection
