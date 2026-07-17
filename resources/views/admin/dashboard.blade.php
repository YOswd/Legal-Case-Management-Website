@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto">

    <h1 class="text-3xl font-bold mb-8">Admin Dashboard</h1>

    <div class="grid grid-cols-3 gap-6">

        <div class="bg-blue-500 text-white rounded-lg p-6">
            <h2>Total Users</h2>
            <p class="text-4xl font-bold mt-4">
                {{ $totalUsers }}
            </p>
        </div>

        <div class="bg-green-500 text-white rounded-lg p-6">
            <h2>Total Lawyers</h2>
            <p class="text-4xl font-bold mt-4">
                {{ $totalLawyers }}
            </p>
        </div>

        <div class="bg-purple-500 text-white rounded-lg p-6">
            <h2>Total Clients</h2>
            <p class="text-4xl font-bold mt-4">
                {{ $totalClients }}
            </p>
        </div>

        <div class="bg-orange-500 text-white rounded-lg p-6">
            <h2>Total Cases</h2>
            <p class="text-4xl font-bold mt-4">
                {{ $totalCases }}
            </p>
        </div>

        <div class="bg-yellow-500 text-white rounded-lg p-6">
            <h2>Pending Cases</h2>
            <p class="text-4xl font-bold mt-4">
                {{ $pendingCases }}
            </p>
        </div>

        <div class="bg-red-500 text-white rounded-lg p-6">
            <h2>Resolved Cases</h2>
            <p class="text-4xl font-bold mt-4">
                {{ $resolvedCases }}
            </p>
        </div>

    </div>

</div>

@endsection