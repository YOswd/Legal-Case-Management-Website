<?php

namespace App\Http\Controllers\Api;

use App\Models\CaseRequest;
use App\Http\Controllers\Controller;

class CaseRequestApiController extends Controller
{
    public function index()
    {
        return response()->json(

            CaseRequest::with([
                'client',
                'lawyer'
            ])->get()

        );
    }

    public function show(CaseRequest $caseRequest)
    {
        return response()->json(

            $caseRequest->load([
                'client',
                'lawyer'
            ])

        );
    }
}