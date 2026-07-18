@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    Court Clerk Dashboard
</h1>

<div class="grid grid-cols-1 md:grid-cols-4 gap-6">

<div class="bg-white p-6 rounded shadow">
    <h3 class="text-gray-500">
        Pending Filings
    </h3>

    <p class="text-3xl font-bold">
        {{ $pendingFilings }}
    </p>
</div>

<div class="bg-white p-6 rounded shadow">
    <h3 class="text-gray-500">
        Active Cases
    </h3>

    <p class="text-3xl font-bold">
        {{ $activeCases }}
    </p>
</div>

<div class="bg-white p-6 rounded shadow">
    <h3 class="text-gray-500">
        Upcoming Hearings
    </h3>

    <p class="text-3xl font-bold">
        {{ $upcomingHearings }}
    </p>
</div>

<div class="bg-white p-6 rounded shadow">
    <h3 class="text-gray-500">
        Resolved Cases
    </h3>

    <p class="text-3xl font-bold">
        {{ $resolvedCases }}
    </p>
</div>

</div>

@endsection