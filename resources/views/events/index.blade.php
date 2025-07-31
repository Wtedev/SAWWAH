@extends('layouts.app')

@section('title', 'أهم الفعاليات - سواح')

@section('content')
    <div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-10">
                <h1 class="text-4xl font-extrabold text-gray-900 mb-4">اكتشف أهم الفعاليات السياحية 🎉</h1>
                <p class="text-lg text-gray-600">
                    استمتع بأفضل الفعاليات السياحية والمهرجانات حول العالم.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach ($events as $event)
                    <a href="{{ route('events.show', $event->slug) }}" class="block bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <img class="w-full h-48 object-cover" src="{{ $event->image_url }}" alt="{{ $event->name }}">
                        <div class="p-4">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $event->name }}</h3>
                            <p class="text-gray-600 text-sm">{{ $event->description }}</p>
                            <div class="mt-3 flex items-center text-gray-500 text-sm">
                                <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span>{{ $event->date }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
