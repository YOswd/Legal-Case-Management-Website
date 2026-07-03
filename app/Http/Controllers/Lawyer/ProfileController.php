<?php

namespace App\Http\Controllers\Lawyer;

use App\Http\Controllers\Controller;
use App\Models\LawyerProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
    $profile = LawyerProfile::where('user_id', Auth::id())->first();

    if (!$profile) {
        $profile = new LawyerProfile();
    }

    return view('lawyer.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = LawyerProfile::where('user_id', Auth::id())->first();

        $request->validate([
            'specialization' => 'required',
            'experience' => 'required|integer',
            'qualification' => 'required',
            'bar_council_no' => 'required',
            'consultation_fee' => 'required|integer',
            'bio' => 'nullable',
            'phone' => 'nullable',
            'address' => 'nullable',
            'city' => 'nullable',
        ]);

        $profile->update($request->all());

        return redirect()
            ->back()
            ->with('success', 'Profile updated successfully.');
    }
}