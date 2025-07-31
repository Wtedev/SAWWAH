<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController; // تأكد من استيراد الكنترولر

// 🌍 الصفحة الرئيسية
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

// ✍️ إضافة فعالية
Route::get('/events/create', function () {
    return view('events.form'); // صفحة إضافة فعالية جديدة
})->name('events.create');

// ✍️ تعديل فعالية
Route::get('/events/{id}/edit', function ($id) {
    return view('events.form', compact('id')); // صفحة تعديل فعالية
})->name('events.edit');

// 🧭 خطط رحلتي (Planner)
Route::get('/trip-planner', function () {
    return view('trip-planner.index'); // صفحة تخطيط الرحلة
})->name('trip.planner');

// 📝 نموذج الاقتراح
Route::get('/suggest', function () {
    return view('suggest.form'); // نموذج اقتراح جديد
})->name('suggest.form');

// ✅ نتيجة الاقتراح (POST)
Route::post('/suggest/result', function () {
    return view('suggest.result'); // عرض نتيجة الاقتراح
})->name('suggest.result');

// 👤 الملف الشخصي (مؤقت بدون تسجيل دخول)
Route::get('/profile', function () {
    return view('profile.index'); // عرض ملف المستخدم الشخصي
})->name('profile');

// 💌 تواصل معنا
Route::get('/contact', function () {
    return view('contact'); // صفحة تواصل معنا
})->name('contact');

// ❌ صفحة الخطأ 404
Route::fallback(function () {
    return view('errors.404'); // صفحة الخطأ 404
})->name('fallback');

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


