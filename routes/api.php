<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LegalCaseApiController;
use App\Http\Controllers\Api\CaseRequestApiController;

Route::get('/cases', [LegalCaseApiController::class,'index']);

Route::get('/cases/{legalCase}', [LegalCaseApiController::class,'show']);

Route::get('/requests', [CaseRequestApiController::class, 'index']);

Route::get('/requests/{caseRequest}', [CaseRequestApiController::class, 'show']);