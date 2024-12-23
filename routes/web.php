<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PencarianController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DetailbookingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\RoomController;





Route::get('/pengelola', function () {
    return view('welcome');
});


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
Route::get('/admin', [AdminController::class, 'index']);

// routes/web.php

// Route untuk dashboard admin
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

// Route untuk daftar pengguna
Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');

// Route untuk daftar pengguna yang telah melakukan booking
Route::get('/booking/user-list', [DetailbookingController::class, 'userList'])->name('admin.booking.user_list');

// Route untuk detail booking
Route::get('/admin/booking/{id}', [DetailbookingController::class, 'detail'])
    ->name('admin.booking.detail');
Route::delete('/admin/booking/{id}/destroy', [DetailbookingController::class, 'destroy'])
    ->name('admin.booking.destroy');


// Room admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('room/room_list', [RoomController::class, 'index'])
        ->name('room.room_list');

    Route::get('room/{id}/edit', [RoomController::class, 'edit'])
        ->name('room.edit');

    Route::put('room/{id}', [RoomController::class, 'update'])
        ->name('room.update');

    Route::delete('room/{id}', [RoomController::class, 'destroy'])
        ->name('room.destroy');
});
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

Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
Route::get('/booking/{id}', [BookingController::class, 'show'])->name('booking.show'); // Detail Booking
Route::post('/booking/{id}/get-snap-token', [BookingController::class, 'getSnapToken']);
Route::post('/payment/notification', [BookingController::class, 'notificationHandler']); // Notifikasi
Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
Route::get('/booking/{id}/pay', [BookingController::class, 'pay'])->name('booking.pay');
Route::get('/booking/{id}', [BookingController::class, 'show'])->name('booking.show');
Route::post('/midtrans/notification', [MidtransController::class, 'handleNotification']);



//Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
// Route::get('/booking/{room_id}', [BookingController::class, 'create'])->name('booking.create');
// Route::get('/booking/{id}', [BookingController::class, 'show'])->name('booking.show'); // Detail booking
// Route::post('/booking/{id}/pay', [BookingController::class, 'pay'])->name('booking.pay'); // Proses pembayaran
// Route::post('/payment/notification', [BookingController::class, 'notificationHandler']); // Callback Midtrans



Route::get('/pencarian/room/{id}', [PencarianController::class, 'showRoom'])->name('pencarian.room');
Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
Route::get('/pencarian/room/{id}', [PencarianController::class, 'showRoom'])->name('pencarian.room');
Route::get('/pencarian/room/{id}', [PencarianController::class, 'showRoom'])->name('pencarian.room');
Route::get('/update-room-prices', [PencarianController::class, 'updateRoomPrices']);


Route::get('/hello', function () {
    return view('hello');
});
