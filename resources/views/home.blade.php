@extends('layout.app')

@section('title', 'الصفحة الرئيسية')

@section('content')

<!-- الترحيب -->
<div class="text-center py-10">
    <h1 class="text-4xl font-extrabold mb-2 text-gray-800">
        مرحباً بك {{ Auth::user()->name ?? 'المستخدم' }}، في <span class="text-pink-500">سَوّاح</span>
    </h1>
    <p class="text-gray-500">
        عبارة تسويقية من سطر عبارة تسويقية من سطر عبارة تسويقية من سطر
    </p>
</div>

<!-- أدوات سواح -->
<section class="px-4 md:px-20 mb-16">
    <h2 class="text-2xl font-bold text-center mb-10">أدوات رهيبة بحتاجها كل سواح!</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-2xl shadow-md text-center">
            <div class="w-16 h-16 mx-auto mb-4 bg-gray-100 rounded-xl"></div>
            <h3 class="font-semibold text-lg">أهم الفعاليات</h3>
            <p class="text-sm text-gray-500">وصف تسويقي للأداة</p>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow-md text-center">
            <div class="w-16 h-16 mx-auto mb-4 bg-gray-100 rounded-xl"></div>
            <h3 class="font-semibold text-lg">مخطط الرحلات</h3>
            <p class="text-sm text-gray-500">وصف تسويقي للأداة</p>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow-md text-center">
            <div class="w-16 h-16 mx-auto mb-4 bg-gray-100 rounded-xl"></div>
            <h3 class="font-semibold text-lg">نظام الإقتراح الذكي</h3>
            <p class="text-sm text-gray-500">وصف تسويقي للأداة</p>
        </div>
    </div>
</section>

<!-- الوجهات الرائجة -->
<section class="px-4 md:px-20 mb-16">
    <h2 class="text-2xl font-bold mb-6">الوجهات الرائجة هذا الموسم:</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @for ($i = 1; $i <= 3; $i++)
            <div class="bg-white rounded-2xl shadow-md p-6">
                <h4 class="font-bold mb-2">اسم الوجهة</h4>
                <p class="text-sm text-gray-600 mb-4">نص يصف الوجهة السياحية بشكل مبسط.</p>
                <ul class="text-xs text-gray-500 space-y-1">
                    <li><i class="fas fa-map-marker-alt text-pink-400"></i> معلومة</li>
                    <li><i class="fas fa-map-marker-alt text-pink-400"></i> معلومة</li>
                    <li><i class="fas fa-map-marker-alt text-pink-400"></i> معلومة</li>
                </ul>
                <button class="mt-4 w-8 h-8 rounded-full bg-pink-400 text-white flex items-center justify-center">
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        @endfor
    </div>
</section>

@endsection
