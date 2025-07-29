@extends('layout')

@section('title', 'الصفحة الرئيسية')

@section('content')
<div class="bg-gradient-to-r from-blue-50 via-white to-blue-50 py-20 px-6 text-center">
    <h1 class="text-4xl font-bold text-blue-900 mb-4">مرحبًا بك في سواح 🌍</h1>
    <p class="text-lg text-gray-700 mb-6">
        اكتشف أجمل الرحلات والوجهات السياحية داخل السعودية مع سواح. نسهل لك التخطيط، ونساعدك على الاستمتاع بتجربة لا تُنسى.
    </p>
<a href="{{ route('trips.index') }}"
   class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg text-lg hover:bg-blue-700 hover:scale-105 transition transform duration-200">
   استكشف الرحلات ✈️
</a>


</div>

<!-- أقسام إضافية للـ Home لاحقًا -->
<div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-8 px-8">
    <div class="bg-white shadow-md p-6 rounded-lg">
        <h2 class="text-xl font-semibold text-blue-800 mb-2">وجهات مميزة</h2>
        <p class="text-gray-600">نوفر لك مجموعة من الوجهات السياحية المختارة بعناية داخل المملكة.</p>
    </div>
    <div class="bg-white shadow-md p-6 rounded-lg">
        <h2 class="text-xl font-semibold text-blue-800 mb-2">تخطيط سهل</h2>
        <p class="text-gray-600">خطط رحلتك بكل سهولة ومرونة باستخدام أدواتنا المريحة.</p>
    </div>
    <div class="bg-white shadow-md p-6 rounded-lg">
        <h2 class="text-xl font-semibold text-blue-800 mb-2">دعم فوري</h2>
        <p class="text-gray-600">فريقنا جاهز لمساعدتك والإجابة عن استفساراتك في أي وقت.</p>
    </div>
</div>
@endsection
