<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EventController;

// 🏠 الصفحة الرئيسية
Route::get('/', function () {
    return view('home');
})->name('home');

// 🧭 صفحات عامة
Route::view('/places', 'places')->name('places');
Route::view('/events', 'events')->name('events');
Route::view('/contact', 'contact')->name('contact');
Route::view('/profile', 'profile')->name('profile');

// 🗺️ مخطط الرحلات
Route::view('/trip-planner', 'trip-planner.index')->name('trip-planner');

// 🤖 نظام الاقتراح الذكي
Route::get('/suggest', function () {
    return view('suggest.form');
})->name('suggest.form');

Route::post('/suggest', function () {
    // في المستقبل: معالجة البيانات
    return redirect()->route('suggest.result');
})->name('suggest.store');

Route::get('/suggest/result', function () {
    return view('suggest.result');
})->name('suggest.result');

// 🛠️ لوحة التحكم - إدارة الفعاليات (CRUD)
Route::prefix('admin/events')->name('admin.events.')->group(function () {
    Route::get('/', [EventController::class, 'index'])->name('index');
    Route::get('/create', [EventController::class, 'create'])->name('create');
    Route::post('/', [EventController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [EventController::class, 'edit'])->name('edit');
    Route::put('/{id}', [EventController::class, 'update'])->name('update');
    Route::delete('/{id}', [EventController::class, 'destroy'])->name('destroy');
});

// ⚠️ صفحة الخطأ 404 لأي مسار غير معروف
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

