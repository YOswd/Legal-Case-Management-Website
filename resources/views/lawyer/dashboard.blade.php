@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    👨‍⚖️ Lawyer Dashboard
</h1>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">

    <div class="bg-white rounded shadow p-6">
        <h3 class="text-gray-500">Total Cases</h3>
        <p class="text-3xl font-bold">{{ $totalCases }}</p>
    </div>

    <div class="bg-white rounded shadow p-6">
        <h3 class="text-gray-500">Pending Requests</h3>
        <p class="text-3xl font-bold">{{ $pendingRequests }}</p>
    </div>

    <div class="bg-white rounded shadow p-6">
        <h3 class="text-gray-500">Active Cases</h3>
        <p class="text-3xl font-bold">{{ $activeCases }}</p>
    </div>

    <div class="bg-white rounded shadow p-6">
        <h3 class="text-gray-500">Resolved Cases</h3>
        <p class="text-3xl font-bold">{{ $resolvedCases }}</p>
    </div>

    <div class="bg-white rounded shadow p-6">
        <h3 class="text-gray-500">Documents Uploaded</h3>
        <p class="text-3xl font-bold">{{ $documents }}</p>
    </div>

</div>

@endsection