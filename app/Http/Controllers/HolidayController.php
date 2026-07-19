<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class HolidayController extends Controller
{
    public function index()
    {
        $year = now()->year;

        $response = Http::get(
            "https://date.nager.at/api/v3/PublicHolidays/$year/BD"
        );

        $holidays = $response->json();

        return view('holidays.index', compact('holidays'));
    }
}