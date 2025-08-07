<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اختبار API الطقس</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold text-center mb-8 text-gray-800">اختبار API الطقس</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($results as $city => $data)
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold mb-4 text-center text-gray-800">{{ $city }}</h3>

                @if($data['success'])
                <div class="text-center">
                    <div class="text-3xl font-bold text-blue-600 mb-2">
                        {{ $data['temp'] }}
                    </div>
                    <div class="text-gray-600 mb-4">
                        {{ $data['condition'] }}
                    </div>

                    @if(isset($data['humidity']))
                    <div class="text-sm text-gray-500">
                        الرطوبة: {{ $data['humidity'] }}%
                    </div>
                    @endif

                    @if(isset($data['city_found']))
                    <div class="text-xs text-green-600 mt-2">
                        المدينة الموجودة: {{ $data['city_found'] }}
                    </div>
                    @endif

                    @if(isset($data['message']))
                    <div class="text-xs text-orange-600 mt-2">
                        {{ $data['message'] }}
                    </div>
                    @endif
                </div>
                @else
                <div class="text-center text-red-600">
                    <div class="text-lg mb-2">خطأ</div>
                    <div class="text-sm">
                        {{ $data['error'] ?? 'حدث خطأ غير معروف' }}
                    </div>
                </div>
                @endif
            </div>
            @endforeach
        </div>

        <div class="mt-8 text-center">
            <a href="/admin" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                العودة للوحة التحكم
            </a>
        </div>
    </div>
</body>
</html>
