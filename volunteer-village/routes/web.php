<?php

use App\Http\Controllers\OpportunityController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\TeacherController;
// use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Livewire\Messaging;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LeaderboardController;




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

//view opportunities
Route::get('/opportunities', [OpportunityController::class, 'index'])->name('opportunities.index');


//messaging routes
Route::get('/messaging', Messaging::class)->name('messaging');

//start of organization routes
Route::get('/organization/home', [OrganizationController::class, 'index'])->name('organization.home');
Route::get('/organization/opportunities/create', [OrganizationController::class, 'createOpportunity'])->name('organization.createOpportunity');
Route::post('/organization/opportunities', [OrganizationController::class, 'storeOpportunity'])->name('organization.storeOpportunity');
//end of organization routes

//teacher routes
Route::get('/teacher/home', [TeacherController::class, 'index'])->name('teacher.home');
//end of teacher routes
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/login', [AuthenticatedSessionController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'login']);
Route::get('/logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
Route::get('/student-home', function () {
    return view('StudentHome'); // No subfolder needed
});


Route::get('/student-home', [StudentController::class, 'home'])->name('home');
// Route::get('/profile', [StudentController::class, 'profile'])->name('profile');
Route::post('/logout', [StudentController::class, 'logout'])->name('logout');
Route::get('/submit-hours', [StudentController::class, 'submitHours'])->name('submit.hours');
Route::get('/your-hours', [StudentController::class, 'yourHours'])->name('your.hours');
Route::get('/opportunity-board', [StudentController::class, 'opportunityBoard'])->name('opportunity.board');

Route::get('/leaderboard', [LeaderboardController::class, 'index'])->name('leaderboard');
