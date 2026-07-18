@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Hearing Schedule
</h1>

<table class="min-w-full bg-white shadow rounded">

    <thead class="bg-gray-100">

        <tr>
            <th class="p-3">Case</th>
            <th class="p-3">Client</th>
            <th class="p-3">Lawyer</th>
            <th class="p-3">Date</th>
            <th class="p-3">Time</th>
            <th class="p-3">Court</th>
            <th class="p-3">Action</th>
        </tr>

    </thead>

    <tbody>

    @forelse($cases as $case)

        <tr class="border-t">

            <td class="p-3">{{ $case->title }}</td>

            <td class="p-3">{{ $case->client->name }}</td>

            <td class="p-3">{{ $case->lawyer->name }}</td>

            <td class="p-3">{{ $case->hearing_date }}</td>

            <td class="p-3">{{ $case->hearing_time }}</td>

            <td class="p-3">{{ $case->court_name }}</td>

            <td class="p-3">

                <a href="{{ route('court_clerk.hearing.result',$case) }}"
                   class="bg-blue-600 text-white px-3 py-2 rounded">
                    Record Result
                </a>

            </td>

        </tr>

    @empty

        <tr>
            <td colspan="7" class="text-center p-5">
                No hearings scheduled.
            </td>
        </tr>

    @endforelse

    </tbody>

</table>

@endsection