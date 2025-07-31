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

Route::get('/events/{slug}', function ($slug) {
    $events = [
        'fiba-2025' => [
            'title' => 'FIBA Asia Cup 2025',
            'image' => asset('images/fiba.jpg'),
            'date' => '5–17 أغسطس | جدة',
            'description' => 'بطولة آسيا لكرة السلة تحت رعاية FIBA. تُقام بجدة وتشمل منافسات قوية من عدة دول.'
        ],
        'snooker-masters-2025' => [
            'title' => 'Snooker Masters 2025',
            'image' => asset('images/snooker.jpg'),
            'date' => '8–16 أغسطس | جدة',
            'description' => 'بطولة السنوكر الدولية بجدة تجمع أفضل اللاعبين العالميين في أجواء احترافية.'
        ],
        'esports-worldcup' => [
            'title' => 'Esports World Cup 2025',
            'image' => asset('images/esports.jpg'),
            'date' => '7 يوليو – 24 أغسطس | الرياض',
            'description' => 'أهم حدث في عالم الرياضات الإلكترونية بمشاركة أفضل اللاعبين من جميع أنحاء العالم.'
        ],
        'pubg-worldcup' => [
            'title' => 'PUBG Mobile World Cup',
            'image' => asset('images/pubg.jpg'),
            'date' => '25 يوليو – 3 أغسطس | الرياض',
            'description' => 'بطولة PUBG العالمية تقام لأول مرة في المملكة بمشاركة عالمية ضخمة.'
        ],
        'comedy-riyadh' => [
            'title' => 'مهرجان الرياض للكوميديا',
            'image' => asset('images/comedy.jpg'),
            'date' => '26 سبتمبر – 9 أكتوبر | الرياض',
            'description' => 'فعاليات كوميدية بمشاركة نجوم من العالم العربي والغربي. تجارب ممتعة وضحك بلا حدود.'
        ],
        'soudah-season' => [
            'title' => 'موسم السودة 2025',
            'image' => asset('images/soudah.jpg'),
            'date' => '15 يوليو – 30 أغسطس | أبها',
            'description' => 'فعاليات جبلية، مغامرات، وتجارب ثقافية ممتعة في مرتفعات أبها الخلابة.'
        ],
        'lahib-alula' => [
            'title' => 'سباق لهيب العُلا 2025',
            'image' => asset('images/lahib-race.jpg'),
            'date' => 'أكتوبر 2025 | العُلا',
            'description' => 'سباق صحراوي مثير يجمع محبي السرعة والتحدي في أجواء العُلا الساحرة.'
        ],
        'ithra-season' => [
            'title' => 'إثراء - الموسم الثقافي 2025',
            'image' => asset('images/ithra.jpg'),
            'date' => 'صيف وخريف 2025 | مركز إثراء - الظهران',
            'description' => 'عروض فنية، ورش عمل ثقافية، وتجارب تعليمية لجميع الأعمار في إثراء.'
        ],
    ];

    if (!array_key_exists($slug, $events)) {
        abort(404);
    }

    return view('events.show', ['event' => $events[$slug]]);
})->name('event.details');




// ⚠️ صفحة الخطأ 404 لأي مسار غير معروف
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

