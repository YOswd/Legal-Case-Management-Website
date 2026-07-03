@extends('layouts.app')

@section('content')

<h2 class="text-3xl font-bold mb-8">

    Client Dashboard

</h2>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-gray-500">My Cases</h3>
        <p class="text-3xl font-bold mt-2">0</p>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-gray-500">Pending</h3>
        <p class="text-3xl font-bold mt-2">0</p>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-gray-500">In Progress</h3>
        <p class="text-3xl font-bold mt-2">0</p>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-gray-500">Resolved</h3>
        <p class="text-3xl font-bold mt-2">0</p>
    </div>

</div>

@endsection