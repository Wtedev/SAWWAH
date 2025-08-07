
@extends('layout.app')

@section('title', $event->name . ' - سواح')

@section('content')
<div class="min-h-screen bg-gray-50">
    {{-- صورة الغلاف --}}
    <div class="relative h-96">
        <div class="absolute inset-0">
            <img src="{{ asset('images/' . $event->image) }}" alt="{{ $event->name }}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        </div>
        <div class="relative h-full flex flex-col justify-center items-center text-white text-center px-4">
            <h1 class="text-5xl font-bold mb-4">{{ $event->name }}</h1>
            <p class="text-xl max-w-2xl">{{ $event->description }}</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- المعلومات الرئيسية --}}
            <div class="lg:col-span-2 space-y-8">
                {{-- تفاصيل الفعالية --}}
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="p-6">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">تفاصيل الفعالية</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="flex items-start space-x-4 rtl:space-x-reverse">
                                <div class="flex-shrink-0">
                                    <span class="p-2 bg-pink-100 rounded-lg text-pink-600">
                                        <i class="fas fa-calendar text-xl"></i>
                                    </span>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">موعد الفعالية</dt>
                                    <dd class="mt-1 text-lg font-semibold text-gray-900">
                                        {{ $event->start_date->format('Y/m/d') }}
                                        @if($event->end_date)
                                        - {{ $event->end_date->format('Y/m/d') }}
                                        @endif
                                    </dd>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4 rtl:space-x-reverse">
                                <div class="flex-shrink-0">
                                    <span class="p-2 bg-blue-100 rounded-lg text-blue-600">
                                        <i class="fas fa-map-marker-alt text-xl"></i>
                                    </span>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">الموقع</dt>
                                    <dd class="mt-1 text-lg font-semibold text-gray-900">
                                        {{ $event->location }}
                                        <div class="text-sm text-gray-500">{{ $event->city }}, {{ $event->country->name }}</div>
                                    </dd>
                                </div>
                            </div>

                            @if($event->price)
                            <div class="flex items-start space-x-4 rtl:space-x-reverse">
                                <div class="flex-shrink-0">
                                    <span class="p-2 bg-green-100 rounded-lg text-green-600">
                                        <i class="fas fa-ticket-alt text-xl"></i>
                                    </span>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">سعر التذكرة</dt>
                                    <dd class="mt-1 text-lg font-semibold text-gray-900">
                                        {{ number_format($event->price, 2) }} ريال
                                    </dd>
                                </div>
                            </div>
                            @endif

                            @if($event->capacity)
                            <div class="flex items-start space-x-4 rtl:space-x-reverse">
                                <div class="flex-shrink-0">
                                    <span class="p-2 bg-purple-100 rounded-lg text-purple-600">
                                        <i class="fas fa-users text-xl"></i>
                                    </span>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">السعة</dt>
                                    <dd class="mt-1 text-lg font-semibold text-gray-900">
                                        {{ number_format($event->capacity) }} شخص
                                    </dd>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- الوصف التفصيلي --}}
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="p-6">
                        <h2 class="text-2xl font-bold text-gray-800 mb-4">عن الفعالية</h2>
                        <div class="prose max-w-none text-gray-600">
                            {{ $event->description }}
                        </div>
                    </div>
                </div>
            </div>

            {{-- العمود الجانبي --}}
            <div class="space-y-8">
                {{-- معلومات البلد --}}
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="p-6">
                        <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ $event->country->name }}</h2>
                        <p class="text-gray-600 mb-4">{{ $event->country->description }}</p>
                        <a href="{{ route('countries.show', $event->country) }}" class="inline-block bg-pink-600 text-white px-4 py-2 rounded-lg hover:bg-pink-700 transition-colors">
                            اكتشف الوجهة
                        </a>
                    </div>
                </div>

                {{-- فعاليات مشابهة --}}
                @if($relatedEvents->isNotEmpty())
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="p-6">
                        <h2 class="text-2xl font-bold text-gray-800 mb-4">فعاليات مشابهة</h2>
                        <div class="space-y-4">
                            @foreach($relatedEvents as $relatedEvent)
                            <a href="{{ route('events.show', $relatedEvent) }}" class="block group">
                                <div class="flex items-center space-x-4 rtl:space-x-reverse">
                                    <div class="flex-shrink-0">
                                        <img src="{{ asset('images/' . $relatedEvent->image) }}" alt="{{ $relatedEvent->name }}" class="w-16 h-16 rounded-lg object-cover">
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900 group-hover:text-pink-600">
                                            {{ $relatedEvent->name }}
                                        </h3>
                                        <p class="text-sm text-gray-500">
                                            {{ $relatedEvent->start_date->format('Y/m/d') }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
        
        {{-- زر الرجوع --}}
        <div class="mt-8">
            <a href="{{ route('events.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-800 rounded-lg hover:bg-gray-200 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 rtl:rotate-180" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                الرجوع للفعاليات
            </a>
        </div>
    </div>
</div>
@endsection

