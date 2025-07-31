@extends('layout.app')

@section('title', 'نتيجة الاقتراح')

@section('content')

    <div class="text-center mb-10">
        <h1 class="text-3xl font-bold text-gray-800">وجهتك هي:</h1>
        <p class="text-gray-500 mt-2">تم تحليل اقتراحك وتقديم وجهة مناسبة بناءً على اختياراتك وميزانيتك.</p>
    </div>

    {{-- معلومات الميزانية --}}
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow p-6 mb-8">
        <h2 class="text-lg font-bold text-gray-700 mb-4">تفاصيل الميزانية المقترحة:</h2>
        <ul class="text-gray-600 text-sm space-y-2">
            <li>✈️ المواصلات: <span class="font-bold text-gray-800">1,200 ريال</span></li>
            <li>🍴 الطعام: <span class="font-bold text-gray-800">800 ريال</span></li>
            <li>🎟️ الترفيه والفعاليات: <span class="font-bold text-gray-800">700 ريال</span></li>
            <hr>
            <li class="pt-2 font-bold text-gray-900">💰 المجموع الكامل: 2,700 ريال</li>
        </ul>
    </div>

    {{-- ملخص الوجهة --}}
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow p-6 mb-8">
        <h2 class="text-lg font-bold text-gray-700 mb-4">الوجهة المقترحة:</h2>
        <p class="text-sm text-gray-600 mb-2">
            باريس، فرنسا - رحلة مخصصة لك في موسم الصيف لمدة 5 أيام.
        </p>
        <p class="text-sm text-gray-500">
            نوصي بزيارة برج إيفل، نهر السين، ومتحف اللوفر. الطقس المتوقع معتدل، والعملة المستخدمة هي اليورو.
        </p>
    </div>

    {{-- زر العودة أو حفظ --}}
    <div class="text-center">
        <a href="{{ url('/suggest') }}" class="bg-pink-500 hover:bg-pink-600 text-white px-8 py-3 rounded-full text-lg font-bold">
            إعادة الاقتراح
        </a>
    </div>

@endsection
