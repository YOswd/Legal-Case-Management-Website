<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;

class UserApiController extends Controller
{
    public function index()
    {
        return response()->json(
            User::all()
        );
    }

    public function show(User $user)
    {
        return response()->json($user);
    }
}