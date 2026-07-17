<?php

namespace App\Http\Controllers\Api;

use App\Models\LegalCase;
use App\Http\Controllers\Controller;

class LegalCaseApiController extends Controller
{
    public function index()
    {
        return response()->json(

            LegalCase::with([
                'client',
                'lawyer'
            ])->get()

        );
    }

    public function show(LegalCase $legalCase)
    {
        return response()->json(

            $legalCase->load([
                'client',
                'lawyer'
            ])

        );
    }
}