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
                            <p class="text-gray-600 text-sm">{{ $country->description }}</p>
                        </div>
                    </div>

            </div>
        </div>
    </div>
@endsection
