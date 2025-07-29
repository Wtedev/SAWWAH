<?php

use Illuminate\Support\Facades\Route;

// 🌍 الصفحة الرئيسية
Route::get('/', function () {
    return view('home');
})->name('home');

// 🌍 قائمة الدول
Route::get('/countries', function () {
    return view('countries.index');
})->name('countries.index');

// 🌍 تفاصيل الدولة
Route::get('/countries/{slug}', function () {
    return view('countries.show');
})->name('countries.show');

// 📝 نموذج الاقتراح
Route::get('/suggest', function () {
    return view('suggest.form');
})->name('suggest.form');

// ✅ نتيجة الاقتراح (POST)
Route::post('/suggest/result', function () {
    return view('suggest.result');
})->name('suggest.result');

// 🎉 أهم الفعاليات
Route::get('/events', function () {
    return view('events.index');
})->name('events.index');

// 🧭 خطط رحلتي (Planner)
Route::get('/trip-planner', function () {
    return view('trip-planner.index');
})->name('trip.planner');

// 👤 الملف الشخصي (مؤقت بدون تسجيل دخول)
Route::get('/profile', function () {
    return view('profile.index');
})->name('profile');

// 💌 تواصل معنا
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// ❌ صفحة الخطأ 404
Route::fallback(function () {
    return view('errors.404');
})->name('fallback');


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
Route::get('/admin/countries/{id}/edit', function () {
    return view('admin.countries.form');
})->name('admin.countries.edit');

// 🌐 إدارة الفعاليات
Route::get('/admin/events', function () {
    return view('admin.events.index');
})->name('admin.events.index');

// ✍️ إضافة فعالية
Route::get('/admin/events/create', function () {
    return view('admin.events.form');
})->name('admin.events.create');

// ✍️ تعديل فعالية
Route::get('/admin/events/{id}/edit', function () {
    return view('admin.events.form');
})->name('admin.events.edit');

