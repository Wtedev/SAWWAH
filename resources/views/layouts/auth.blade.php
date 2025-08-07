<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - سواح</title>
    
    <!-- Fonts and Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f9f9fb] font-[Tajawal]">
    <!-- زر العودة للصفحة الرئيسية -->
    <div class="fixed top-6 right-6">
        <a href="{{ route('home') }}" class="flex items-center text-gray-600 hover:text-pink-500 transition-colors">
            <i class="fas fa-arrow-right ml-2"></i>
            العودة للصفحة الرئيسية
        </a>
    </div>

    <div class="min-h-screen flex flex-col items-center justify-center">
        <!-- Logo Area -->
        <div class="text-center mb-8">
            <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-pink-50 flex items-center justify-center">
                <i class="fas fa-plane text-pink-500 text-3xl"></i>
            </div>
            <h1 class="text-2xl font-bold text-gray-800">سَوّاح</h1>
            <p class="text-sm text-gray-500">رفيقك الذي يُخطط رحلاتك</p>
        </div>

        <!-- Content Area -->
        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">
            @yield('content')
        </div>

        <!-- Footer -->
        <div class="mt-8 text-center text-gray-500 text-sm">
            جميع الحقوق محفوظة © {{ date('Y') }}
        </div>
    </div>
</body>
</html>