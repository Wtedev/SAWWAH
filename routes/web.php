<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\ProfileController;

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
