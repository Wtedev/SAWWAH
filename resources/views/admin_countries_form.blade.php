@extends('layout.app')

@section('title', 'إضافة / تعديل دولة')

@section('content')
    <div class="p-6 md:p-10 lg:p-16 bg-gray-100 min-h-screen">
        <!-- قسم رأس الصفحة -->
        <div class="mb-8 text-center md:text-right">
            <h1 class="text-4xl font-extrabold text-gray-900">إضافة / تعديل دولة</h1>
        </div>

        <!-- بطاقة النموذج -->
        <div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200 p-8">
            <form action="#" method="POST">
                @csrf
                <!-- حقل اسم الدولة -->
                <div class="mb-6">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">اسم الدولة</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $country->name ?? '') }}"
                           class="shadow appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all duration-200"
                           placeholder="أدخل اسم الدولة" required>
                </div>

                <!-- حقل رمز الدولة -->
                <div class="mb-6">
                    <label for="code" class="block text-gray-700 text-sm font-bold mb-2">رمز الدولة</label>
                    <input type="text" id="code" name="code" value="{{ old('code', $country->code ?? '') }}"
                           class="shadow appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all duration-200"
                           placeholder="أدخل رمز الدولة (مثال: KSA)" required>
                </div>

                <!-- زر الإرسال -->
                <div class="flex justify-end">
                    <button type="submit"
                            class="bg-pink-500 hover:bg-pink-600 text-white font-bold py-3 px-8 rounded-full shadow-lg transition-colors duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2">
                        حفظ
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection