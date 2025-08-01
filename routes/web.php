<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController; // تأكد من استيراد الكنترولر
use App\Http\Controllers\Admin\EventController;

// 🏠 الصفحة الرئيسية
Route::get('/', function () {
    return view('home');
})->name('home');

// 🌍 قائمة الدول
Route::get('/countries', [CountryController::class, 'index'])->name('countries.index'); // استخدام الكنترولر لعرض الدول

// 🌍 تفاصيل الدولة
Route::get('/countries/{slug}', function ($slug) { // تعديل {id} إلى {slug}
    return view('countries.show', compact('slug')); // عرض تفاصيل الدولة
})->name('countries.show');

// 🎉 أهم الفعاليات
Route::get('/events', function () {
    return view('events.index'); // عرض قائمة الفعاليات
})->name('events.index');

// 🧭 مخطط الرحلات
Route::view('/trip-planner', 'trip-planner.index')->name('trip-planner');

// 📝 نموذج الاقتراح
Route::get('/suggest', function () {
    return view('suggest.form'); // نموذج اقتراح جديد
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

// مسارات الأدمن - إدارة الفعاليات (CRUD)
Route::prefix('admin/events')->name('admin.events.')->group(function () {
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
// 💡 مسار لوحة القيادة (Dashboard) - تمت إضافته لحل مشكلة 'Route [dashboard] not defined'
// ===============================
Route::get('/dashboard', function () {
    return view('dashboard'); // يشير إلى ملف resources/views/dashboard.blade.php
})->name('dashboard');

// ===============================
// 🔑 مسارات المصادقة (Authentication Routes) - تمت إضافتها لحل مشكلة 'Route [login] not defined'
// هذا السطر يقوم بتضمين جميع مسارات تسجيل الدخول والتسجيل وغيرها من ملف routes/auth.php
// ===============================
require __DIR__.'/auth.php';

// ===============================
// 👑 صفحات الأدمن (Admin)
// ===============================

// 🌐 إدارة الدول
Route::get('/admin/countries', function () {
    return view('admin.countries.index'); // عرض قائمة الدول في لوحة التحكم
})->name('admin.countries.index');

// ✍️ إضافة دولة
Route::get('/admin/countries/create', function () {
    return view('admin.countries.form'); // صفحة إضافة دولة جديدة في لوحة التحكم
})->name('admin.countries.create');

// ✍️ تعديل دولة
Route::get('/admin/countries/{id}/edit', function ($id) {
    return view('admin.countries.form', compact('id')); // صفحة تعديل الدولة في لوحة التحكم
})->name('admin.countries.edit');

// 🌐 إدارة الفعاليات
Route::get('/admin/events', function () {
    return view('admin.events.index'); // عرض قائمة الفعاليات في لوحة التحكم
})->name('admin.events.index');

// ✍️ إضافة فعالية
Route::get('/admin/events/create', function () {
    return view('admin.events.form'); // صفحة إضافة فعالية جديدة في لوحة التحكم
})->name('admin.events.create');

// ✍️ تعديل فعالية
Route::get('/admin/events/{id}/edit', function ($id) {
    return view('admin.events.form', compact('id')); // صفحة تعديل فعالية في لوحة التحكم
})->name('admin.events.edit');

