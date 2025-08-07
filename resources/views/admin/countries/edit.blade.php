@extends('admin.layout')

@section('title','تعديل دولة')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">
        تعديل دولة: {{ $country->name }}
    </h1>

    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{route('admin.countries.update',$country->slug)}}" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block mb-2 font-semibold text-gray-700">اسم الدولة *</label>
                <input type="text" name="name" value="{{old('name', $country->name)}}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500 focus:border-transparent" required>
            </div>

            <div>
                <label class="block mb-2 font-semibold text-gray-700">رمز الدولة</label>
                <input type="text" name="code" value="{{old('code', $country->code)}}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500 focus:border-transparent" placeholder="مثال: SA">
                <p class="text-sm text-blue-600 mt-1">💡 سيتم تحديث بيانات الطقس والعاصمة عند تغيير رمز الدولة</p>
            </div>

            <div>
                <label class="block mb-2 font-semibold text-gray-700">الرمز البريدي</label>
                <input type="text" name="postal_code" value="{{old('postal_code', $country->postal_code)}}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500 focus:border-transparent" placeholder="مثال: 11564">
                <p class="text-sm text-green-600 mt-1">🎯 يمكن استخدامه لجلب طقس أكثر دقة</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block mb-2 font-semibold text-gray-700">العاصمة</label>
                <input type="text" name="capital" value="{{old('capital', $country->capital)}}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500 focus:border-transparent" placeholder="مثال: الرياض">
            </div>

            <div>
                <label class="block mb-2 font-semibold text-gray-700">العملة *</label>
                <input type="text" name="currency" value="{{old('currency', $country->currency)}}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500 focus:border-transparent" required>
            </div>
        </div>

        <div>
            <label class="block mb-2 font-semibold text-gray-700">الوصف *</label>
            <textarea name="description" rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500 focus:border-transparent" required>{{old('description', $country->description)}}</textarea>
        </div>

        <div>
            <label class="block mb-2 font-semibold text-gray-700">الميزانية اليومية *</label>
            <input type="text" name="daily_budget" value="{{old('daily_budget', $country->daily_budget)}}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500 focus:border-transparent" required>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block mb-2 font-semibold text-gray-700">أفضل شهر للسفر</label>
                <select name="best_month_to_travel" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                    <option value="">اختر الشهر</option>
                    @php $months = ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو', 'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر'] @endphp
                    @foreach($months as $month)
                    <option value="{{ $month }}" {{ old('best_month_to_travel', $country->best_month_to_travel) == $month ? 'selected' : '' }}>{{ $month }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-2 font-semibold text-gray-700">الميزانية المفضلة</label>
                <select name="preferred_budget" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                    <option value="">اختر الميزانية</option>
                    @php $budgets = ['أقل من 1000 دولار', '1000-5000 دولار', 'أكثر من 5000 دولار'] @endphp
                    @foreach($budgets as $budget)
                    <option value="{{ $budget }}" {{ old('preferred_budget', $country->preferred_budget) == $budget ? 'selected' : '' }}>{{ $budget }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block mb-2 font-semibold text-gray-700">أكثر ما يجذب في الوجهة</label>
                <select name="attraction" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                    <option value="">اختر نوع الجذب</option>
                    @php $attractions = ['أسعار منخفضة', 'أجواء ماطرة', 'مناطق سياحية مشهورة', 'فعاليات ثقافية أو رياضية'] @endphp
                    @foreach($attractions as $attraction)
                    <option value="{{ $attraction }}" {{ old('attraction', $country->attraction) == $attraction ? 'selected' : '' }}>{{ $attraction }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-2 font-semibold text-gray-700">نوع السفر</label>
                <select name="travel_with" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                    <option value="">اختر نوع السفر</option>
                    @php $travels = ['بمفردي', 'مع العائلة', 'مع الأصدقاء'] @endphp
                    @foreach($travels as $travel)
                    <option value="{{ $travel }}" {{ old('travel_with', $country->travel_with) == $travel ? 'selected' : '' }}>{{ $travel }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div>
            <label class="block mb-2 font-semibold text-gray-700">اللغة المفضلة</label>
            <select name="language_preference" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                <option value="">اختر اللغة</option>
                @php $languages = ['الإنجليزية', 'العربية', 'لا توجد لغة معينة'] @endphp
                @foreach($languages as $language)
                <option value="{{ $language }}" {{ old('language_preference', $country->language_preference) == $language ? 'selected' : '' }}>{{ $language }}</option>
                @endforeach
            </select>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block mb-2 font-semibold text-gray-700">درجة الحرارة *</label>
                <input type="text" name="temp" value="{{old('temp', $country->weather_info['temp'] ?? '')}}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500 focus:border-transparent" required>
            </div>

            <div>
                <label class="block mb-2 font-semibold text-gray-700">حالة الطقس *</label>
                <input type="text" name="condition" value="{{old('condition', $country->weather_info['condition'] ?? '')}}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500 focus:border-transparent" required>
            </div>
        </div>

        <div>
            <label class="block mb-2 font-semibold text-gray-700">صورة الدولة</label>
            @if($country->image)
            <div class="mb-3">
                <img src="{{ asset('storage/' . $country->image) }}" alt="{{ $country->name }}" class="w-32 h-32 object-cover rounded-lg border">
                <p class="text-sm text-gray-600 mt-1">الصورة الحالية</p>
            </div>
            @endif
            <input type="file" name="image" accept="image/*" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-pink-500 focus:border-transparent">
            <p class="text-sm text-gray-600 mt-1">اترك الحقل فارغاً للاحتفاظ بالصورة الحالية</p>
        </div>

        <div class="flex gap-4 pt-4">
            <button type="submit" class="bg-pink-600 hover:bg-pink-700 text-white font-bold px-6 py-2 rounded-lg transition-colors">
                حفظ التعديلات
            </button>
            <a href="{{ route('admin.countries.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold px-6 py-2 rounded-lg transition-colors">
                رجوع
            </a>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const codeInput = document.querySelector('input[name="code"]');
    const postalCodeInput = document.querySelector('input[name="postal_code"]');
    const tempInput = document.querySelector('input[name="temp"]');
    const conditionInput = document.querySelector('input[name="condition"]');
    const capitalInput = document.querySelector('input[name="capital"]');
    
    if (codeInput) {
        codeInput.addEventListener('blur', function() {
            const countryCode = this.value.trim().toUpperCase();
            if (countryCode && countryCode.length === 2) {
                if (confirm('هل تريد تحديث بيانات الطقس تلقائياً؟')) {
                    fetchWeatherData(countryCode);
                }
            }
        });
    }

    // أيضاً عند تغيير الرمز البريدي إذا كان رمز الدولة موجود
    if (postalCodeInput) {
        postalCodeInput.addEventListener('blur', function() {
            const countryCode = codeInput.value.trim().toUpperCase();
            const postalCode = this.value.trim();
            if (countryCode && countryCode.length === 2 && postalCode) {
                if (confirm('هل تريد تحديث بيانات الطقس باستخدام الرمز البريدي؟')) {
                    fetchWeatherData(countryCode, postalCode);
                }
            }
        });
    }
    
    function fetchWeatherData(countryCode, postalCode = null) {
        // حفظ القيم الأصلية
        const originalTemp = tempInput.value;
        const originalCondition = conditionInput.value;
        
        // عرض مؤشر التحميل
        tempInput.value = 'جاري التحميل...';
        conditionInput.value = 'جاري التحميل...';
        tempInput.disabled = true;
        conditionInput.disabled = true;
        
        const requestData = {
            country_code: countryCode
        };
        
        if (postalCode) {
            requestData.postal_code = postalCode;
        }
        
        // إرسال طلب للخادم
        fetch('/api/weather/country', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify(requestData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // ملء الحقول بالبيانات المستلمة
                tempInput.value = `${data.data.temperature}°C`;
                conditionInput.value = data.data.condition;
                
                // ملء حقل العاصمة إذا كان فارغاً
                if (capitalInput && !capitalInput.value) {
                    capitalInput.value = data.data.capital;
                }
                
                // عرض رسالة نجاح مع نوع الموقع المستخدم
                const locationInfo = data.data.location_used ? ` (${data.data.location_used})` : '';
                showNotification(`تم تحديث بيانات الطقس بنجاح!${locationInfo}`, 'success');
            } else {
                throw new Error(data.error || 'فشل في جلب البيانات');
            }
        })
        .catch(error => {
            console.error('خطأ في جلب بيانات الطقس:', error);
            
            // إرجاع القيم الأصلية في حالة الخطأ
            tempInput.value = originalTemp;
            conditionInput.value = originalCondition;
            
            // عرض رسالة خطأ
            showNotification('لم يتم العثور على بيانات الطقس لهذه الدولة. تم الاحتفاظ بالبيانات الحالية.', 'error');
        })
        .finally(() => {
            // إعادة تفعيل الحقول
            tempInput.disabled = false;
            conditionInput.disabled = false;
        });
    }
    
    function showNotification(message, type) {
        // إنشاء عنصر التنبيه
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 p-4 rounded-lg shadow-lg z-50 ${
            type === 'success' ? 'bg-green-100 border border-green-400 text-green-700' : 
            'bg-red-100 border border-red-400 text-red-700'
        }`;
        notification.textContent = message;
        
        // إضافة التنبيه للصفحة
        document.body.appendChild(notification);
        
        // إزالة التنبيه بعد 5 ثوان
        setTimeout(() => {
            if (notification.parentNode) {
                notification.parentNode.removeChild(notification);
            }
        }, 5000);
    }
});
</script>
@endsection
