use App\Http\Controllers\TripController;

Route::get('/trips', [TripController::class, 'index'])->name('trips.index');
