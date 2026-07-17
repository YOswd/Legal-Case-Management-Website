@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto">

    <h1 class="text-3xl font-bold mb-6">All Legal Cases</h1>

    <form method="GET" class="mb-6 flex gap-3">

    <input
        type="text"
        name="search"
        placeholder="Search by case number or title..."
        value="{{ request('search') }}"
        class="border rounded p-2 w-96">

    <select name="status" class="border rounded p-2">
        <option value="">All Status</option>
        <option value="Pending">Pending</option>
        <option value="In Progress">In Progress</option>
        <option value="Resolved">Resolved</option>
        <option value="Closed">Closed</option>
    </select>

        <button class="bg-blue-600 text-white px-5 py-2 rounded">Search</button>

    </form>

    <div class="bg-white rounded-lg shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">

                <tr>
                    <th class="p-4 text-left">Case No.</th>
                    <th class="p-4 text-left">Client</th>
                    <th class="p-4 text-left">Lawyer</th>
                    <th class="p-4 text-left">Status</th>
                    <th class="p-4 text-left">Action</th>
                </tr>

            </thead>

            <tbody>

            @forelse($cases as $case)

                <tr class="border-t">

                    <td class="p-4">{{ $case->case_number }}</td>
                    <td class="p-4">{{ $case->client->name }}</td>
                    <td class="p-4">{{ $case->lawyer->name }}</td>
                    <td class="p-4">{{ $case->status }}</td>
                    <td class="p-4">
                        <a href="{{ route('admin.cases.show', $case) }}"
                           class="text-blue-600 hover:underline">
                            View
                        </a>
                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5" class="text-center p-6">
                        No legal cases found.
                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

    <div class="mt-6">

        {{ $cases->links() }}

    </div>

</div>

@endsection