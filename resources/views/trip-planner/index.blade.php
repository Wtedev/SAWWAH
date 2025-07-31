@extends('layouts.app')

@section('title', 'الرحلات')

@section('content')
<div class="py-16 px-6 max-w-6xl mx-auto">
    <h1 class="text-3xl font-bold text-blue-800 mb-8 text-center">🌍 استعرض جميع الرحلات</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($trips as $trip)
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <img src="{{ $trip->country->image_url }}" alt="رحلة" class="w-full h-48 object-cover">
            <div class="p-4">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $trip->country->name }}</h2>
                <p class="text-gray-600 mb-4">{{ $trip->notes }}</p>
                <p class="text-gray-600 mb-4">تاريخ الرحلة: {{ $trip->start_date }} إلى {{ $trip->end_date }}</p>
                <a href="{{ route('trips.show', ['id' => $trip->id]) }}" class="inline-block text-white bg-blue-600 px-4 py-2 rounded hover:bg-blue-700 transition">
                    تفاصيل الرحلة
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

