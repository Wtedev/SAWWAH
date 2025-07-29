@extends('layout')

@section('title', 'الصفحة غير موجودة')

@section('content')
<div class="text-center py-24 px-6">
    <h1 class="text-6xl text-red-600 font-bold mb-4">404</h1>
    <p class="text-xl text-gray-700 mb-6">الصفحة التي تبحث عنها غير موجودة</p>
    <a href="{{ route('home') }}"
       class="bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700">
        العودة للرئيسية 🏠
    </a>
</div>
@endsection
