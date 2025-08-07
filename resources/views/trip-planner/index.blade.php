@extends('layout.app')

@section('title', 'مخطط الرحلات')

@section('content')
<form action="{{ route('trip-planner') }}" method="GET">
    <div class="mb-10 text-center">
        <h1 class="text-4xl font-bold text-gray-800">مخطط الرحلات</h1>
        <p class="text-gray-500 mt-2 text-xl">اجعل تخطيط سفرك ممتعًا وسهلاً</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 px-4 sm:px-10 md:px-20">
        {{-- بيانات الرحلة و إعداد الميزانية في العمود الأيمن --}}
        <div class="md:col-span-2 space-y-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">الوجهة:</label>
                    <select name="destination" class="w-full rounded-lg border-gray-300 shadow-sm text-lg py-2 px-4">
                        <option value="">اختر الوجهة</option>
                        @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ request('destination') == $country->id ? 'selected' : '' }}>
                            {{ $country->name }}
                        </option>
                        @endforeach
                    </select>

                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">تاريخ الذهاب:</label>
                    <input type="date" name="departure_date" class="w-full rounded-lg border-gray-300 shadow-sm text-lg py-2 px-4" min="{{ date('Y-m-d') }}" value="{{ request('departure_date') }}" onchange="updateReturnDateMin(this.value)">
                    @error('departure_date')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">تاريخ العودة:</label>
                    <input type="date" name="return_date" class="w-full rounded-lg border-gray-300 shadow-sm text-lg py-2 px-4" min="{{ request('departure_date') ?? date('Y-m-d') }}" value="{{ request('return_date') }}">
                    @error('return_date')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                @push('scripts')
                <script>
                    function updateReturnDateMin(departureDate) {
                        const returnDateInput = document.querySelector('input[name="return_date"]');
                        returnDateInput.min = departureDate;

                        // إذا كان تاريخ العودة أقل من تاريخ الذهاب الجديد، نحدثه
                        if (returnDateInput.value && returnDateInput.value < departureDate) {
                            returnDateInput.value = departureDate;
                        }
                    }

                    // تعيين الحد الأدنى لتاريخ الذهاب عند تحميل الصفحة
                    document.addEventListener('DOMContentLoaded', function() {
                        const today = new Date().toISOString().split('T')[0];
                        const departureInput = document.querySelector('input[name="departure_date"]');
                        const returnInput = document.querySelector('input[name="return_date"]');

                        departureInput.min = today;
                        returnInput.min = departureInput.value || today;
                    });

                </script>
                @endpush
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
            @if(isset($trip) && $forecast = $trip->forecast)
            <div class="mb-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4">الطقس المتوقع</h3>
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <img src="https://openweathermap.org/img/wn/{{ $forecast['icon'] }}@2x.png" alt="Weather Icon" class="w-16 h-16">
                        <div class="mr-4">
                            <div class="text-3xl font-bold text-gray-900">{{ $forecast['temp'] }}°C</div>
                            <div class="text-gray-600">{{ $forecast['description'] }}</div>
                        </div>
                    </div>
                    <div class="text-left">
                        <div class="text-sm text-gray-500">{{ $forecast['date'] }}</div>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-2 mt-4">
                    <div class="text-center p-2 bg-gray-50 rounded-lg">
                        <div class="text-sm text-gray-500">الإحساس</div>
                        <div class="font-semibold text-gray-700">{{ $forecast['feels_like'] }}°C</div>
                    </div>
                    <div class="text-center p-2 bg-gray-50 rounded-lg">
                        <div class="text-sm text-gray-500">الرطوبة</div>
                        <div class="font-semibold text-gray-700">{{ $forecast['humidity'] }}%</div>
                    </div>
                    <div class="text-center p-2 bg-gray-50 rounded-lg">
                        <div class="text-sm text-gray-500">سرعة الرياح</div>
                        <div class="font-semibold text-gray-700">{{ $forecast['wind_speed'] }} كم/س</div>
                    </div>
                </div>
            </div>
            @endif

            <h3 class="text-md font-bold text-gray-700 border-b pb-2">معلومات رحلتك:</h3>
            <ul class="text-sm text-gray-600 space-y-2">
                <li>عدد أيام الذهاب: {{ $tripDays ?? 'يرجى تحديد تواريخ الرحلة' }}</li>
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
