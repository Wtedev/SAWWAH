// JavaScript لتحديث الطقس عند تغيير الدولة
document.addEventListener('DOMContentLoaded', function() {
    const countrySelect = document.querySelector('select[name="country"]');
    
    if (countrySelect) {
        countrySelect.addEventListener('change', function() {
            const countryCode = this.value;
            if (countryCode) {
                const formData = new FormData();
                formData.append('country', countryCode);
                formData.append('_token', document.querySelector('input[name="_token"]').value);
                
                // إظهار حالة التحميل
                const weatherContainer = document.querySelector('.weather-container');
                if (weatherContainer) {
                    weatherContainer.innerHTML = `
                        <div class="flex items-center justify-center p-4">
                            <svg class="animate-spin h-8 w-8 text-pink-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span class="mr-3 text-gray-700">جاري تحديث الطقس...</span>
                        </div>
                    `;
                }
                
                // إرسال طلب AJAX لتحديث الطقس
                fetch('/update-weather', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success && data.weatherData) {
                        // تحديث واجهة المستخدم بمعلومات الطقس الجديدة
                        updateWeatherUI(data.weatherData);
                    } else {
                        showWeatherError();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showWeatherError();
                });
            }
        });
    }
    
    function updateWeatherUI(weatherData) {
        const weatherContainer = document.querySelector('.weather-container');
        if (weatherContainer) {
            weatherContainer.innerHTML = `
                <div class="flex flex-col md:flex-row items-center gap-4">
                    <div class="flex items-center space-x-2 rtl:space-x-reverse">
                        <img src="https://openweathermap.org/img/wn/${weatherData.icon}@2x.png" alt="Weather Icon" class="w-12 h-12">
                        <div>
                            <div class="text-2xl font-bold">${weatherData.temp}°C</div>
                            <div class="text-gray-600">${weatherData.description}</div>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-2 w-full">
                        <div class="bg-white p-2 rounded-lg shadow-sm text-center">
                            <div class="text-gray-600 text-sm">الإحساس</div>
                            <div class="font-semibold">${weatherData.feels_like}°C</div>
                        </div>
                        <div class="bg-white p-2 rounded-lg shadow-sm text-center">
                            <div class="text-gray-600 text-sm">الرطوبة</div>
                            <div class="font-semibold">${weatherData.humidity}%</div>
                        </div>
                        <div class="bg-white p-2 rounded-lg shadow-sm text-center">
                            <div class="text-gray-600 text-sm">سرعة الرياح</div>
                            <div class="font-semibold">${weatherData.wind_speed} كم/س</div>
                        </div>
                    </div>
                </div>
            `;
        }
    }
    
    function showWeatherError() {
        const weatherContainer = document.querySelector('.weather-container');
        if (weatherContainer) {
            weatherContainer.innerHTML = `
                <div class="text-gray-500 p-3 bg-white rounded-lg">
                    <div class="flex items-center justify-center">
                        <i class="fas fa-exclamation-circle text-red-500 text-3xl ml-2"></i>
                        حدث خطأ في تحديث معلومات الطقس، يرجى المحاولة مرة أخرى
                    </div>
                </div>
            `;
        }
    }
});
