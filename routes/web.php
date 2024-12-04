 <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;



Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])
->name('register.show');
Route::post('/register', [RegisterController::class, 'register'])
->name('register');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard route
Route::get('/dashboard', function () {
    if (!Session::has('user_id')) {
        return redirect()->route('login')->with('error', 'Harap login terlebih dahulu.');
    }

    return view('dashboard', ['full_name' => Session::get('full_name')]);
})->name('dashboard');

Route::get('/hello', function () {
    return view('hello');
});
