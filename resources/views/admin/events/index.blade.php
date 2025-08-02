@extends('layout.app')

@section('title', 'إدارة الفعاليات')

@section('content')
<h1 class="text-2xl font-bold mb-4">قائمة الفعاليات</h1>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($events as $event)
        <div class="event-card border p-4 rounded-lg shadow" data-city="{{ $event->city }}">
            <h3 class="text-lg font-bold">🎉 {{ $event->title }}</h3>
            <p class="text-gray-600">{{ $event->description }}</p>
            <p class="text-sm text-gray-500 mt-2">📍 {{ $event->city }} | 📅 {{ $event->start_date }}</p>
            <a href="{{ route('admin.events.edit', $event->id) }}" class="text-blue-500 underline mt-2 inline-block">تعديل</a>
        </div>
    @empty
        <p class="text-center text-gray-500">لا توجد فعاليات حالياً.</p>
    @endforelse
</div>
@endsection
