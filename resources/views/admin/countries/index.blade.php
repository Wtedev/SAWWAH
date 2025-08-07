@extends('admin.layout')

@section('title', 'إدارة الدول')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">قائمة الدول</h1>
        <a href="{{ route('admin.countries.create') }}" class="bg-pink-600 hover:bg-pink-700 text-white font-bold px-6 py-2 rounded-lg transition-colors">
            إضافة دولة جديدة
        </a>
    </div>

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($countries as $country)
        <div class="border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex justify-between items-start mb-3">
                <h3 class="text-lg font-bold text-gray-800">{{ $country->name }}</h3>
            </div>

            <p class="text-gray-600 mb-3 text-sm">{{ Str::limit($country->description, 100) }}</p>

            <div class="text-sm text-gray-500 space-y-1 mb-4">
                <p>العملة: {{ $country->currency }}</p>
                <p>الميزانية اليومية: {{ $country->daily_budget }}</p>
                @if($country->capital)
                    <p>العاصمة: {{ $country->capital }}</p>
                @endif
                @if($country->weather_info && isset($country->weather_info->temp))
                    <p>درجة الحرارة: {{ $country->weather_info->temp }}</p>
                @endif
                @if($country->weather_info && isset($country->weather_info->condition))
                    <p>حالة الطقس: {{ $country->weather_info->condition }}</p>
                @endif
                @if($country->best_month_to_travel)
                    <p>أفضل شهر للسفر: {{ $country->best_month_to_travel }}</p>
                @endif
            </div>

            @if($country->events->count() > 0)
            <div class="mb-4">
                <h4 class="text-sm font-semibold text-gray-700 mb-2">الفعاليات المرتبطة ({{ $country->events->count() }})</h4>
                <div class="space-y-1">
                    @foreach($country->events->take(3) as $event)
                    <div class="text-xs text-blue-600 bg-blue-50 px-2 py-1 rounded">
                        {{ $event->name }} - {{ $event->city }}
                    </div>
                    @endforeach
                    @if($country->events->count() > 3)
                    <div class="text-xs text-gray-500">
                        و {{ $country->events->count() - 3 }} فعاليات أخرى...
                    </div>
                    @endif
                </div>
            </div>
            @else
            <div class="mb-4">
                <p class="text-xs text-gray-400 italic">لا توجد فعاليات مرتبطة بهذه الدولة</p>
            </div>
            @endif            <div class="flex gap-2">
                <a href="{{ route('admin.countries.edit', $country->slug) }}" class="bg-blue-500 hover:bg-blue-600 text-white text-xs font-medium px-3 py-1 rounded transition-colors">
                    تعديل
                </a>
                <form method="POST" action="{{ route('admin.countries.destroy', $country->slug) }}" class="inline" onsubmit="return confirm('هل أنت متأكد من حذف هذه الدولة؟')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-xs font-medium px-3 py-1 rounded transition-colors">
                        حذف
                    </button>
                </form>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-8">
            <p class="text-gray-500 text-lg">لا توجد دول مضافة حالياً</p>
            <a href="{{ route('admin.countries.create') }}" class="inline-block mt-4 bg-pink-600 hover:bg-pink-700 text-white font-bold px-6 py-2 rounded-lg transition-colors">
                إضافة أول دولة
            </a>
        </div>
        @endforelse
    </div>
</div>
@endsection
