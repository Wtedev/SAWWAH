@extends('layout.app')

@section('title', 'ملفي الشخصي - سواح')

@section('content')
<div class="flex-1 p-6 md:p-10 lg:p-16">
    <div class="bg-white shadow-xl rounded-2xl p-6 md:p-10 w-full max-w-4xl mx-auto">
        <!-- صورة المستخدم والمعلومات الأساسية -->
        <div class="flex flex-col items-center mb-8 text-center">
            <div class="relative w-32 h-32 mb-4">
                <img class="w-full h-full rounded-full object-cover border-4 border-pink-500 shadow-md" src="{{ Auth::user()->profile_photo_url ?? 'https://placehold.co/128x128/fecdd3/e5e7eb?text=صورة+المستخدم' }}" alt="{{ Auth::user()->name }}">
                <button class="absolute bottom-0 right-0 bg-pink-500 text-white p-2 rounded-full shadow-lg hover:bg-pink-600 transition">
                    <i class="fas fa-camera"></i>
                </button>
            </div>
            <h2 class="text-3xl font-bold text-gray-900 mb-1">{{ Auth::user()->name }}</h2>
            <p class="text-gray-600 text-lg">ملفي الشخصي</p>
        </div>

        <hr class="border-gray-200 mb-8">

        <!-- معلومات الملف الشخصي -->
        <form method="POST" action="{{ route('profile.update') }}" class="space-y-6">
            @csrf
            @method('patch')

            <!-- الاسم -->
            <div class="flex flex-col md:flex-row items-center bg-gray-50 p-4 rounded-xl shadow-sm hover:bg-gray-100 transition">
                <label class="w-full md:w-1/4 text-gray-700 font-semibold mb-2 md:mb-0">الاسم</label>
                <div class="flex-1 w-full md:w-3/4">
                    <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500" required>
                    @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- البريد الإلكتروني -->
            <div class="flex flex-col md:flex-row items-center bg-gray-50 p-4 rounded-xl shadow-sm hover:bg-gray-100 transition">
                <label class="w-full md:w-1/4 text-gray-700 font-semibold mb-2 md:mb-0">البريد الإلكتروني</label>
                <div class="flex-1 w-full md:w-3/4">
                    <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500" required>
                    @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- الدولة -->
            <div class="flex flex-col md:flex-row items-center bg-gray-50 p-4 rounded-xl shadow-sm hover:bg-gray-100 transition">
                <label class="w-full md:w-1/4 text-gray-700 font-semibold mb-2 md:mb-0">الدولة</label>
                <div class="flex-1 w-full md:w-3/4">
                    <select name="country" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500">
                        <option value="">اختر الدولة</option>
                        <option value="SA" {{ Auth::user()->country == 'SA' ? 'selected' : '' }}>المملكة العربية السعودية</option>
                        <option value="AE" {{ Auth::user()->country == 'AE' ? 'selected' : '' }}>الإمارات العربية المتحدة</option>
                        <option value="BH" {{ Auth::user()->country == 'BH' ? 'selected' : '' }}>البحرين</option>
                        <option value="KW" {{ Auth::user()->country == 'KW' ? 'selected' : '' }}>الكويت</option>
                        <option value="OM" {{ Auth::user()->country == 'OM' ? 'selected' : '' }}>عمان</option>
                        <option value="QA" {{ Auth::user()->country == 'QA' ? 'selected' : '' }}>قطر</option>
                    </select>
                </div>
            </div>

            <!-- العملة -->
            <div class="flex flex-col md:flex-row items-center bg-gray-50 p-4 rounded-xl shadow-sm hover:bg-gray-100 transition">
                <label class="w-full md:w-1/4 text-gray-700 font-semibold mb-2 md:mb-0">العملة</label>
                <div class="flex-1 w-full md:w-3/4">
                    <select name="currency" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500">
                        <option value="">اختر العملة</option>
                        <option value="SAR" {{ Auth::user()->currency == 'SAR' ? 'selected' : '' }}>ريال سعودي</option>
                        <option value="AED" {{ Auth::user()->currency == 'AED' ? 'selected' : '' }}>درهم إماراتي</option>
                        <option value="BHD" {{ Auth::user()->currency == 'BHD' ? 'selected' : '' }}>دينار بحريني</option>
                        <option value="KWD" {{ Auth::user()->currency == 'KWD' ? 'selected' : '' }}>دينار كويتي</option>
                        <option value="OMR" {{ Auth::user()->currency == 'OMR' ? 'selected' : '' }}>ريال عماني</option>
                        <option value="QAR" {{ Auth::user()->currency == 'QAR' ? 'selected' : '' }}>ريال قطري</option>
                    </select>
                </div>
            </div>

            <!-- معلومات الطقس الحالية -->
            <div class="flex flex-col bg-gray-50 p-4 rounded-xl shadow-sm">
                <label class="text-gray-700 font-semibold mb-4">حالة الطقس</label>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @if($weatherData = Auth::user()->weather_data)
                    <div class="flex items-center space-x-2 rtl:space-x-reverse">
                        <img src="https://openweathermap.org/img/wn/{{ $weatherData['icon'] }}@2x.png" alt="Weather Icon" class="w-12 h-12">
                        <div>
                            <div class="text-2xl font-bold">{{ $weatherData['temp'] }}°C</div>
                            <div class="text-gray-600">{{ $weatherData['description'] }}</div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        <div class="bg-white p-2 rounded-lg">
                            <div class="text-gray-600 text-sm">الإحساس</div>
                            <div class="font-semibold">{{ $weatherData['feels_like'] }}°C</div>
                        </div>
                        <div class="bg-white p-2 rounded-lg">
                            <div class="text-gray-600 text-sm">الرطوبة</div>
                            <div class="font-semibold">{{ $weatherData['humidity'] }}%</div>
                        </div>
                        <div class="bg-white p-2 rounded-lg">
                            <div class="text-gray-600 text-sm">سرعة الرياح</div>
                            <div class="font-semibold">{{ $weatherData['wind_speed'] }} كم/س</div>
                        </div>
                    </div>
                    @else
                    <div class="text-gray-500">
                        سيتم تحديث معلومات الطقس عند اختيار الدولة
                    </div>
                    @endif
                </div>
            </div>

            <button type="submit" class="w-full bg-pink-500 text-white font-bold py-3 rounded-xl shadow-lg hover:bg-pink-600 transition duration-300">
                حفظ التغييرات
            </button>
        </form>

        <hr class="border-gray-200 my-8">

        <!-- حذف الحساب -->
        <div class="text-center">
            <h3 class="text-xl font-bold text-red-600 mb-4">حذف الحساب</h3>
            <p class="text-gray-600 mb-4">سيتم حذف حسابك وجميع بياناتك بشكل نهائي</p>
            <form method="POST" action="{{ route('profile.destroy') }}" class="inline-block">
                @csrf
                @method('delete')
                <button type="submit" class="bg-red-500 text-white font-bold py-3 px-8 rounded-xl shadow-lg hover:bg-red-600 transition duration-300" onclick="return confirm('هل أنت متأكد من حذف حسابك؟ هذا الإجراء لا يمكن التراجع عنه.')">
                    حذف الحساب
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
>>>>>>> e80a85e91ffad3608c15fdcb1ee44c0e4ce02437
