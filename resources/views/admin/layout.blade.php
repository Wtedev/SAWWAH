<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                <a href="{{ route('admin.dashboard') }}" class="block text-gray-700 font-medium hover:text-pink-500">لوحة التحكم</a>
                <a href="{{ route('admin.countries.index') }}" class="block text-gray-700 font-medium hover:text-pink-500">إدارة الدول</a>
                <a href="{{ route('admin.events.index') }}" class="block text-gray-700 font-medium hover:text-pink-500">إدارة الفعاليات</a>
                <hr class="my-4">
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="block w-full text-right text-gray-700 font-medium hover:text-pink-500">تسجيل الخروج</button>
                </form>
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
