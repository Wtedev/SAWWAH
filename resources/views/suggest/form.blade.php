@extends('layout.app')

@section('title', 'نظام الإقتراح الذكي')

@section('content')

    <div class="mb-10 text-center">
        <h1 class="text-3xl font-bold text-gray-800">نظام الإقتراح الذكي</h1>
        <p class="text-gray-500 mt-2">عبارة تسويقية من سطر عبارة تسويقية من سطر عبارة تسويقية من سطر</p>
    </div>

    <form method="POST" action="{{ route('suggest.store') }}" class="max-w-3xl mx-auto space-y-6">
        @csrf

        {{-- اختيار الوجهة --}}
        <div>
            <label class="block mb-2 font-medium text-gray-700">الوجهة المطلوبة:</label>
            <select class="w-full border-gray-300 rounded-lg shadow-sm">
                <option>القيمة تُختار هنا</option>
                <option>فرنسا</option>
                <option>إيطاليا</option>
                <option>تركيا</option>
            </select>
        </div>

        {{-- اختيار الموسم --}}
        <div>
            <label class="block mb-2 font-medium text-gray-700">الموسم المناسب:</label>
            <select class="w-full border-gray-300 rounded-lg shadow-sm">
                <option>القيمة تُختار هنا</option>
                <option>الشتاء</option>
                <option>الصيف</option>
                <option>الربيع</option>
            </select>
        </div>

        {{-- الميزانية --}}
        <div>
            <label class="block mb-2 font-medium text-gray-700">الميزانية المقترحة (ريال):</label>
            <input type="number" class="w-full border-gray-300 rounded-lg shadow-sm" placeholder="مثال: 5000">
        </div>

        {{-- الرسالة --}}
        <div>
            <label class="block mb-2 font-medium text-gray-700">رسالتك بشكل خاص:</label>
            <textarea class="w-full border-gray-300 rounded-lg shadow-sm" rows="5" placeholder="اكتب نص رسالتك هنا"></textarea>
        </div>

        {{-- زر الإرسال --}}
        <div class="text-center pt-4">
            <button type="submit" class="bg-pink-500 hover:bg-pink-600 text-white px-8 py-3 rounded-full text-lg font-bold">
                إرسال الاقتراح
            </button>
        </div>
    </form>

@endsection

