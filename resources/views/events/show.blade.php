@extends('layout.app')

@section('title', $event->title)

@section('content')
<div class="max-w-4xl mx-auto py-16 px-6">
    <h1 class="text-4xl font-bold text-pink-600 mb-4">{{ $event->title }}</h1>
    
    <p class="text-gray-700 mb-2">
        <strong>المدينة:</strong> {{ $event->city ?? 'غير محددة' }}
    </p>
    
    <p class="text-gray-700 mb-2">
        <strong>من:</strong> {{ $event->start_date ?? '—' }}
        <strong>إلى:</strong> {{ $event->end_date ?? '—' }}
    </p>

    <div class="mt-6">
        <p class="text-lg leading-relaxed text-gray-800">
            {{ $event->description ?? 'لا توجد تفاصيل إضافية للفعالية.' }}
        </p>
    </div>

    <div class="mt-8">
        <a href="{{ route('events.index') }}" class="inline-block px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">
            ← الرجوع للفعاليات
        </a>
    </div>
</div>
@endsection

