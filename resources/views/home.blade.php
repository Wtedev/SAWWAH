@extends('layout.app')

@section('title', 'الصفحة الرئيسية')

@section('content')
<!-- الترحيب -->
<section class="relative text-center mb-16">
    <div class="absolute inset-0 bg-cover bg-center opacity-10" style="background-image: url('/images/bg-hero.jpg');"></div>
    <div class="relative z-10 py-20">
        <h1 class="text-4xl font-bold text-pink-600 animate-pulse">مرحباً بك في <span class="text-gray-800">سَوّاح</span>!</h1>
        <p class="text-gray-500 mt-4 text-lg">منصة تساعدك على تخطيط رحلاتك بسهولة وذكاء ✨</p>
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

        <!-- الوجهات السعودية -->
        <h3 class="text-2xl font-semibold text-pink-500">داخل السعودية 🇸🇦</h3>
        <div class="grid md:grid-cols-4 gap-6">
            <x-destination-card name="جدة" img="jeddah.jpg" />
            <x-destination-card name="المدينة" img="madinah.jpg" />
            <x-destination-card name="الخبر" img="khobar.jpg" />
            <x-destination-card name="العُلا" img="alula.jpg" />
        </div>

        <!-- الوجهات الخليجية -->
        <h3 class="text-2xl font-semibold text-pink-500 mt-10">دول الخليج 🌍</h3>
        <div class="grid md:grid-cols-4 gap-6">
            <x-destination-card name="دبي" img="dubai.jpg" />
            <x-destination-card name="أبو ظبي" img="abudhabi.jpg" />
            <x-destination-card name="قطر - الدوحة" img="qatar.jpg" />
            <x-destination-card name="عُمان - صلالة" img="oman.jpg" />
        </div>

    </div>

    <div class="text-center mt-10">
        <a href="/places" class="bg-pink-500 text-white px-8 py-3 rounded-full font-semibold hover:bg-pink-600 transition">
            استعرض كل الوجهات
        </a>
    </div>
</section>

<!-- زر دعوة لتجربة النظام الذكي -->
<div class="text-center mt-10">
    <a href="/suggest" class="inline-block bg-pink-600 hover:bg-pink-700 text-white px-8 py-3 rounded-full text-lg font-bold shadow animate-bounce">
        جرب نظام الاقتراح الذكي الآن!
    </a>
</div>

@endsection
