<?php

use Illuminate\Support\Facades\Route;

// الصفحة الرئيسية
Route::get('/', function () {
    return view('home');
})->name('home');

// نموذج الاقتراح
Route::get('/suggest', function () {
    return view('suggest.form');
})->name('suggest.form');

// نتيجة إرسال الاقتراح
Route::post('/suggest/result', function () {
    return view('suggest.result');
})->name('suggest.result');

// صفحة تخطيط الرحلة
Route::get('/trip-planner', function () {
    return view('trip-planner.index');
})->name('trip.planner');

// إدارة الفعاليات (عرض)
Route::get('/admin/events', function () {
    return view('admin.events.index');
})->name('admin.events.index');

// إدارة الفعاليات (نموذج الإضافة/التعديل)
Route::get('/admin/events/form', function () {
    return view('admin.events.form');
})->name('admin.events.form');
