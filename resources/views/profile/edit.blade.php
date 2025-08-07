@extends('layout.app')

@section('title', 'ملفي الشخصي - سواح')

@section('content')
<div class="flex-1 p-6 md:p-10 lg:p-16">
    <div class="bg-white shadow-xl rounded-2xl p-6 md:p-10 w-full max-w-4xl mx-auto">
        <!-- صورة المستخدم والمعلومات الأساسية -->
        <div class="flex flex-col items-center mb-8 text-center">
            <div class="w-32 h-32 mb-4">
                <img class="w-full h-full rounded-full object-cover border-4 border-pink-500 shadow-md" src="{{ Auth::user()->profile_photo_url ?? asset('images/default-user.svg') }}" alt="{{ Auth::user()->name }}">
            </div>
            <h2 class="text-3xl font-bold text-gray-900 mb-1">{{ Auth::user()->name }}</h2>
            <p class="text-gray-600 text-lg">
                <span class="inline-flex items-center bg-pink-100 text-pink-800 px-3 py-1 rounded-full text-sm font-medium">
                    <i class="fas fa-user-circle mr-1"></i> ملفي الشخصي
                </span>
            </p>
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
            <div class="flex flex-col md:flex-row items-start bg-gray-50 p-4 rounded-xl shadow-sm hover:bg-gray-100 transition">
                <label class="w-full md:w-1/4 text-gray-700 font-semibold mb-2 md:mb-0">حالة الطقس</label>
                <div class="flex-1 w-full md:w-3/4 weather-container">
                    @if($weatherData = Auth::user()->weather_data)
                    <div class="flex flex-col md:flex-row items-center gap-4">
                        <div class="flex items-center space-x-2 rtl:space-x-reverse">
                            <img src="https://openweathermap.org/img/wn/{{ $weatherData['icon'] }}@2x.png" alt="Weather Icon" class="w-12 h-12">
                            <div>
                                <div class="text-2xl font-bold">{{ $weatherData['temp'] }}°C</div>
                                <div class="text-gray-600">{{ $weatherData['description'] }}</div>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-2 w-full">
                            <div class="bg-white p-2 rounded-lg shadow-sm text-center">
                                <div class="text-gray-600 text-sm">الإحساس</div>
                                <div class="font-semibold">{{ $weatherData['feels_like'] }}°C</div>
                            </div>
                            <div class="bg-white p-2 rounded-lg shadow-sm text-center">
                                <div class="text-gray-600 text-sm">الرطوبة</div>
                                <div class="font-semibold">{{ $weatherData['humidity'] }}%</div>
                            </div>
                            <div class="bg-white p-2 rounded-lg shadow-sm text-center">
                                <div class="text-gray-600 text-sm">سرعة الرياح</div>
                                <div class="font-semibold">{{ $weatherData['wind_speed'] }} كم/س</div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="text-gray-500 p-3 bg-white rounded-lg">
                        <div class="flex items-center justify-center">
                            <i class="fas fa-cloud text-gray-300 text-3xl ml-2"></i>
                            سيتم تحديث معلومات الطقس عند اختيار الدولة
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-pink-500 to-pink-600 text-white font-bold py-3 rounded-xl shadow-lg hover:from-pink-600 hover:to-pink-700 transition duration-300 transform hover:scale-[1.01] flex items-center justify-center">
                <i class="fas fa-save ml-2"></i>
                حفظ التغييرات
            </button>
        </form>

        <!-- إدارة الحساب -->
        <div class="bg-gray-50 p-6 rounded-xl shadow-sm mt-8">
            <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-cog ml-2 text-gray-600"></i>
                إدارة الحساب
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- تسجيل الخروج -->
                <div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full bg-gray-200 text-gray-800 font-bold py-3 px-6 rounded-xl shadow hover:bg-gray-300 transition duration-300 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 001 1h12a1 1 0 001-1V3a1 1 0 00-1-1H3zm7 4.414L11.414 9H5a1 1 0 100 2h6.414l-1.414 1.586a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414z" clip-rule="evenodd" />
                            </svg>
                            تسجيل الخروج
                        </button>
                    </form>
                </div>
                
                <!-- حذف الحساب -->
                <div>
                    <form method="POST" action="{{ route('profile.destroy') }}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="w-full bg-red-100 text-red-600 font-bold py-3 px-6 rounded-xl shadow hover:bg-red-200 transition duration-300 flex items-center justify-center" onclick="return confirm('هل أنت متأكد من حذف حسابك؟ هذا الإجراء لا يمكن التراجع عنه.')">
                            <i class="fas fa-user-slash ml-2"></i>
                            حذف الحساب
                        </button>
                    </form>
                </div>
            </div>
            <p class="text-gray-500 text-sm mt-4 text-center">
                <i class="fas fa-exclamation-triangle ml-1"></i>
                سيتم حذف حسابك وجميع بياناتك بشكل نهائي عند تأكيد حذف الحساب
            </p>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('js/weather-update.js') }}"></script>
@endpush
@endsection
