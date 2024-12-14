 <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PencarianController;
use App\Http\Controllers\BookingController;





Route::get('/pengelola', function () {
    return view('welcome');
});


Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])
->name('register.show');
Route::post('/register', [RegisterController::class, 'register'])
->name('register');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// // // Dashboard route
// // Route::get('/dashboard', function () {
// //     // if (!Session::has('user_id')) {
// //     //     return redirect()->route('login')->with('error', 'Harap login terlebih dahulu.');
// //     // }

// //     return view('dashboard', ['full_name' => Session::get('full_name')]);
// // })->name('dashboard.index');

Route::get('/pencarian', [PencarianController::class, 'index'])->name('pencarian.index');
Route::get('/pencarian/search', [PencarianController::class, 'search'])->name('pencarian.search'); // Fitur pencarian
Route::get('/pencarian/{id}', [PencarianController::class, 'show'])->name('pencarian.show');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::delete('/booking/{id}', [BookingController::class, 'destroy'])->name('booking.destroy');
Route::get('/recent-bookings', [DashboardController::class, 'index'])->name('recent.bookings');
Route::get('/pencarian', [PencarianController::class, 'index'])->name('pencarian.index');
Route::get('/pencarian/search', [PencarianController::class, 'search'])->name('pencarian.search');


Route::get('/hello', function () {
    return view('hello');
});
