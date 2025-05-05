<?php

use App\Http\Controllers\OpportunityController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\OrganizationOpportunityController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\DB;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

// Schools
Route::middleware(['auth'])->group(function () {
    Route::resource('schools', SchoolController::class);
    Route::post('/schools/{school}/approve', [SchoolController::class, 'approve'])
        ->name('schools.approve')
        ->middleware('can:approve,school');
});


// Opportunities
// view opportunities
Route::middleware(['auth'])->group(function () {
    Route::get('/opportunities', [OpportunityController::class, 'index'])->name('opportunities.index');
});


// Messaging
Route::middleware(['auth'])->group(function () {
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
    Route::delete('/messages/{id}', [MessageController::class, 'destroy'])->name('messages.destroy');
    Route::get('/messages/{userId}', [MessageController::class, 'getMessages'])->name('messages.get');
});

// Organization
Route::get('/organization/home', [OrganizationController::class, 'index'])->name('organization.home');

Route::middleware(['auth', 'role:organization'])->prefix('organization')->name('organization.')->group(function () {
    Route::get('/opportunities', [OrganizationOpportunityController::class, 'index'])->name('opportunities.index');
    Route::put('/opportunities/{id}', [OrganizationOpportunityController::class, 'update'])->name('opportunities.update');
    Route::delete('/opportunities/{id}', [OrganizationOpportunityController::class, 'destroy'])->name('opportunities.destroy');
    Route::get('/opportunities/create', [OrganizationOpportunityController::class, 'create'])->name('createOpportunity');
    Route::post('/opportunities', [OrganizationOpportunityController::class, 'store'])->name('storeOpportunity');
});

// Authenticated Organization
Route::middleware('auth')->group(function () {
    Route::get('/organization/opportunities/create', [OrganizationController::class, 'createOpportunity'])->name('organization.createOpportunity');
    Route::post('/organization/opportunities', [OrganizationController::class, 'storeOpportunity'])->name('organization.storeOpportunity');
});

// Teacher
Route::get('/teacher/home', [TeacherController::class, 'index'])->name('teacher.home');

// End of teacher routes

// Dashboard (uses Eloquent)
Route::get('/dashboard', function () {
    $leaders = User::join('leaderboard', 'users.id', '=', 'leaderboard.student_id')
        ->select('users.*', 'leaderboard.total_hours')
        ->orderByDesc('leaderboard.total_hours')
        ->limit(5)
        ->get();


    return view('dashboard', compact('leaders'));
})->middleware(['auth', 'verified'])->name('dashboard');

// End of dashboard routes

// Auth
Route::get('/login', [AuthenticatedSessionController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'login']);
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::post('register', [RegisteredUserController::class, 'store']);

// End of auth routes

// Profile
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/photo', [ProfileController::class, 'uploadPhoto'])->name('profile.upload-photo');
});

//  End of profile routes

// Admin
Route::middleware(['web'])->group(function () {
    Route::get('/admin/login', [AuthenticatedSessionController::class, 'showAdminLogin'])->name('admin.login');
    Route::post('/admin/login', [AuthenticatedSessionController::class, 'adminLogin'])->name('admin.login.submit');

    Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
        Route::get('/users/{user}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
        Route::put('/users/{user}', [AdminController::class, 'updateUser'])->name('admin.users.update');
        Route::delete('/users/{user}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
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

// End of admin routes

// Student
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

// end of student routes

// Settings routes
Route::get('/settings', function () {
    return view('settings');
})->middleware('auth')->name('settings');

Route::post('/toggle-darkmode', function () {
    $current = session('dark_mode', false);
    session(['dark_mode' => !$current]);
    return back();
})->name('toggle.darkmode');

// End of settings routes

// Leaderboard (uses Eloquent)
Route::get('/leaderboard', function () {
    $leaderboard = User::join('leaderboard', 'users.id', '=', 'leaderboard.student_id')
        ->select('users.*', 'leaderboard.total_hours')
        ->orderByDesc('leaderboard.total_hours')
        ->limit(10)
        ->get();

    return view('leaderboard', compact('leaderboard'));
})->middleware('auth')->name('leaderboard');

    
    // Service hours approval routes
    Route::middleware(['auth', 'role:teacher,admin'])->group(function () {
        Route::get('/pending-hours', [StudentController::class, 'pendingHours'])->name('pending.hours');
        Route::post('/hours/{id}/status', [StudentController::class, 'updateHoursStatus'])->name('update.hours.status');
    });
});


// leaderboard (moved outside student group)
Route::get('/leaderboard', [LeaderboardController::class, 'index'])
    ->name('leaderboard')
    ->middleware('auth');

require __DIR__.'/auth.php';

