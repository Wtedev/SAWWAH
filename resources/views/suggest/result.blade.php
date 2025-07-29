@extends('layout')

@section('title', 'تم الإرسال')

@section('content')
<div class="max-w-xl mx-auto py-20 px-6 text-center">
    <h1 class="text-4xl font-bold text-green-700 mb-6">🎉 شكرًا لاقتراحك!</h1>
    <p class="text-gray-700 text-lg">
        تم استلام اقتراحك بنجاح وسنأخذه بعين الاعتبار في تطوير منصة سواح.
    </p>

    <a href="{{ route('home') }}"
       class="mt-8 inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
        🔙 الرجوع إلى الصفحة الرئيسية
    </a>
</div>
@endsection
