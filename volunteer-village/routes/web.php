<?php

use App\Http\Controllers\OpportunityController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\TeacherController;
use App\Http\Livewire\Messaging;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\SchoolController;

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

// Schools routes
Route::middleware(['auth'])->group(function () {
    Route::resource('schools', SchoolController::class);
    Route::post('/schools/{school}/approve', [SchoolController::class, 'approve'])
        ->name('schools.approve')
        ->middleware('can:approve,school');
});

// [Rest of your existing routes remain unchanged...]
// view opportunities
Route::middleware(['auth'])->group(function () {
    Route::get('/opportunities', [OpportunityController::class, 'index'])->name('opportunities.index');
});

// messaging routes
Route::get('/messaging', \App\Http\Controllers\MessagingController::class)->name('messaging');

// organization routes
Route::get('/organization/home', [OrganizationController::class, 'index'])->name('organization.home');
Route::middleware('auth')->group(function () {
    Route::get('/organization/opportunities/create', [OrganizationController::class, 'createOpportunity'])->name('organization.createOpportunity');
    Route::post('/organization/opportunities', [OrganizationController::class, 'storeOpportunity'])->name('organization.storeOpportunity');
});

// teacher routes
Route::get('/teacher/home', [TeacherController::class, 'index'])->name('teacher.home');

// dashboard and auth routes
Route::get('/dashboard', function () {
    if (auth()->user()->role === 'student') {
        return redirect()->route('student.home');
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/login', [AuthenticatedSessionController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'login']);
Route::get('/logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// profile routes
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Group student-specific routes
Route::prefix('student')->name('student.')->group(function () {
    Route::get('/home', [StudentController::class, 'home'])->name('home');
    Route::get('/profile', [StudentController::class, 'profile'])->name('profile');
    Route::post('/logout', [StudentController::class, 'logout'])->name('logout');
    Route::get('/submit-hours', [StudentController::class, 'submitHours'])->name('submit.hours');
    Route::post('/submit-hours', [StudentController::class, 'storeHours'])->name('submit.hours.store');
    Route::get('/your-hours', [StudentController::class, 'yourHours'])->name('your.hours');
    Route::get('/messaging', [StudentController::class, 'messaging'])->name('messaging');
    Route::get('/opportunity-board', [StudentController::class, 'opportunityBoard'])->name('opportunity.board');
    
    // Service hours approval routes
    Route::middleware(['auth', 'role:teacher,admin'])->group(function () {
        Route::get('/pending-hours', [StudentController::class, 'pendingHours'])->name('pending.hours');
        Route::post('/hours/{id}/status', [StudentController::class, 'updateHoursStatus'])->name('update.hours.status');
    });
});

// leaderboard
Route::get('/leaderboard', [LeaderboardController::class, 'index'])->name('leaderboard');



Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

require __DIR__.'/auth.php';
