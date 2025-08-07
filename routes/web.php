<?php

use App\Http\Controllers\Admin\CountryAdminController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\EventPublicController;
use App\Http\Controllers\Admin\EventAdminController;
// API routes
use App\Http\Controllers\WeatherController;

// ✅ الصفحة الرئيسية
Route::get('/', [HomeController::class, 'index'])->name('home');

// ✅ صفحة "عن المشروع" (ثابتة)
Route::get('/about', function () {
    return view('about');
})->name('about');

// ✅ صفحة "تواصل معنا"
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// ✅ صفحة عرض جميع الرحلات
Route::get('/trips', [TripController::class, 'index'])->name('trips.index');

// ✅ صفحة تفاصيل رحلة (ID ديناميكي)
Route::get('/trips/{id}', [TripController::class, 'show'])->name('trips.show');

// API للطقس (للاستخدام في لوحة الإدارة)


// مسارات لوحة التحكم
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    // مسارات إدارة الدول
    Route::controller(CountryAdminController::class)->group(function () {
        Route::get('/countries', 'index')->name('admin.countries.index');
        Route::get('/countries/create', 'create')->name('admin.countries.create');
        Route::post('/countries', 'store')->name('admin.countries.store');
        Route::get('/countries/{country}/edit', 'edit')->name('admin.countries.edit');
        Route::put('/countries/{country}', 'update')->name('admin.countries.update');
        Route::delete('/countries/{country}', 'destroy')->name('admin.countries.destroy');
    });

    // مسارات إدارة الفعاليات
    Route::controller(EventAdminController::class)->group(function () {
        Route::get('/events', 'index')->name('admin.events.index');
        Route::get('/events/create', 'create')->name('admin.events.create');
        Route::post('/events', 'store')->name('admin.events.store');
        Route::get('/events/{event}/edit', 'edit')->name('admin.events.edit');
        Route::put('/events/{event}', 'update')->name('admin.events.update');
        Route::delete('/events/{event}', 'destroy')->name('admin.events.destroy');
    });
});



// ✅ لوحة التحكم (تحتاج تسجيل دخول)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ✅ صفحات الملف الشخصي
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ✅ تسجيل الدخول والتسجيل
require __DIR__ . '/auth.php';

// مسارات لوحة التحكم للأدمن
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    // الصفحة الرئيسية للوحة التحكم
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    // إدارة الفعاليات
    Route::resource('events', App\Http\Controllers\Admin\EventAdminController::class);

    // إدارة الدول
    Route::resource('countries', App\Http\Controllers\Admin\CountryAdminController::class);
});





// مسارات الدول
Route::resource('countries', CountryController::class);

// مسارات الفعاليات
Route::controller(EventPublicController::class)->group(function () {
    Route::get('/events', 'index')->name('events.index');          // صفحة الفعاليات الرئيسية
    Route::get('/events/{event}', 'show')->name('events.show');    // صفحة تفاصيل الفعالية
});

// 🧭 مخطط الرحلات
// Route::view('/trip-planner', 'trip-planner.index')->name('trip-planner');
// تعديل ربط الكنترولر -> lama 
use App\Http\Controllers\TripPlannerController;

Route::get('/trip-planner', [TripPlannerController::class, 'index'])->name('trip-planner');



// ===================================================================

// 📝 نموذج الاقتراح
// تعديل الراوت للكنترولر -> lama


// Route::get('/suggest', function () {
//     return view('suggest.form');
// })->name('suggest.form');
// // use App\Http\Controllers\SuggestionController;
// // Route::get('/suggest', [SuggestionController::class, 'store'])->name('suggest.store');


// // ✅ نتيجة الاقتراح (POST)
// Route::post('/suggest', function () {
//     // في المستقبل: معالجة البيانات
//     return redirect()->route('suggest.result');
// })->name('suggest.store');

// // 🗺️ صفحة نتيجة الاقتراح
// Route::get('/suggest/result', function () {
//     return view('suggest.result');
// })->name('suggest.result');

use App\Http\Controllers\SuggestionController;


// صفحة "نموذج الاقتراح"
Route::get('/suggest', function () {
    return view('suggest.form');
})->name('suggest.form');

// عملية إرسال الاقتراح (POST)
Route::post('/suggest', [SuggestionController::class, 'store'])->name('suggest.store');

// صفحة "نتيجة الاقتراح"
Route::get('/suggest/result', function () {
    return view('suggest.result');
})->name('suggest.result');


// ===================================================================

// 📞 مسار صفحة "تواصل معنا"
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// ===================================================================
// 🔑 مسارات المستخدم (User) - تتطلب تسجيل دخول
// ===================================================================
Route::middleware('auth')->group(function () {

    // 👤 مسار الملف الشخصي - قمنا بإضافة هذا المسار
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 💡 مسار لوحة القيادة (Dashboard)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// 🔐 مسارات الأدمن - إدارة الفعاليات (تتطلب auth + is_admin)
Route::middleware(['auth', 'is_admin'])->prefix('admin/events')->name('admin.events.')->group(function () {
    Route::get('/', [EventAdminController::class, 'index'])->name('index');
    Route::get('/create', [EventAdminController::class, 'create'])->name('create');
    Route::post('/', [EventAdminController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [EventAdminController::class, 'edit'])->name('edit');
    Route::put('/{id}', [EventAdminController::class, 'update'])->name('update');
    Route::delete('/{id}', [EventAdminController::class, 'destroy'])->name('destroy');
});




// ===============================
// 👑 صفحات الأدمن (Admin)
// ===============================



// مسارات لوحة التحكم
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    // لوحة التحكم الرئيسية
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    // إدارة الفعاليات
    Route::resource('events', App\Http\Controllers\Admin\EventAdminController::class);

    // إدارة الدول
    Route::resource('countries', App\Http\Controllers\Admin\CountryAdminController::class);
});

// 🌐 إدارة الدول

Route::prefix('admin')->group(function () {
    Route::resource('countries', CountryAdminController::class)->names('admin.countries');
});

// Weather API Routes
Route::post('/admin/countries/weather', [WeatherController::class, 'getWeatherByCapital'])->name('admin.weather.capital');
Route::post('/api/weather/country', [WeatherController::class, 'getWeatherByCountryCode'])->name('api.weather.country'); // للتوافق مع النظام السابق

// Weather Test Route (للاختبار فقط)
Route::get('/test-weather', function () {
    $weatherController = new WeatherController();
    
    $cities = ['Riyadh', 'Dubai', 'London', 'Cairo', 'Paris'];
    $results = [];
    
    foreach ($cities as $city) {
        $request = new \Illuminate\Http\Request(['capital' => $city]);
        $response = $weatherController->getWeatherByCapital($request);
        $results[$city] = json_decode($response->getContent(), true);
    }
    
    return view('test-weather', compact('results'));
})->name('test.weather');
