@extends('layouts.app')

@section('title', 'تواصل معنا - سواح')

@section('content')
    <div class="flex flex-col min-h-screen bg-gray-100">
        <!-- النص العلوي في الشاشات الكبيرة -->
        <div class="w-full bg-white p-8 shadow-lg">
            <div class="mb-8 text-center">
                <h1 class="text-4xl font-extrabold text-gray-900">تواصل معنا</h1>
            </div>
            <div class="space-y-4 text-center">
                <p class="text-xl text-gray-700">نحن مستعدون لمساعدتك في أي وقت</p>
                <p class="text-lg text-gray-600">إذا كان لديك أي استفسار، لا تتردد في التواصل معنا</p>
            </div>
        </div>

        <!-- محتوى الصفحة -->
        <div class="w-full p-8 flex flex-col justify-center items-center lg:items-center flex-grow">
            <form action="#" method="POST" class="bg-white shadow-lg rounded-lg p-8 w-full max-w-4xl lg:max-w-3xl">
                @csrf
                <div class="mb-6">
                    <label for="inquiry" class="block text-gray-700 font-bold mb-2">استفسارك بخصوص</label>
                    <div class="relative w-full">
                        <select id="inquiry" name="inquiry" class="block w-full py-3 px-4 text-gray-700 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-pink-500">
                            <option value="complaints">الاستفسار عن الوجهات السياحية</option>
                            <option value="suggestions">الاستفسار عن العروض والخصومات</option>
                            <option value="suggestions">الاستفسار عن الوثائق والتأشيرات</option>
                            <option value="feedback">الاستفسار عن تجارب العملاء الآخرين</option>
                            <option value="feedback">اخرى</option>
                        </select>
                    </div>
                </div>

                <div class="mb-8">
                    <label for="message" class="block text-gray-700 font-bold mb-2"</label>
                    <!-- زيادة حجم مربع النص هنا -->
                    <textarea id="message" name="message" rows="8" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-pink-500" placeholder="اكتب استفسارك هنا"></textarea>
                </div>

                <!-- زر إرسال الاستفسار -->
                <div class="flex justify-center mb-6">
                    <button type="submit" class="bg-pink-600 hover:bg-pink-700 text-white font-bold py-3 px-6 rounded-lg focus:outline-none focus:shadow-outline transition duration-200 w-full">
                        إرسال الاستفسار
                    </button>
                </div>
            </form>

            <!-- زر تسجيل الخروج -->
            <div class="flex justify-center mb-8 mt-8">
                <a href="{{ route('logout') }}" class="bg-pink-600 hover:bg-pink-700 text-white font-bold py-3 px-6 rounded-lg focus:outline-none focus:shadow-outline transition duration-200 w-full text-center">
                    تسجيل الخروج
                </a>
            </div>
        </div>

        <!-- الحقوق محفوظة -->
        <div class="text-center text-gray-500 text-sm mt-6">
            <p>جميع الحقوق محفوظة &copy; 2025</p>
            <img src="path/to/airplane-icon.png" alt="SAWWAH" class="mx-auto mt-2">
        </div>
    </div>
@endsection























