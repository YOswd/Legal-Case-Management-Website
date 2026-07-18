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
        <td>
    @if($case->status == 'Pending')
        <span class="bg-yellow-200 text-yellow-800 px-2 py-1 rounded">
            Pending
        </span>

    @elseif($case->status == 'In Progress')
        <span class="bg-blue-200 text-blue-800 px-2 py-1 rounded">
            In Progress
        </span>

    @elseif($case->status == 'Resolved')
        <span class="bg-green-200 text-green-800 px-2 py-1 rounded">
            Resolved
        </span>

    @endif
</td>
        <a href="{{ route('court_clerk.filings.show', $case) }}"
        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            Verify Filing
        </a>
        <a href="{{ route('court_clerk.documents', $case) }}"
   class="bg-blue-500 text-white px-3 py-1 rounded">
    Documents
</a>
    </tr>

    @endforeach

    </tbody>

</table>

@endsection