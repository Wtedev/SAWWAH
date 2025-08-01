@extends('layout.app')

@section('title', isset($event) ? 'تعديل فعالية' : 'إضافة فعالية')

@section('content')
<h1 class="text-2xl font-bold mb-4">
    {{ isset($event) ? '✏️ تعديل الفعالية' : '➕ إضافة فعالية' }}
</h1>

<form method="POST" action="{{ isset($event) ? route('admin.events.update', $event->id) : route('admin.events.store') }}">
    @csrf
    @if(isset($event))
        @method('PUT')
    @endif

    <div class="mb-4">
        <label class="block mb-1 font-semibold">عنوان الفعالية</label>
        <input type="text" name="title" value="{{ $event->title ?? '' }}" class="w-full border rounded px-3 py-2">
    </div>

    <div class="mb-4">
        <label class="block mb-1 font-semibold">الوصف</label>
        <textarea name="description" class="w-full border rounded px-3 py-2">{{ $event->description ?? '' }}</textarea>
    </div>

    <div class="mb-4">
        <label class="block mb-1 font-semibold">المدينة</label>
        <input type="text" name="city" value="{{ $event->city ?? '' }}" class="w-full border rounded px-3 py-2">
    </div>

    <div class="mb-4">
        <label class="block mb-1 font-semibold">تاريخ البداية</label>
        <input type="date" name="start_date" value="{{ $event->start_date ?? '' }}" class="w-full border rounded px-3 py-2">
    </div>

    <div class="mb-4">
        <label class="block mb-1 font-semibold">تاريخ النهاية</label>
        <input type="date" name="end_date" value="{{ $event->end_date ?? '' }}" class="w-full border rounded px-3 py-2">
    </div>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
        {{ isset($event) ? 'تحديث' : 'إضافة' }}
    </button>
</form>
@endsection
