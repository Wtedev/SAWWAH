@extends('layout.app')

@section('title', 'قائمة الوجهات السياحية')

@section('content')

    {{-- العنوان والوصف --}}
    <div class="mb-10 text-center">
        <h1 class="text-3xl font-bold text-gray-800">قائمة الوجهات السياحية</h1>
        <p class="text-gray-500 mt-2">عبارة تسويقية من سطر عبارة تسويقية من سطر عبارة تسويقية من سطر</p>
    </div>

    {{-- الشبكة --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @for ($i = 0; $i < 6; $i++)
            <div class="bg-white rounded-xl p-6 shadow flex justify-between items-start gap-4">
                <div class="flex-1">
                    <h3 class="text-lg font-bold text-gray-800 mb-2">اسم الوجهة</h3>
                    <p class="text-sm text-gray-500 mb-4">
                        ضع هنا نص يعرض الوجهة السياحية بشكل مبسط وجاذب مثل: باريس هي عاصمة فرنسا...
                    </p>
                    <div class="flex flex-col text-sm text-gray-400 space-y-1">
                        <span><i class="fas fa-map-marker-alt ml-1 text-pink-400"></i> معلومات</span>
                        <span><i class="fas fa-sun ml-1 text-pink-400"></i> معلومات</span>
                        <span><i class="fas fa-wallet ml-1 text-pink-400"></i> معلومات</span>
                    </div>
                </div>
                <div>
                    <button class="w-10 h-10 bg-pink-500 rounded-full flex items-center justify-center text-white shadow hover:bg-pink-600">
                        <i class="fas fa-chevron-left text-sm"></i>
                    </button>
                </div>
            </div>
        @endfor
    </div>

@endsection
