<?php

use App\Http\Controllers\OpportunityController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\TeacherController;
// use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\OrganizationOpportunityController;
use App\Http\Livewire\Messaging;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\AdminController;

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
Route::get('/opportunities', [OpportunityController::class, 'index'])->name('opportunities.index');

// //messaging routes
Route::get('/messaging', Messaging::class)->name('messaging');


// organization routes
Route::get('/organization/home', [OrganizationController::class, 'index'])->name('organization.home');

Route::middleware(['auth', 'role:organization'])->prefix('organization')->name('organization.')->group(function () {
    Route::get('/opportunities', [OrganizationOpportunityController::class, 'index'])->name('opportunities.index');
    Route::put('/opportunities/{id}', [OrganizationOpportunityController::class, 'update'])->name('opportunities.update');
    Route::delete('/opportunities/{id}', [OrganizationOpportunityController::class, 'destroy'])->name('opportunities.destroy');
    Route::get('/opportunities/create', [OrganizationOpportunityController::class, 'create'])->name('createOpportunity');
    Route::post('/opportunities', [OrganizationOpportunityController::class, 'store'])->name('storeOpportunity');
});



// Protected organization routes
Route::middleware('auth')->group(function () {
    Route::get('/organization/opportunities/create', [OrganizationController::class, 'createOpportunity'])->name('organization.createOpportunity');
    Route::post('/organization/opportunities', [OrganizationController::class, 'storeOpportunity'])->name('organization.storeOpportunity');
});

// teacher routes
Route::get('/teacher/home', [TeacherController::class, 'index'])->name('teacher.home');

// dashboard and auth routes
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/login', [AuthenticatedSessionController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'login']);
Route::post('/logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// profile routes
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// admin routes
Route::middleware(['web'])->group(function () {
    Route::get('/admin/login', [AuthenticatedSessionController::class, 'showAdminLogin'])->name('admin.login');
    Route::post('/admin/login', [AuthenticatedSessionController::class, 'adminLogin'])->name('admin.login.submit');

    Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
        Route::get('/users/{user}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
        Route::put('/users/{user}', [AdminController::class, 'updateUser'])->name('admin.users.update');
        Route::delete('/users/{user}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
        
        // Schools routes
        Route::resource('schools', AdminController::class)->names([
            'index' => 'admin.schools.index',
            'create' => 'admin.schools.create',
            'store' => 'admin.schools.store',
            'edit' => 'admin.schools.edit',
            'update' => 'admin.schools.update',
            'destroy' => 'admin.schools.destroy',
        ]);
    });
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


});

// leaderboard (moved outside student group)
Route::get('/leaderboard', [LeaderboardController::class, 'index'])
    ->name('leaderboard')
    ->middleware('auth');

require __DIR__.'/auth.php';
