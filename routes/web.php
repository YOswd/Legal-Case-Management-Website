<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Client\DashboardController as ClientDashboardController;
use App\Http\Controllers\Lawyer\DashboardController as LawyerDashboardController;
use App\Http\Controllers\Lawyer\ProfileController as LawyerProfileController;
use App\Http\Controllers\LegalCaseController;
use App\Http\Controllers\LawyerDirectoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::resource('cases', LegalCaseController::class);

});

Route::get('/test', function () {
    return "Test route works";
});

Route::middleware(['auth', 'role:lawyer'])->group(function () {
    Route::get('/lawyer/dashboard', [LawyerDashboardController::class, 'index'])
        ->name('lawyer.dashboard');
});

Route::middleware(['auth', 'role:client'])->group(function () {
    Route::get('/client/dashboard', [ClientDashboardController::class, 'index'])
        ->name('client.dashboard');
});

Route::middleware(['auth', 'role:lawyer'])->group(function () {

    Route::get('/lawyer/profile', [LawyerProfileController::class, 'edit'])
        ->name('lawyer.profile.edit');

    Route::post('/lawyer/profile', [LawyerProfileController::class, 'update'])
        ->name('lawyer.profile.update');
});

Route::get('/lawyers', [LawyerDirectoryController::class, 'index'])
    ->name('lawyers.index');

Route::get('/lawyers/{lawyer}', [LawyerDirectoryController::class, 'show'])
    ->name('lawyers.show');

require __DIR__.'/auth.php';
