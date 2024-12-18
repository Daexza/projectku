 <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PencarianController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;





Route::get('/pengelola', function () {
    return view('welcome');
});
// Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
// Route::get('/manager/dashboard', [ManagerController::class, 'index'])->name('manager.dashboard');
// Route::get('/user/dashboard', [UserController::class, 'index'])->name('dashboard,index');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

// Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');


// // Route untuk menampilkan form login
// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// // Route untuk memproses login
// Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// Route untuk logout
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])
->name('register.show');
Route::post('/register', [RegisterController::class, 'register'])
->name('register');
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Route untuk menampilkan form login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Route untuk memproses login
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// Route untuk logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route untuk dashboard admin
Route::get('/admin/dashboard', [UserController::class, 'adminDashboard'])->name('dashboard.admin');

// Route untuk dashboard manager
Route::get('/manager/dashboard', [UserController::class, 'managerDashboard'])->name('manager.dashboard');

// Route untuk dashboard user
Route::get('/user/dashboard', [UserController::class, 'userDashboard'])->name('pencarian.index');
// Middleware untuk memeriksa apakah pengguna sudah login
Route::middleware(['auth'])->group(function () {
    // Route yang hanya dapat diakses oleh pengguna yang sudah login
    Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
});









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


Route::resource('booking', BookingController::class);
Route::get('/', [DashboardController::class, 'index'])->name('home');

Route::get('/pencarian/room/{id}', [PencarianController::class, 'showRoom'])->name('pencarian.room');
Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
Route::get('/pencarian/room/{id}', [PencarianController::class, 'showRoom'])->name('pencarian.room');
Route::get('/pencarian/room/{id}', [PencarianController::class, 'showRoom'])->name('pencarian.room');


Route::get('/hello', function () {
    return view('hello');
});
