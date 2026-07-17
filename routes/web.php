<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LegalCaseController;
use App\Http\Controllers\Client\CaseRequestController;
use App\Http\Controllers\Lawyer\RequestController;
use App\Http\Controllers\Public\PublicController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Client\DashboardController as ClientDashboardController;
use App\Http\Controllers\Lawyer\DashboardController as LawyerDashboardController;
use App\Http\Controllers\Lawyer\ProfileController as LawyerProfileController;
use App\Http\Controllers\Lawyer\LegalCaseController as LawyerLegalCaseController;
use App\Http\Controllers\CourtClerk\DashboardController as CourtClerkDashboardController;
use App\Http\Controllers\CourtClerk\CaseController;
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

    Route::get('/admin/legal-cases', [LegalCaseController::class, 'index'])
        ->name('admin.cases.index');

    Route::get('/admin/legal-cases/{legalCase}', [LegalCaseController::class, 'show'])
        ->name('admin.cases.show');

    Route::get('/admin/legal-cases/{legalCase}/edit', [LegalCaseController::class, 'edit'])
        ->name('admin.cases.edit');

    Route::put('/admin/legal-cases/{legalCase}', [LegalCaseController::class, 'update'])
        ->name('admin.cases.update');

    Route::delete('/admin/legal-cases/{legalCase}', [LegalCaseController::class, 'destroy'])
        ->name('admin.cases.destroy');
    
    Route::get('/admin/users', [UserController::class, 'index'])
        ->name('admin.users.index');

    Route::get('/admin/users/{user}', [UserController::class, 'show'])
        ->name('admin.users.show');

    Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])
        ->name('admin.users.edit');

    Route::put('/admin/users/{user}', [UserController::class, 'update'])
        ->name('admin.users.update');

});

Route::middleware(['auth', 'role:lawyer'])->group(function () {
    Route::get('/lawyer/dashboard', [LawyerDashboardController::class, 'index'])
        ->name('lawyer.dashboard');

    Route::get('/lawyer/profile', [LawyerProfileController::class, 'edit'])
        ->name('lawyer.profile.edit');

    Route::post('/lawyer/profile', [LawyerProfileController::class, 'update'])
        ->name('lawyer.profile.update');

    Route::get('/lawyer/requests', [RequestController::class, 'index'])
        ->name('lawyer.requests');

    Route::patch('/lawyer/requests/{caseRequest}/accept', [RequestController::class, 'accept'])
        ->name('requests.accept');

    Route::patch('/lawyer/requests/{caseRequest}/reject', [RequestController::class, 'reject'])
        ->name('requests.reject');

    Route::get('/lawyer/requests/{caseRequest}', [RequestController::class,'show'])
        ->name('lawyer.requests.show');

    Route::get('/lawyer/cases', [LawyerLegalCaseController::class, 'index'])
        ->name('lawyer.cases');

    Route::get('/lawyer/cases/{legalCase}', [LawyerLegalCaseController::class, 'show'])
        ->name('lawyer.cases.show');

    Route::get('/lawyer/cases/{legalCase}/edit', [LawyerLegalCaseController::class, 'edit'])
        ->name('lawyer.cases.edit');

    Route::put('/lawyer/cases/{legalCase}', [LawyerLegalCaseController::class, 'update'])
        ->name('lawyer.cases.update');
});

Route::middleware(['auth', 'role:client'])->group(function () {
    Route::get('/client/dashboard', [ClientDashboardController::class, 'index'])
        ->name('client.dashboard');
    
    Route::get('/request-case/{lawyer}', [CaseRequestController::class, 'create'])
        ->name('requests.create');

    Route::post('/request-case', [CaseRequestController::class, 'store'])
        ->name('requests.store');

    Route::get('/client/requests', [CaseRequestController::class, 'index'])
        ->name('client.requests');

    Route::get('/client/requests/{caseRequest}', [CaseRequestController::class,'show'])
        ->name('client.requests.show');

    Route::get('/client/requests/{caseRequest}/edit', [CaseRequestController::class, 'edit'])
        ->name('client.requests.edit');

    Route::put('/client/requests/{caseRequest}', [CaseRequestController::class, 'update'])
        ->name('client.requests.update');

    Route::delete('/client/requests/{caseRequest}', [CaseRequestController::class, 'destroy'])
        ->name('client.requests.destroy');

    Route::get('/client/cases', [CaseRequestController::class, 'myCases'])
        ->name('client.cases');

    Route::get('/client/cases/{legalCase}', [CaseRequestController::class, 'caseDetails'])
        ->name('client.cases.show');
});

Route::middleware(['auth', 'role:court_clerk'])->group(function () {

    Route::get('/court-clerk/dashboard', [CourtClerkDashboardController::class, 'index'])
        ->name('courtclerk.dashboard');

    Route::get('/court-clerk/filings', [CaseController::class,'index'])
        ->name('courtclerk.filings');

    Route::get('/court-clerk/filings/{legalCase}', [CaseController::class,'show'])
        ->name('courtclerk.filings.show');

    Route::put('/court-clerk/filings/{legalCase}', [CaseController::class,'verify'])
        ->name('courtclerk.filings.verify');

    Route::get('/court-clerk/hearings', function () {
        return 'Hearing Schedule';
    })->name('courtclerk.hearings');

    Route::get('/court-clerk/judgments', function () {
        return 'Judgments';
    })->name('courtclerk.judgments');

});

require __DIR__.'/auth.php';
