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
    return view('trip-planner.index'); // أو trip/planner حسب الترتيب
})->name('trip.planner');

// إدارة الفعاليات (عرض)
Route::get('/admin/events', function () {
    return view('admin.events.index'); // أو admin_events_index
})->name('admin.events.index');

// إدارة الفعاليات (نموذج الإضافة/التعديل)
Route::get('/admin/events/form', function () {
    return view('admin.events.form'); // أو admin_events_form
})->name('admin.events.form');
