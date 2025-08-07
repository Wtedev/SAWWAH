@extends('layout.app')

@section('title', 'نظام الإقتراح الذكي')

@section('content')

    <div class="mb-10 text-center">
        <h1 class="text-4xl font-bold text-gray-800">نظام الإقتراح الذكي</h1>
        <p class="text-gray-500 mt-2 text-xl">دعنا نكتشف وجهتك التالية، حيث تنتظرك تجربة فريدة 🌍</p>
    </div>

    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md p-8">
        <div class="flex items-center mb-6">
            <i class="fas fa-lightbulb text-pink-500 text-2xl ml-3"></i>
            <h2 class="text-2xl font-bold text-gray-800">أخبرنا عن تفضيلاتك</h2>
        </div>

        <form method="POST" action="{{ route('suggest.store') }}" class="space-y-6">
            @csrf

            {{-- تاريخ الرحلة --}}
            <div class="bg-gray-50 p-5 rounded-lg border border-gray-100">
                <label class="flex items-center mb-3 font-bold text-gray-700">
                    <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center ml-3">
                        <i class="fas fa-calendar-alt text-blue-500"></i>
                    </div>
                    ما هو تاريخ سفرك المتوقع؟
                </label>
                <input type="date" name="travel_date" class="w-full border-gray-300 rounded-lg shadow-sm py-3 focus:border-pink-500 focus:ring focus:ring-pink-200" required>
                <p class="text-xs text-gray-500 mt-2">اختر التاريخ المناسب لرحلتك</p>
            </div>

            {{-- الميزانية المتوفرة --}}
            <div class="bg-gray-50 p-5 rounded-lg border border-gray-100">
                <label class="flex items-center mb-3 font-bold text-gray-700">
                    <div class="w-8 h-8 rounded-full bg-green-50 flex items-center justify-center ml-3">
                        <i class="fas fa-money-bill-wave text-green-500"></i>
                    </div>
                    ما هي الميزانية المتوفرة للرحلة؟
                </label>
                <select name="budget" class="w-full border-gray-300 rounded-lg shadow-sm py-3 focus:border-pink-500 focus:ring focus:ring-pink-200" required>
                    <option value="">اختر الميزانية</option>
                    <option value="1000_to_5000">1000-5000 دولار</option>
                    <option value="more_than_5000">أكثر من 5000 دولار</option>
                    <option value="less_than_1000">أقل من 1000 دولار</option>
                </select>
            </div>

            {{-- ما الذي يجذبك أكثر في الوجهة السياحية؟ --}}
            <div class="bg-gray-50 p-5 rounded-lg border border-gray-100">
                <label class="flex items-center mb-3 font-bold text-gray-700">
                    <div class="w-8 h-8 rounded-full bg-purple-50 flex items-center justify-center ml-3">
                        <i class="fas fa-star text-purple-500"></i>
                    </div>
                    ما الذي يجذبك أكثر في الوجهة السياحية؟
                </label>
                <select name="attraction" class="w-full border-gray-300 rounded-lg shadow-sm py-3 focus:border-pink-500 focus:ring focus:ring-pink-200" required>
                    <option value="">اختر ما يجذبك أكثر</option>
                    <option value="low_prices">أسعار منخفضة</option>
                    <option value="rainy_weather">أجواء ماطرة</option>
                    <option value="famous_tourist_spots">مناطق سياحية مشهورة</option>
                    <option value="cultural_or_sport_events">فعاليات ثقافية أو رياضية</option>
                </select>
            </div>

            {{-- السفر بمفردك أم مع العائلة أو الأصدقاء --}}
            <div class="bg-gray-50 p-5 rounded-lg border border-gray-100">
                <label class="flex items-center mb-3 font-bold text-gray-700">
                    <div class="w-8 h-8 rounded-full bg-yellow-50 flex items-center justify-center ml-3">
                        <i class="fas fa-users text-yellow-500"></i>
                    </div>
                    هل ترغب في السفر بمفردك أم مع العائلة أو الأصدقاء؟
                </label>
                <select name="travel_with" class="w-full border-gray-300 rounded-lg shadow-sm py-3 focus:border-pink-500 focus:ring focus:ring-pink-200" required>
                    <option value="">اختر</option>
                    <option value="alone">بمفردي</option>
                    <option value="family">مع العائلة</option>
                    <option value="friends">مع الأصدقاء</option>
                </select>
            </div>

            {{-- هل أنت متقيد بلغة معينة أثناء السفر؟ --}}
            <div class="bg-gray-50 p-5 rounded-lg border border-gray-100">
                <label class="flex items-center mb-3 font-bold text-gray-700">
                    <div class="w-8 h-8 rounded-full bg-red-50 flex items-center justify-center ml-3">
                        <i class="fas fa-language text-red-500"></i>
                    </div>
                    هل أنت متقيد بلغة معينة أثناء السفر؟
                </label>
                <select name="language_preference" class="w-full border-gray-300 rounded-lg shadow-sm py-3 focus:border-pink-500 focus:ring focus:ring-pink-200" required>
                    <option value="">اختر اللغة المفضلة</option>
                    <option value="english">الإنجليزية</option>
                    <option value="arabic">العربية</option>
                    <option value="no_preference">لا توجد لغة معينة</option>
                </select>
            </div>

            {{-- زر الإرسال --}}
            <div class="text-center pt-6">
                <button type="submit" class="bg-gradient-to-r from-pink-500 to-pink-600 hover:from-pink-600 hover:to-pink-700 text-white px-8 py-3 rounded-lg text-lg font-bold shadow-md transition-all duration-300 hover:shadow-lg transform hover:scale-105">
                    <i class="fas fa-magic ml-2"></i>
                    اكتشف وجهتك المثالية
                </button>
            </div>
        </form>
    </div>

    <div class="mt-8 max-w-3xl mx-auto text-center text-gray-500 text-sm">
        <p>نظام الاقتراح الذكي يساعدك في اكتشاف وجهات سفر تناسب تفضيلاتك الشخصية</p>
    </div>

@endsection


