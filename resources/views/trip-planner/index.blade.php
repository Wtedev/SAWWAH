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
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
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

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">عدد الأشخاص:</label>
                    <select name="number_of_people" class="w-full rounded-lg border-gray-300 shadow-sm text-lg py-2 px-4">
                        @for($i = 1; $i <= 10; $i++) <option value="{{ $i }}" {{ request('number_of_people', 1) == $i ? 'selected' : '' }}>
                            {{ $i }} {{ $i == 1 ? 'شخص' : 'أشخاص' }}
                            </option>
                            @endfor
                    </select>
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

                        // إضافة تأثيرات تفاعلية
                        const inputs = document.querySelectorAll('input, select');
                        inputs.forEach(input => {
                            input.addEventListener('focus', function() {
                                this.parentElement.classList.add('transform', 'scale-105');
                            });

                            input.addEventListener('blur', function() {
                                this.parentElement.classList.remove('transform', 'scale-105');
                            });
                        });

                        // تحديث الميزانية تلقائياً
                        const budgetInputs = ['transport_budget', 'food_budget', 'entertainment_budget'];
                        budgetInputs.forEach(inputName => {
                            const input = document.querySelector(`input[name="${inputName}"]`);
                            if (input) {
                                input.addEventListener('input', function() {
                                    // تحديث المعاينة المباشرة للميزانية
                                    updateBudgetPreview();
                                });
                            }
                        });

                        // تحديث معاينة الميزانية عند تغيير عدد الأشخاص
                        const peopleSelect = document.querySelector('select[name="number_of_people"]');
                        if (peopleSelect) {
                            peopleSelect.addEventListener('change', function() {
                                updateBudgetPreview();
                            });
                        }
                    });

                    function updateBudgetPreview() {
                        // يمكن إضافة معاينة مباشرة للميزانية هنا
                        const transport = parseFloat(document.querySelector('input[name="transport_budget"]').value) || 0;
                        const food = parseFloat(document.querySelector('input[name="food_budget"]').value) || 0;
                        const entertainment = parseFloat(document.querySelector('input[name="entertainment_budget"]').value) || 0;
                        const people = parseInt(document.querySelector('select[name="number_of_people"]').value) || 1;

                        const total = transport + food + entertainment;
                        const perPerson = total / people;

                        // يمكن عرض هذه القيم في مكان ما في الصفحة
                        console.log(`Total: ${total}, Per Person: ${perPerson}`);
                    }

                </script>
                @endpush
            </div>

            {{-- إعداد الميزانية --}}
            <h2 class="text-lg font-semibold text-gray-800 mt-6">إعداد الميزانية:</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <input type="number" name="total_budget" placeholder="الميزانية الكاملة" value="{{ request('total_budget') }}" class="w-full rounded-lg border-gray-300 shadow-sm text-lg py-2 px-4">
                <input type="number" name="transport_budget" placeholder="المواصلات" value="{{ request('transport_budget') }}" class="w-full rounded-lg border-gray-300 shadow-sm text-lg py-2 px-4">
                <input type="number" name="food_budget" placeholder="الطعام" value="{{ request('food_budget') }}" class="w-full rounded-lg border-gray-300 shadow-sm text-lg py-2 px-4">
                <input type="number" name="entertainment_budget" placeholder="الترفيه والفعاليات" value="{{ request('entertainment_budget') }}" class="w-full rounded-lg border-gray-300 shadow-sm text-lg py-2 px-4">
            </div>
            <div class="mt-6 text-center">
                <button type="submit" class="px-8 py-3 bg-gradient-to-r from-pink-500 to-pink-600 hover:from-pink-600 hover:to-pink-700 text-white rounded-full text-xl shadow-lg transform transition-all duration-200 hover:scale-105 focus:outline-none focus:ring-4 focus:ring-pink-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    تخطيط الرحلة
                </button>
            </div>
        </div>

        {{-- معلومات الرحلة والطقس في العمود الأيسر --}}
        <div class="bg-white p-6 rounded-lg shadow-lg border space-y-6">
            @if($selectedCountry)
            {{-- معلومات الوجهة --}}
            <div class="text-center border-b pb-4">
                <h3 class="text-2xl font-bold text-gray-800 mb-2">{{ $selectedCountry->name }}</h3>
                <div class="flex items-center justify-center text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1.41 16.09V20h-2.67v-1.93c-1.71-.36-3.16-1.46-3.27-3.4h1.96c.1.93.82 1.62 2.02 1.62 1.19 0 1.78-.65 1.78-1.38 0-.72-.59-1.19-2-1.59-2.09-.56-3.81-1.39-3.81-3.67 0-1.72 1.39-2.96 3.34-3.32V4.46h2.67v1.88c1.84.32 2.89 1.73 2.93 3.26h-1.97c-.05-.75-.64-1.56-1.87-1.56-1.1 0-1.8.58-1.8 1.31 0 .67.67 1.13 2.04 1.54 2.14.6 3.81 1.47 3.81 3.71-.01 2-1.45 3.13-3.16 3.49z" />
                    </svg>
                    <span class="font-semibold">{{ $selectedCountry->currency ?? 'غير محدد' }}</span>
                </div>
            </div>

            {{-- بيانات الرحلة --}}
            <div class="space-y-3">
                <h4 class="font-bold text-gray-700 border-b pb-2">تفاصيل الرحلة:</h4>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-600">تاريخ الذهاب:</span>
                        <span class="font-semibold">{{ request('departure_date') ? \Carbon\Carbon::parse(request('departure_date'))->format('Y/m/d') : 'غير محدد' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">تاريخ العودة:</span>
                        <span class="font-semibold">{{ request('return_date') ? \Carbon\Carbon::parse(request('return_date'))->format('Y/m/d') : 'غير محدد' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">مدة الرحلة:</span>
                        <span class="font-semibold">{{ $tripDays ?? 0 }} أيام</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">عدد الأشخاص:</span>
                        <span class="font-semibold">{{ $numberOfPeople }} {{ $numberOfPeople == 1 ? 'شخص' : 'أشخاص' }}</span>
                    </div>
                </div>
            </div>

            {{-- معلومات الطقس --}}
            @if($weatherForecast)
            <div class="space-y-3 border-t pt-4">
                <h4 class="font-bold text-gray-700 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 text-blue-500" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M19.35 10.04C18.67 6.59 15.64 4 12 4 9.11 4 6.6 5.64 5.35 8.04 2.34 8.36 0 10.91 0 14c0 3.31 2.69 6 6 6h13c2.76 0 5-2.24 5-5 0-2.64-2.05-4.78-4.65-4.96z" />
                    </svg>
                    الطقس المتوقع:
                </h4>
                <div class="bg-gradient-to-r from-blue-50 to-sky-50 p-4 rounded-lg">
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center">
                            <img src="https://openweathermap.org/img/wn/{{ $weatherForecast['icon'] }}@2x.png" alt="Weather Icon" class="w-12 h-12">
                            <div class="mr-3">
                                <div class="text-2xl font-bold text-gray-900">{{ $weatherForecast['temp'] }}°C</div>
                                <div class="text-gray-600 text-sm">{{ $weatherForecast['description'] }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-2">
                        <div class="text-center p-2 bg-white bg-opacity-50 rounded">
                            <div class="text-xs text-gray-500">الإحساس</div>
                            <div class="font-semibold text-gray-700">{{ $weatherForecast['feels_like'] }}°C</div>
                        </div>
                        <div class="text-center p-2 bg-white bg-opacity-50 rounded">
                            <div class="text-xs text-gray-500">الرطوبة</div>
                            <div class="font-semibold text-gray-700">{{ $weatherForecast['humidity'] }}%</div>
                        </div>
                        <div class="text-center p-2 bg-white bg-opacity-50 rounded">
                            <div class="text-xs text-gray-500">الرياح</div>
                            <div class="font-semibold text-gray-700">{{ $weatherForecast['wind_speed'] }} كم/س</div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            {{-- الفعاليات المرتبطة بالدولة --}}
            @if($countryEvents && $countryEvents->count() > 0)
            <div class="space-y-3 border-t pt-4">
                <h4 class="font-bold text-gray-700 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 text-purple-500" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z" />
                    </svg>
                    الفعاليات والأنشطة:
                </h4>
                <div class="space-y-2 max-h-40 overflow-y-auto">
                    @foreach($countryEvents as $event)
                    <div class="bg-gradient-to-r from-purple-50 to-pink-50 p-3 rounded-lg border-l-4 border-purple-300">
                        <div class="flex justify-between items-start">
                            <div class="flex-1">
                                <h5 class="font-semibold text-gray-800 text-sm">{{ $event->name }}</h5>
                                <p class="text-xs text-gray-600 mt-1 line-clamp-2">{{ Str::limit($event->description, 80) }}</p>
                                @if($event->event_date)
                                <div class="flex items-center mt-2 text-xs text-purple-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span>{{ \Carbon\Carbon::parse($event->event_date)->format('d/m/Y') }}</span>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @if($countryEvents->count() >= 5)
                <div class="text-center">
                    <p class="text-xs text-gray-500">وفعاليات أخرى متاحة...</p>
                </div>
                @endif
            </div>
            @endif

            {{-- معلومات الميزانية --}}
            @if($totalBudget > 0)
            <div class="space-y-3 border-t pt-4">
                <h4 class="font-bold text-gray-700 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 text-green-500" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85 1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3 2.41 0 .69-.49 1.79-2.7 1.79-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z" />
                    </svg>
                    تفاصيل الميزانية:
                </h4>
                <div class="space-y-2">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">المواصلات:</span>
                        <span class="font-semibold text-blue-600">{{ number_format($transportBudget, 0) }} ريال</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">الطعام:</span>
                        <span class="font-semibold text-orange-600">{{ number_format($foodBudget, 0) }} ريال</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">الترفيه:</span>
                        <span class="font-semibold text-purple-600">{{ number_format($entertainmentBudget, 0) }} ريال</span>
                    </div>
                    <div class="border-t pt-2">
                        <div class="flex justify-between">
                            <span class="font-bold text-gray-800">المجموع:</span>
                            <span class="font-bold text-lg text-green-600">{{ number_format($totalBudget, 0) }} ريال</span>
                        </div>
                        @if($tripDays > 0)
                        <div class="flex justify-between text-sm mt-1">
                            <span class="text-gray-600">الميزانية اليومية:</span>
                            <span class="font-semibold text-gray-700">{{ number_format($totalBudget / $tripDays, 0) }} ريال/يوم</span>
                        </div>
                        @endif
                        @if($numberOfPeople > 1)
                        <div class="flex justify-between text-sm mt-1">
                            <span class="text-gray-600">لكل شخص:</span>
                            <span class="font-semibold text-gray-700">{{ number_format($totalBudget / $numberOfPeople, 0) }} ريال</span>
                        </div>
                        @if($tripDays > 0)
                        <div class="flex justify-between text-sm mt-1">
                            <span class="text-gray-600">لكل شخص يومياً:</span>
                            <span class="font-semibold text-gray-700">{{ number_format($totalBudget / ($numberOfPeople * $tripDays), 0) }} ريال</span>
                        </div>
                        @endif
                        @endif
                    </div>
                </div>
            </div>
            @endif

            @else
            {{-- رسالة ترحيبية قبل اختيار الوجهة --}}
            <div class="text-center py-8">
                <div class="mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-pink-300 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-700 mb-2">خطط رحلتك المثالية</h3>
                <p class="text-gray-600 text-sm">اختر الوجهة والتواريخ لنعرض لك تفاصيل شاملة عن رحلتك</p>
                <ul class="text-xs text-gray-500 mt-4 space-y-1">
                    <li>• معلومات الطقس المتوقع</li>
                    <li>• تفاصيل العملة المحلية</li>
                    <li>• تنظيم الميزانية حسب عدد الأشخاص</li>
                    <li>• الفعاليات والأنشطة المتاحة</li>
                    <li>• مدة الرحلة وعدد المسافرين</li>
                </ul>
            </div>
            @endif
        </div>
    </div>
</form>
@endsection
