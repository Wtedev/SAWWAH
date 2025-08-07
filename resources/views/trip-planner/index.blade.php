@extends('layout.app')

@section('title', 'مخطط الرحلات')

@section('content')
<form action="{{ route('trip-planner') }}" method="GET">
    <div class="mb-10 text-center">
        <h1 class="text-4xl font-bold text-gray-800">مخطط الرحلات</h1>
        <p class="text-gray-500 mt-2 text-xl">اجعل تخطيط سفرك ممتعًا وسهلاً🗺️</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 px-4 sm:px-10 md:px-20">
        {{-- بيانات الرحلة و إعداد الميزانية في العمود الأيمن --}}
        <div class="md:col-span-2 space-y-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">الوجهة:</label>
                    <select class="w-full rounded-lg border-gray-300 shadow-sm text-lg py-2 px-4">
    <option value="">اختر مدينة</option>
    <option value="riyadh">الرياض</option>
    <option value="khobar">الخبر</option>
    <option value="alula">العلا</option>
    <option value="dubai">دبي</option>
    <option value="qatar">قطر</option>
    <option value="other">غيرها</option>
</select>

                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">تاريخ الذهاب:</label>
                    <input type="date" name="departure_date" class="w-full rounded-lg border-gray-300 shadow-sm text-lg py-2 px-4">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">تاريخ العودة:</label>
                    <input type="date" name="return_date" class="w-full rounded-lg border-gray-300 shadow-sm text-lg py-2 px-4">
                </div>
            </div>

            {{-- إعداد الميزانية --}}
            <h2 class="text-lg font-semibold text-gray-800 mt-6">إعداد الميزانية:</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <input type="number" name="total_budget" placeholder="الميزانية الكاملة" class="w-full rounded-lg border-gray-300 shadow-sm text-lg py-2 px-4">
                <input type="number" name="transport_budget" placeholder="المواصلات" class="w-full rounded-lg border-gray-300 shadow-sm text-lg py-2 px-4">
                <input type="number" name="food_budget" placeholder="الطعام" class="w-full rounded-lg border-gray-300 shadow-sm text-lg py-2 px-4">
                <input type="number" name="entertainment_budget" placeholder="الترفيه والفعاليات" class="w-full rounded-lg border-gray-300 shadow-sm text-lg py-2 px-4">
            </div>
            <div class="mt-6 text-center">
                <button type="submit" class="px-8 py-3 bg-pink-500 text-white rounded-full text-xl">تخطيط الرحلة</button>
            </div>
        </div>

        {{-- معلومات إضافية + مجموع الميزانية في العمود الأيسر --}}
        <div class="bg-white p-6 rounded-lg shadow space-y-6">
            <h3 class="text-md font-bold text-gray-700 border-b pb-2">معلومات رحلتك:</h3>
            <ul class="text-sm text-gray-600 space-y-2">
                <li>عدد أيام الذهاب: {{ $tripDays ?? 'يرجى تحديد تواريخ الرحلة' }}</li>
                <li>الطقس المتوقع</li>
                <li>الميزانية اليومية المقترحة</li>
                <li>العملة</li>
            </ul>

            <h3 class="text-md font-bold text-gray-700 mt-6 border-b pb-2">وجهتك هي:</h3>
            <div class="text-sm text-gray-600 space-y-4">
                <p>مجموعة ميزانيتك للمواصلات: {{ number_format($transportBudget, 2) }} ريال</p>
                <p>مجموعة ميزانيتك للطعام: {{ number_format($foodBudget, 2) }} ريال</p>
                <p>مجموعة ميزانيتك للترفيه والفعاليات: {{ number_format($entertainmentBudget, 2) }} ريال</p>
                <hr>
                <p class="font-bold text-gray-800">المجموع الكامل: {{ number_format($totalBudget, 2) }} ريال</p>
            </div>
        </div>
    </div>
</form>
@endsection

