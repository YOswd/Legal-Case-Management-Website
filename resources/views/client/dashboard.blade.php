@extends('layouts.app')

@section('content')

<h2 class="text-3xl font-bold mb-8">
    Client Dashboard
</h2>


<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">

    <div class="bg-white rounded-lg shadow p-6">

        <h3 class="text-gray-500">
            Total Cases
        </h3>

        <p class="text-3xl font-bold mt-2">
            {{ $totalCases }}
        </p>

    </div>

    <div class="bg-white rounded-lg shadow p-6">

        <h3 class="text-gray-500">
            Active Cases
        </h3>

        <p class="text-3xl font-bold mt-2">
            {{ $activeCases }}
        </p>

    </div>

    <div class="bg-white rounded-lg shadow p-6">

        <h3 class="text-gray-500">
            Resolved Cases
        </h3>

        <p class="text-3xl font-bold mt-2">
            {{ $resolvedCases }}
        </p>

    </div>

    <div class="bg-white rounded-lg shadow p-6">

        <h3 class="text-gray-500">
            Pending Requests
        </h3>

        <p class="text-3xl font-bold mt-2">
            {{ $pendingRequests }}
        </p>

    </div>

    <div class="p-5 bg-white rounded shadow">

    <h3>My Documents</h3>

    <p class="text-3xl">
        {{ $myDocuments }}
    </p>

    </div>

</div>


@endsection