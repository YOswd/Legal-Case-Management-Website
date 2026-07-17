<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LegalCaseApiController;

Route::get('/cases', [LegalCaseApiController::class,'index']);

Route::get('/cases/{legalCase}', [LegalCaseApiController::class,'show']);