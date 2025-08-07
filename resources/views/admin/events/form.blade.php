@extends('admin.layout')

@section('title', isset($event) ? 'تعديل فعالية' : 'إضافة فعالية')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">
        {{ isset($event) ? 'تعديل الفعالية: ' . ($event->name ?? '') : 'إضافة فعالية جديدة' }}
    </h1>

    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ isset($event) ? route('admin.events.update', $event->id) : route('admin.events.store') }}" class="space-y-4">
        @csrf
        @if(isset($event))
        @method('PUT')
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block mb-2 font-semibold text-gray-700">عنوان الفعالية *</label>
                <input type="text" name="name" value="{{ old('name', $event->name ?? '') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500 focus:border-transparent" placeholder="مثال: معرض الرياض للكتاب" required>
            </div>

            <div>
                <label class="block mb-2 font-semibold text-gray-700">المدينة *</label>
                <input type="text" name="city" value="{{ old('city', $event->city ?? '') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500 focus:border-transparent" placeholder="مثال: الرياض" required>
            </div>
        </div>

        <div>
            <label class="block mb-2 font-semibold text-gray-700">وصف الفعالية *</label>
            <textarea name="description" rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500 focus:border-transparent" placeholder="وصف مفصل عن الفعالية وأنشطتها..." required>{{ old('description', $event->description ?? '') }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block mb-2 font-semibold text-gray-700">تاريخ البداية *</label>
                <input type="date" name="start_date" value="{{ old('start_date', $event->start_date ?? '') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500 focus:border-transparent" required>
            </div>

            <div>
                <label class="block mb-2 font-semibold text-gray-700">تاريخ النهاية *</label>
                <input type="date" name="end_date" value="{{ old('end_date', $event->end_date ?? '') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500 focus:border-transparent" required>
            </div>
        </div>

        @if(isset($countries) && $countries->count() > 0)
        <div>
            <label class="block mb-2 font-semibold text-gray-700">الدولة *</label>
            <select name="country_id" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500 focus:border-transparent" required>
                <option value="">اختر الدولة</option>
                @foreach($countries as $country)
                <option value="{{ $country->id }}" {{ old('country_id', $event->country_id ?? '') == $country->id ? 'selected' : '' }}>
                    {{ $country->name }}
                </option>
                @endforeach
            </select>
        </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block mb-2 font-semibold text-gray-700">الموقع</label>
                <input type="text" name="location" value="{{ old('location', $event->location ?? '') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500 focus:border-transparent" placeholder="مثال: مركز الرياض الدولي للمؤتمرات">
            </div>

            <div>
                <label class="block mb-2 font-semibold text-gray-700">السعر</label>
                <input type="text" name="price" value="{{ old('price', $event->price ?? '') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500 focus:border-transparent" placeholder="مثال: مجاني أو 50 ريال">
            </div>
        </div>

        <div class="flex items-center">
            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $event->is_featured ?? false) ? 'checked' : '' }} class="w-4 h-4 text-pink-600 border-gray-300 rounded focus:ring-pink-500">
            <label class="mr-2 text-sm font-medium text-gray-700">
                فعالية مميزة (ستظهر في القائمة المميزة)
            </label>
        </div>

        <div class="flex gap-4 pt-4">
            <button type="submit" class="bg-pink-600 hover:bg-pink-700 text-white font-bold px-6 py-2 rounded-lg transition-colors">
                {{ isset($event) ? 'حفظ التعديلات' : 'إضافة الفعالية' }}
            </button>
            <a href="{{ route('admin.events.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold px-6 py-2 rounded-lg transition-colors">
                رجوع
            </a>
        </div>
    </form>
</div>
@endsection
