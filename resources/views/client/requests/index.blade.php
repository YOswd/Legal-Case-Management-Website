@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    My Case Requests
</h1>

@if(session('success'))
    <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<table class="w-full border border-gray-300">

    <thead class="bg-gray-200">
        <tr>
            <th class="border p-2">Lawyer</th>
            <th class="border p-2">Title</th>
            <th class="border p-2">Budget</th>
            <th class="border p-2">Status</th>
        </tr>
    </thead>

    <tbody>

    @forelse($requests as $request)

        <tr>
            <td class="border p-2">
                {{ $request->lawyer->name }}
            </td>
            <td class="border p-2">
                {{ $request->title }}
            </td>
            <td class="border p-2">
                {{ $request->budget ? '৳'.number_format($request->budget) : 'N/A' }}
            </td>
            <td class="border p-2">
                {{ $request->status }}
            </td>
        </tr>

    @empty

        <tr>
            <td colspan="4" class="border p-4 text-center">
                You haven't submitted any case requests yet.
            </td>
        </tr>

    @endforelse

    </tbody>
</table>

@endsection