<?php

use App\Http\Controllers\Admin\CandidateAdminController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\EventAdminController;
use App\Http\Controllers\App\CandidateAppController;
use App\Http\Controllers\App\DashboardAppController;
use App\Http\Controllers\App\EventAppController;
use App\Http\Controllers\App\LandingdAppController;
use App\Http\Controllers\App\VotingAppController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
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

// Route::get('/', [LandingdAppController::class, 'index'])->name('landing.index');
Route::get('/', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardAppController::class, 'index'])->name('app.dashboard.index');
    Route::get('/event', [EventAppController::class, 'index'])->name('app.event.index');
    Route::get('/event/{id}/voting', [EventAppController::class, 'voting'])->name('app.voting.index');
    Route::get('/event/voting/success', [EventAppController::class, 'success'])->name('app.success.index');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardAdminController::class, 'index'])->name('admin.dashboard.index');

    Route::get('/admin/event', [EventAdminController::class, 'index'])->name('admin.event.index');
    Route::post('/admin/event', [EventAdminController::class, 'store'])->name('admin.event.store');
    Route::get('/admin/event/{id}', [EventAdminController::class, 'show'])->name('admin.event.show');
    Route::put('/admin/event/{id}', [EventAdminController::class, 'update'])->name('admin.event.update');
    Route::delete('/admin/event/{id}', [EventAdminController::class, 'destroy'])->name('admin.event.destroy');

    Route::get('/admin/event/{id}/setup', [EventAdminController::class, 'setup'])->name('admin.event.setup');
    Route::post('/admin/candidate', [CandidateAdminController::class, 'store'])->name('admin.candidate.store');
    Route::get('/admin/candidate/{id}', [CandidateAdminController::class, 'show'])->name('admin.candidate.show');
    Route::put('/admin/candidate/{id}', [CandidateAdminController::class, 'update'])->name('admin.candidate.update');
    Route::get('/admin/candidate/{id}/setup', [CandidateAdminController::class, 'setup'])->name('admin.candidate.setup');
    Route::delete('/admin/candidate/{id}', [CandidateAdminController::class, 'destroy'])->name('admin.candidate.destroy');
});

Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

require __DIR__ . '/auth.php';
