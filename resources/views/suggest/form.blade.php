@extends('layout.app')

@section('title', 'نظام الإقتراح الذكي')

@section('content')

    <div class="mb-10 text-center">
        <h1 class="text-3xl font-bold text-gray-800">نظام الإقتراح الذكي</h1>
        <p class="text-gray-500 mt-2">دعنا نكتشف وجهتك التالية، حيث تنتظرك تجربة فريدة🔭</p>
    </div>

    <form method="POST" action="{{ route('suggest.store') }}" class="max-w-3xl mx-auto space-y-6">
        @csrf

        {{-- تعديل الفورم لفورم مناسب للاقتراح -> lama  --}}

        {{-- تاريخ الرحلة --}}
        <div>
            <label class="block mb-2 font-medium text-gray-700">ما هو تاريخ سفرك المتوقع؟ (تاريخ الرحلة)</label>
            <input type="date" name="travel_date" class="w-full border-gray-300 rounded-lg shadow-sm" required>
        </div>
        {{-- الميزانية المتوفرة --}}
        <div>
            <label class="block mb-2 font-medium text-gray-700">ما هي الميزانية المتوفرة للرحلة؟</label>
            <select name="budget" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                <option value="">اختر الميزانية</option>
                <option value="1000_to_5000">1000-5000 دولار</option>
                <option value="more_than_5000">أكثر من 5000 دولار</option>
                <option value="less_than_1000">أقل من 1000 دولار</option>
            </select>
        </div>

        {{-- ما الذي يجذبك أكثر في الوجهة السياحية؟ --}}
        <div>
            <label class="block mb-2 font-medium text-gray-700">ما الذي يجذبك أكثر في الوجهة السياحية؟</label>
            <select name="attraction" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                <option value="">اختر ما يجذبك أكثر</option>
                <option value="low_prices">أسعار منخفضة</option>
                <option value="rainy_weather">أجواء ماطرة</option>
                <option value="famous_tourist_spots">مناطق سياحية مشهورة</option>
                <option value="cultural_or_sport_events">فعاليات ثقافية أو رياضية</option>
            </select>
        </div>

        {{-- السفر بمفردك أم مع العائلة أو الأصدقاء --}}
        <div>
            <label class="block mb-2 font-medium text-gray-700">هل ترغب في السفر بمفردك أم مع العائلة أو الأصدقاء؟</label>
            <select name="travel_with" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                <option value="">اختر</option>
                <option value="alone">بمفردي</option>
                <option value="family">مع العائلة</option>
                <option value="friends">مع الأصدقاء</option>
            </select>
        </div>

        {{-- هل أنت متقيد بلغة معينة أثناء السفر؟ --}}
        <div>
            <label class="block mb-2 font-medium text-gray-700">هل أنت متقيد بلغة معينة أثناء السفر؟</label>
            <select name="language_preference" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                <option value="">اختر اللغة المفضلة</option>
                <option value="english">الإنجليزية</option>
                <option value="arabic">العربية</option>
                <option value="no_preference">لا توجد لغة معينة</option>
            </select>
        </div>


        {{-- زر الإرسال --}}
        <div class="text-center pt-4">
            <button type="submit" class="bg-pink-500 hover:bg-pink-600 text-white px-8 py-3 rounded-full text-lg font-bold">
                إرسال الاقتراح
            </button>
        </div>
    </form>

@endsection


