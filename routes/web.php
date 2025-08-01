<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\ProfileController; // **قمنا بإضافة هذا السطر**




// 🏠 الصفحة الرئيسية
Route::get('/', function () {
    return view('home');
})->name('home');

// ** 📍 قائمة الوجهات السياحية (تمت إضافته لإصلاح خطأ 404) **
Route::get('/places', [CountryController::class, 'index'])->name('places.index');

// 🌍 قائمة الدول
Route::get('/countries', [CountryController::class, 'index'])->name('countries.index');

// 🌍 تفاصيل الدولة
Route::get('/countries/{slug}', function ($slug) {
    return view('countries.show', compact('slug'));
})->name('countries.show');

// 🎉 أهم الفعاليات
Route::get('/events', function () {
    return view('events.index');
})->name('events.index');

// 🧭 مخطط الرحلات
Route::view('/trip-planner', 'trip-planner.index')->name('trip-planner');

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
    Route::get('/', [EventController::class, 'index'])->name('index');
    Route::get('/create', [EventController::class, 'create'])->name('create');
    Route::post('/', [EventController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [EventController::class, 'edit'])->name('edit');
    Route::put('/{id}', [EventController::class, 'update'])->name('update');
    Route::delete('/{id}', [EventController::class, 'destroy'])->name('destroy');
});


// ⚠️ صفحة الخطأ 404
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

// ===============================
// 👑 صفحات الأدمن (Admin)
// ===============================

// 🌐 إدارة الدول
Route::get('/admin/countries', function () {
    return view('admin.countries.index');
})->name('admin.countries.index');

// ✍️ إضافة دولة
Route::get('/admin/countries/create', function () {
    return view('admin.countries.form');
})->name('admin.countries.create');

// ✍️ تعديل دولة
Route::get('/admin/countries/{id}/edit', function ($id) {
    return view('admin.countries.form', compact('id'));
})->name('admin.countries.edit');

// ===============================
// 🔑 مسارات المصادقة (Authentication Routes)
// ===============================
require __DIR__.'/auth.php';