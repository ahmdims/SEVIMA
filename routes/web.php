<?php

use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\EventAdminController;
use App\Http\Controllers\App\CandidateAppController;
use App\Http\Controllers\App\DashboardAppController;
use App\Http\Controllers\App\EventAppController;
use App\Http\Controllers\App\LandingdAppController;
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
Route::get('/', [LandingdAppController::class, 'index'])->name('landing.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardAppController::class, 'index'])->name('app.dashboard.index');
    Route::get('/event', [EventAppController::class, 'index'])->name('app.event.index');
    Route::get('/candidate', [CandidateAppController::class, 'index'])->name('app.candidate.index');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardAdminController::class, 'index'])->name('admin.dashboard.index');

    Route::get('/admin/event', [EventAdminController::class, 'index'])->name('admin.event.index');
    Route::post('/admin/event', [EventAdminController::class, 'store'])->name('admin.event.store');
    Route::get('/admin/event/{id}', [EventAdminController::class, 'show'])->name('admin.event.show');
    Route::put('/admin/event/{id}', [EventAdminController::class, 'update'])->name('admin.event.update');
    Route::get('/admin/event/{id}/setup', [EventAdminController::class, 'setup'])->name('admin.event.setup');
    Route::delete('/admin/event/{id}', [EventAdminController::class, 'destroy'])->name('admin.event.destroy');
});

Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

require __DIR__ . '/auth.php';
