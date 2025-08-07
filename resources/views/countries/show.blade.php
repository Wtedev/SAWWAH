@extends('layout.app')

@section('title', $country->name . ' - سواح')

@section('content')
    <div class="min-h-screen bg-gray-50">
        {{-- صورة الغلاف مع اسم الدولة --}}
        <div class="relative h-96">
            <div class="absolute inset-0">
                <img src="{{asset('images/'.$country->image)}}" 
                     alt="{{ $country->name }}" 
                     class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-50"></div>
            </div>
            <div class="relative h-full flex flex-col justify-center items-center text-white text-center px-4">
                <h1 class="text-5xl font-bold mb-4">{{ $country->name }}</h1>
                <p class="text-xl max-w-2xl">{{ $country->description }}</p>
            </div>
        </div>

        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                {{-- العمود الأيمن: معلومات أساسية --}}
                <div class="lg:col-span-2 space-y-8">
                    {{-- معلومات عامة --}}
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <div class="p-6">
                            <h2 class="text-2xl font-bold text-gray-800 mb-4">معلومات عامة</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="flex items-start space-x-4 rtl:space-x-reverse">
                                    <div class="flex-shrink-0">
                                        <span class="p-2 bg-pink-100 rounded-lg text-pink-600">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </span>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">العملة</dt>
                                        <dd class="mt-1 text-lg font-semibold text-gray-900">{{ $country->currency }}</dd>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-4 rtl:space-x-reverse">
                                    <div class="flex-shrink-0">
                                        <span class="p-2 bg-green-100 rounded-lg text-green-600">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                                            </svg>
                                        </span>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500">أفضل وقت للزيارة</dt>
                                        <dd class="mt-1 text-lg font-semibold text-gray-900">{{ $country->best_month_to_travel }}</dd>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                            <!-- معلومات الطقس -->
                            @if($weather = $country->weather)
                            <div class="bg-blue-50 rounded-lg p-4">
                                <h4 class="text-lg font-semibold text-gray-800 mb-2">الطقس الحالي</h4>
                                <div class="flex items-center">
                                    <img src="https://openweathermap.org/img/wn/{{ $weather['icon'] }}@2x.png" 
                                         alt="Weather Icon" 
                                         class="w-12 h-12">
                                    <div class="mr-2">
                                        <div class="text-2xl font-bold text-gray-900">{{ $weather['temp'] }}°C</div>
                                        <div class="text-gray-600">{{ $weather['description'] }}</div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-3 gap-2 mt-4">
                                    <div class="text-center">
                                        <div class="text-gray-600 text-sm">الإحساس</div>
                                        <div class="font-semibold">{{ $weather['feels_like'] }}°C</div>
                                    </div>
                                    <div class="text-center">
                                        <div class="text-gray-600 text-sm">الرطوبة</div>
                                        <div class="font-semibold">{{ $weather['humidity'] }}%</div>
                                    </div>
                                    <div class="text-center">
                                        <div class="text-gray-600 text-sm">الرياح</div>
                                        <div class="font-semibold">{{ $weather['wind_speed'] }} كم/س</div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            {{-- الفعاليات --}}
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <div class="p-6">
                            <h2 class="text-2xl font-bold text-gray-800 mb-6">الفعاليات القادمة</h2>
                            @if($country->events && $country->events->count() > 0)
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    @foreach($country->events as $event)
                                    <div class="group relative bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-lg transition-shadow">
                                        <div class="aspect-w-16 aspect-h-9">
                                            <img src="{{ asset('images/' . $event->image) }}" 
                                                 alt="{{ $event->name }}"
                                                 class="w-full h-48 object-cover group-hover:opacity-75 transition-opacity">
                                        </div>
                                        <div class="p-4">
                                            <h3 class="text-lg font-semibold text-gray-900">{{ $event->name }}</h3>
                                            <p class="mt-1 text-sm text-gray-500">{{ $event->description }}</p>
                                            <div class="mt-4 flex items-center justify-between">
                                                <span class="text-sm font-medium text-pink-600">
                                                    {{ $event->start_date->format('Y/m/d') }}
                                                </span>
                                                <a href="{{ route('events.show', $event) }}" 
                                                   class="text-sm font-medium text-pink-600 hover:text-pink-500">
                                                    التفاصيل →
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-gray-500 text-center py-8">لا توجد فعاليات قادمة حالياً</p>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- العمود الأيسر: الطقس والمعلومات الإضافية --}}
                <div class="space-y-8">
                    {{-- كارد الطقس --}}
                    @if($weather = $country->weather)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <div class="p-6">
                            <h2 class="text-2xl font-bold text-gray-800 mb-4">الطقس الحالي</h2>
                            <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex items-center">
                                        <img src="https://openweathermap.org/img/wn/{{ $weather['icon'] }}@2x.png" 
                                             alt="Weather Icon" 
                                             class="w-20 h-20">
                                        <div class="mr-4">
                                            <div class="text-4xl font-bold text-gray-900">{{ $weather['temp'] }}°C</div>
                                            <div class="text-lg text-gray-600">{{ $weather['description'] }}</div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="grid grid-cols-3 gap-4">
                                    <div class="bg-white bg-opacity-50 rounded-lg p-3 text-center">
                                        <div class="text-sm text-gray-500">الإحساس</div>
                                        <div class="text-lg font-semibold text-gray-900">{{ $weather['feels_like'] }}°C</div>
                                    </div>
                                    <div class="bg-white bg-opacity-50 rounded-lg p-3 text-center">
                                        <div class="text-sm text-gray-500">الرطوبة</div>
                                        <div class="text-lg font-semibold text-gray-900">{{ $weather['humidity'] }}%</div>
                                    </div>
                                    <div class="bg-white bg-opacity-50 rounded-lg p-3 text-center">
                                        <div class="text-sm text-gray-500">الرياح</div>
                                        <div class="text-lg font-semibold text-gray-900">{{ $weather['wind_speed'] }} كم/س</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    {{-- معلومات إضافية --}}
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <div class="p-6">
                            <h2 class="text-2xl font-bold text-gray-800 mb-4">معلومات إضافية</h2>
                            <div class="space-y-4">
                                <div class="flex items-center justify-between py-3 border-b">
                                    <span class="text-gray-600">الميزانية المقترحة</span>
                                    <span class="font-semibold text-gray-900">{{ $country->preferred_budget }}</span>
                                </div>
                                <div class="flex items-center justify-between py-3 border-b">
                                    <span class="text-gray-600">أفضل للسفر مع</span>
                                    <span class="font-semibold text-gray-900">{{ $country->travel_with }}</span>
                                </div>
                                <div class="flex items-center justify-between py-3">
                                    <span class="text-gray-600">اللغة المفضلة</span>
                                    <span class="font-semibold text-gray-900">{{ $country->language_preference }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
