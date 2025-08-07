@extends('layout.app')

@section('title', $country->name . ' - سواح') {{-- عنوان الصفحة --}}

@section('content')
    <div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-10">
                <h1 class="text-4xl font-extrabold text-gray-900 mb-4">{{ $country->name }}</h1>
                <p class="text-lg text-gray-600">{{ $country->description }}</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">

                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img class="w-full h-48 object-cover" src="{{asset('uploads/'.$country->image)}}" alt="{{ $country->name }}">
                        <div class="p-4">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $country->name }}</h3>
                            <p class="text-gray-600 text-sm mb-4">{{ $country->description }}</p>

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
                        </div>
                    </div>

            </div>
        </div>
    </div>
@endsection
