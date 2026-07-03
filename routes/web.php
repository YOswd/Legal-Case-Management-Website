<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Client\DashboardController as ClientDashboardController;
use App\Http\Controllers\Lawyer\DashboardController as LawyerDashboardController;
use App\Http\Controllers\Lawyer\ProfileController as LawyerProfileController;
use App\Http\Controllers\LegalCaseController;
use App\Http\Controllers\Public\PublicController;
use Illuminate\Support\Facades\Route;

Route::controller(PublicController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/lawyers', 'lawyers')->name('lawyers.index');
    Route::get('/lawyers/{lawyer}', 'show')->name('lawyers.show');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
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

require __DIR__.'/auth.php';
