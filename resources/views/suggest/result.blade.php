@extends('layout.app')

@section('title', 'نتيجة الاقتراح')

@section('content')

<div class="text-center mb-10">
    <h1 class="text-3xl font-bold text-gray-800">وجهتك هي:</h1>
    <p class="text-gray-500 mt-2">تم تحليل اقتراحك بناءً على شهر السفر.</p>
</div>

@if($suggestedCountries && count($suggestedCountries) > 0)
<div class="max-w-6xl mx-auto bg-white rounded-lg shadow p-6 mb-8">
    <h2 class="text-lg font-bold text-gray-700 mb-4">أفضل الوجهات المقترحة لرحلتك</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($suggestedCountries as $country)
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            @if($country->image_url)
            <img src="{{ asset($country->image_url) }}" alt="{{ $country->name }}" class="w-full h-48 object-cover">
            @endif

            <div class="p-6">
                <h3 class="text-xl font-bold mb-2">{{ $country->name }}</h3>
                <p class="text-gray-600 mb-4">{{ $country->description }}</p>

                <div class="space-y-2 text-sm">
                    <p><span class="font-bold">أفضل وقت للزيارة:</span> {{ $country->best_month_to_travel }}</p>
                    <p><span class="font-bold">الميزانية المقترحة:</span> {{ $country->preferred_budget }}</p>
                    <p><span class="font-bold">أبرز المميزات:</span> {{ $country->attraction }}</p>
                    <p><span class="font-bold">مناسبة للسفر:</span> {{ $country->travel_with }}</p>
                    <p><span class="font-bold">اللغة السائدة:</span> {{ $country->language_preference }}</p>
                </div>

                <div class="mt-4">
                    <a href="{{ route('countries.show', $country->slug) }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition-colors">
                        عرض التفاصيل
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@else
<p class="text-center text-gray-600">لا توجد وجهات تطابق شهر السفر الذي اخترته.</p>
@endif

<div class="text-center mt-8">
    <a href="{{ route('suggest.form') }}" class="inline-block bg-gray-600 text-white px-6 py-2 rounded hover:bg-gray-700 transition-colors">
        تعديل التفضيلات
    </a>
</div>

@endsection
