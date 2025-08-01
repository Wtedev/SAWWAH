@extends('layout')


@section('title', isset($event) ? 'تعديل فعالية' : 'إضافة فعالية')

@section('content')

    <div class="text-center mb-10">
        <h1 class="text-3xl font-bold text-gray-800">
            {{ isset($event) ? 'تعديل فعالية' : 'إضافة فعالية' }}
        </h1>
        <p class="text-gray-500 mt-2">يرجى تعبئة البيانات التالية بدقة لإدارة الفعاليات السياحية.</p>
    </div>

    <form method="POST" action="{{ isset($event) ? route('admin.events.update', $event->id) : route('admin.events.store') }}" enctype="multipart/form-data" class="max-w-3xl mx-auto space-y-6">
        @csrf
        @if(isset($event))
            @method('PUT')
        @endif

        {{-- اسم الفعالية --}}
        <div>
            <label class="block mb-2 font-medium text-gray-700">اسم الفعالية:</label>
            <input type="text" name="name" value="{{ old('name', $event->name ?? '') }}" required class="w-full border-gray-300 rounded-lg shadow-sm">
        </div>

        {{-- وصف الفعالية --}}
        <div>
            <label class="block mb-2 font-medium text-gray-700">الوصف:</label>
            <textarea name="description" rows="4" required class="w-full border-gray-300 rounded-lg shadow-sm">{{ old('description', $event->description ?? '') }}</textarea>
        </div>

        {{-- التاريخ --}}
        <div>
            <label class="block mb-2 font-medium text-gray-700">تاريخ الفعالية:</label>
            <input type="date" name="date" value="{{ old('date', $event->date ?? '') }}" required class="w-full border-gray-300 rounded-lg shadow-sm">
        </div>

        {{-- الموقع --}}
        <div>
            <label class="block mb-2 font-medium text-gray-700">الموقع:</label>
            <input type="text" name="location" value="{{ old('location', $event->location ?? '') }}" required class="w-full border-gray-300 rounded-lg shadow-sm">
        </div>

        {{-- صورة الفعالية --}}
        <div>
            <label class="block mb-2 font-medium text-gray-700">صورة الفعالية:</label>
            <input type="file" name="image" class="w-full border-gray-300 rounded-lg shadow-sm">
        </div>

        {{-- زر حفظ --}}
        <div class="text-center pt-4">
            <button type="submit" class="bg-pink-500 hover:bg-pink-600 text-white px-8 py-3 rounded-full text-lg font-bold">
                {{ isset($event) ? 'تحديث الفعالية' : 'حفظ الفعالية' }}
            </button>
        </div>
    </form>

@endsection
