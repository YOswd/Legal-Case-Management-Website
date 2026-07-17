@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-6">
Pending Court Filings
</h1>

<table class="min-w-full bg-white rounded shadow">

    <thead class="bg-gray-800 text-white">

    <tr>

        <th class="p-3">Case No.</th>
        <th class="p-3">Client</th>
        <th class="p-3">Lawyer</th>
        <th class="p-3">Title</th>
        <th class="p-3">Status</th>
        <th class="p-3">Action</th>

    </tr>

    </thead>

    <tbody>

    @foreach($cases as $case)

    <tr class="border-b">

        <td class="p-3">
            {{ $case->case_number }}
        </td>
        <td class="p-3">
            {{ $case->client->name }}
        </td>
        <td class="p-3">
            {{ $case->lawyer->name }}
        </td>
        <td class="p-3">
            {{ $case->title }}
        </td>
        <td class="p-3">
            {{ $case->status }}
        </td>
        <td class="p-3">
            <a href="#" class="bg-blue-600 text-white px-3 py-2 rounded">
                Review
            </a>
        </td>

    </tr>

    @endforeach

    </tbody>

</table>

@endsection