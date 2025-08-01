@extends('layout.app')

@section('title', 'خطأ 404')

@section('content')

    <div class="text-center mt-24">
        <h1 class="text-6xl font-extrabold text-pink-500 mb-4">404</h1>
        <h2 class="text-2xl font-bold text-gray-800 mb-2">عذرًا، لم يتم العثور على الصفحة</h2>
        <p class="text-gray-500 mb-6">يبدو أنك حاولت الوصول إلى رابط غير موجود أو تم حذفه.</p>
        <a href="{{ url('/') }}" class="bg-pink-500 hover:bg-pink-600 text-white px-6 py-3 rounded-full text-lg font-bold">
            العودة للصفحة الرئيسية
        </a>
    </div>

@endsection
