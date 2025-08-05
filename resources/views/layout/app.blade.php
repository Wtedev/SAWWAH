<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سواح - @yield('title')</title>

    <!-- Fonts and Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f9f9fb] font-[Tajawal] text-gray-800">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white border-l border-gray-200 p-6 shadow-md">
            <div class="text-center mb-10">
                <div class="w-16 h-16 mx-auto rounded-full bg-pink-50 flex items-center justify-center">
                    <i class="fas fa-plane text-pink-500 text-3xl"></i>
                </div>
                <h2 class="text-xl font-bold mt-2">سَوّاح</h2>
                <p class="text-sm text-gray-500">رفيقك الذي يُخطط رحلاتك!</p>
            </div>
            <nav class="space-y-2 text-right">
                <a href="/" class="block text-gray-700 font-medium hover:text-pink-500">الصفحة الرئيسية</a>
                <a href="/trip-planner" class="block text-gray-700 font-medium hover:text-pink-500">مخطط الرحلات</a>
                <a href="{{route('countries.index')}}" class="block text-gray-700 font-medium hover:text-pink-500">قائمة الوجهات السياحية</a>
                <a href="/events" class="block text-gray-700 font-medium hover:text-pink-500">أهم الفعاليات</a>
                <a href="/suggest" class="block bg-pink-500 text-white text-center py-2 rounded-lg font-bold hover:bg-pink-600">نظام الإقتراح الذكي</a>
                <hr class="my-4">
                <a href="/profile" class="block text-gray-700 font-medium hover:text-pink-500">ملفي الشخصي</a>
                <a href="/contact" class="block text-gray-700 font-medium hover:text-pink-500">تواصل معنا</a>
                <p class="mt-6 text-sm text-gray-400 text-center">جميع الحقوق محفوظة</p>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            @yield('content')
        </main>
    </div>
</body>
</html>
