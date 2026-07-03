<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Client\DashboardController as ClientDashboardController;
use App\Http\Controllers\Lawyer\DashboardController as LawyerDashboardController;
use App\Http\Controllers\LegalCaseController;
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

require __DIR__.'/auth.php';
