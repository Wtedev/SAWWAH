@extends('layout.app')

@section('title', 'مخطط الرحلات')

@section('content')

    <div class="mb-10 text-center">
        <h1 class="text-3xl font-bold text-gray-800">مخطط الرحلات</h1>
        <p class="text-gray-500 mt-2">عبارة تسويقية من سطر عبارة تسويقية من سطر عبارة تسويقية من سطر</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

        {{-- بيانات الرحلة --}}
        <div class="md:col-span-2 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">الوجهة:</label>
                    <input type="text" placeholder="المدينة - الدولة" class="w-full rounded border-gray-300 shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">تاريخ الذهاب:</label>
                    <input type="date" class="w-full rounded border-gray-300 shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">تاريخ العودة:</label>
                    <input type="date" class="w-full rounded border-gray-300 shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">تاريخ الذهاب:</label>
                    <input type="date" class="w-full rounded border-gray-300 shadow-sm">
                </div>
            </div>

            {{-- إعداد الميزانية --}}
            <h2 class="text-lg font-semibold text-gray-800 mt-6">إعداد الميزانية:</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="text" placeholder="الميزانية الكاملة" class="w-full rounded border-gray-300 shadow-sm">
                <input type="text" placeholder="المواصلات" class="w-full rounded border-gray-300 shadow-sm">
                <input type="text" placeholder="الطعام" class="w-full rounded border-gray-300 shadow-sm">
                <input type="text" placeholder="الترفيه والفعاليات" class="w-full rounded border-gray-300 shadow-sm">
            </div>
        </div>

        {{-- معلومات إضافية + مجموع الميزانية --}}
        <div class="bg-white p-6 rounded-lg shadow space-y-4">
            <h3 class="text-md font-bold text-gray-700 border-b pb-2">معلومات رحلتك:</h3>
            <ul class="text-sm text-gray-600 space-y-2">
                <li>عدد أيام الذهاب</li>
                <li>الطقس المتوقع</li>
                <li>الميزانية اليومية المقترحة</li>
                <li>العملة</li>
            </ul>

            <h3 class="text-md font-bold text-gray-700 mt-6 border-b pb-2">وجهتك هي:</h3>
            <div class="text-sm text-gray-600 space-y-2">
                <p>مجموعة ميزانيتك للمواصلات: 0000 ريال</p>
                <p>مجموعة ميزانيتك للطعام: 0000 ريال</p>
                <p>مجموعة ميزانيتك للترفيه والفعاليات: 0000 ريال</p>
                <hr>
                <p class="font-bold text-gray-800">المجموع الكامل: 0000 ريال</p>
            </div>
        </div>
    </div>

@endsection
