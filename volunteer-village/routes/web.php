<?php
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [StudentController::class, 'index'])->name('home');
    Route::get('/profile', [StudentController::class, 'profile'])->name('profile');
    Route::post('/logout', [StudentController::class, 'logout'])->name('logout');
    Route::get('/submit-hours', [StudentController::class, 'submitHours'])->name('submit.hours');
    Route::get('/your-hours', [StudentController::class, 'yourHours'])->name('your.hours');
    Route::get('/messaging', [StudentController::class, 'messaging'])->name('messaging');
    Route::get('/opportunity-board', [StudentController::class, 'opportunityBoard'])->name('opportunity.board');
});
