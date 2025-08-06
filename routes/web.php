<?php

use App\Http\Controllers\Admin\CountryAdminController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\Admin\EventAdminController;

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
require __DIR__.'/auth.php';





Route::resource('countries', CountryController::class);


// 🎉 أهم الفعاليات
Route::get('/events', function () {
    return view('events.index');
})->name('events.index');

// 🧭 مخطط الرحلات
// Route::view('/trip-planner', 'trip-planner.index')->name('trip-planner');
// تعديل ربط الكنترولر -> lama 
use App\Http\Controllers\TripPlannerController;
Route::get('/trip-planner', [TripPlannerController::class, 'index'])->name('trip-planner');


// 📝 نموذج الاقتراح
Route::get('/suggest', function () {
    return view('suggest.form');
})->name('suggest.form');

// ✅ نتيجة الاقتراح (POST)
Route::post('/suggest', function () {
    // في المستقبل: معالجة البيانات
    return redirect()->route('suggest.result');
})->name('suggest.store');

// 🗺️ صفحة نتيجة الاقتراح
Route::get('/suggest/result', function () {
    return view('suggest.result');
})->name('suggest.result');

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

// 🌐 إدارة الدول

Route::prefix('admin')->group(function () {
    Route::resource('countries', CountryAdminController::class)->names('admin.countries');
});



