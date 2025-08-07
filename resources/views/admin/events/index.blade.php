@extends('admin.layout')

@section('title', 'إدارة الفعاليات')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">قائمة الفعاليات</h1>
        <a href="{{ route('admin.events.create') }}" class="bg-pink-600 hover:bg-pink-700 text-white font-bold px-6 py-2 rounded-lg transition-colors">
            إضافة فعالية جديدة
        </a>
    </div>

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($events as $event)
        <div class="border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex justify-between items-start mb-3">
                <h3 class="text-lg font-bold text-gray-800">{{ $event->name }}</h3>
                @if($event->is_featured ?? false)
                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2 py-1 rounded">مميزة</span>
                @endif
            </div>

            <p class="text-gray-600 mb-3 text-sm">{{ Str::limit($event->description, 100) }}</p>

            <div class="text-sm text-gray-500 space-y-1 mb-4">
                <p>المدينة: {{ $event->city }}</p>
                <p>من: {{ $event->start_date }} إلى: {{ $event->end_date }}</p>
                @if($event->location)
                <p>الموقع: {{ $event->location }}</p>
                @endif
                @if($event->price)
                <p>السعر: {{ $event->price }}</p>
                @endif
            </div>

            <div class="flex gap-2">
                <a href="{{ route('admin.events.edit', $event->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white text-xs font-medium px-3 py-1 rounded transition-colors">
                    تعديل
                </a>
                <form method="POST" action="{{ route('admin.events.destroy', $event->id) }}" class="inline" onsubmit="return confirm('هل أنت متأكد من حذف هذه الفعالية؟')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-xs font-medium px-3 py-1 rounded transition-colors">
                        حذف
                    </button>
                </form>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-12">
            <div class="text-gray-400 text-6xl mb-4">الفعاليات</div>
            <h3 class="text-lg font-medium text-gray-900 mb-2">لا توجد فعاليات</h3>
            <p class="text-gray-500 mb-4">ابدأ بإضافة أول فعالية</p>
            <a href="{{ route('admin.events.create') }}" class="bg-pink-600 hover:bg-pink-700 text-white font-bold px-6 py-2 rounded-lg transition-colors">
                إضافة فعالية جديدة
            </a>
        </div>
        @endforelse
    </div>
</div>
@endsection
