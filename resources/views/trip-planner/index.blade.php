@extends('layout.app')

@section('title', 'مخطط الرحلات')

@section('content')
{{-- خليته فورم -> lama --}}
<form action="{{ route('trip-planner') }}" method="GET">
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
                    {{-- حطيته دروب داون -> lama --}}
                    <select class="w-full rounded border-gray-300 shadow-sm">
                        <option value="">اختر دولة</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">تاريخ الذهاب:</label>
                    <input type="date" name="departure_date" class="w-full rounded border-gray-300 shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">تاريخ العودة:</label>
                    <input type="date" name="return_date" class="w-full rounded border-gray-300 shadow-sm">
                </div>
                {{-- تم حذفه لانه مكرر --> lama --}}
                {{-- <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">تاريخ الذهاب:</label>
                    <input type="date" class="w-full rounded border-gray-300 shadow-sm">
                </div> --}}
                 
            </div>

            {{-- إعداد الميزانية --}}
            <h2 class="text-lg font-semibold text-gray-800 mt-6">إعداد الميزانية:</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="number" name="total_budget" placeholder="الميزانية الكاملة" class="w-full rounded border-gray-300 shadow-sm">
                <input type="number" name="transport_budget" placeholder="المواصلات" class="w-full rounded border-gray-300 shadow-sm">
                <input type="number" name="food_budget" placeholder="الطعام" class="w-full rounded border-gray-300 shadow-sm">
                <input type="number" name="entertainment_budget" placeholder="الترفيه والفعاليات" class="w-full rounded border-gray-300 shadow-sm">
            </div>
            <div class="mt-4 text-center">
                <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded">تخطيط الرحلة</button>
            </div>
    </form>

        {{-- معلومات إضافية + مجموع الميزانية --}}
        <div class="bg-white p-6 rounded-lg shadow space-y-4">
            <h3 class="text-md font-bold text-gray-700 border-b pb-2">معلومات رحلتك:</h3>
            <ul class="text-sm text-gray-600 space-y-2">
                <li>عدد أيام الذهاب: {{ $tripDays ?? 'يرجى تحديد تواريخ الرحلة' }}</li>
                <li>الطقس المتوقع</li>
                <li>الميزانية اليومية المقترحة</li>
                <li>العملة</li>
            </ul>

            <h3 class="text-md font-bold text-gray-700 mt-6 border-b pb-2">وجهتك هي:</h3>
            <div class="text-sm text-gray-600 space-y-2">
                <p>مجموعة ميزانيتك للمواصلات: {{ number_format($transportBudget, 2) }} ريال</p>
                <p>مجموعة ميزانيتك للطعام: {{ number_format($foodBudget, 2) }} ريال</p>
                <p>مجموعة ميزانيتك للترفيه والفعاليات: {{ number_format($entertainmentBudget, 2) }} ريال</p>
                <hr>
                <p class="font-bold text-gray-800">المجموع الكامل: {{ number_format($totalBudget, 2) }} ريال</p>
            </div>
        </div>
    </div>

@endsection
