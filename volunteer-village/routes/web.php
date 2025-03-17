<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::get('/student-home', function () {
    return view('StudentHome'); // No subfolder needed
});


Route::get('/home', [StudentController::class, 'home'])->name('home');
Route::get('/profile', [StudentController::class, 'profile'])->name('profile');
Route::post('/logout', [StudentController::class, 'logout'])->name('logout');
Route::get('/submit-hours', [StudentController::class, 'submitHours'])->name('submit.hours');
Route::get('/your-hours', [StudentController::class, 'yourHours'])->name('your.hours');
Route::get('/messaging', [StudentController::class, 'messaging'])->name('messaging');
Route::get('/opportunity-board', [StudentController::class, 'opportunityBoard'])->name('opportunity.board');