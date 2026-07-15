@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto">

    <h1 class="text-3xl font-bold mb-6">
        My Legal Cases
    </h1>

    <div class="bg-white rounded-lg shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">
                <tr>
                    <th class="p-4 text-left">Case No.</th>
                    <th class="p-4 text-left">Client</th>
                    <th class="p-4 text-left">Title</th>
                    <th class="p-4 text-left">Status</th>
                    <th class="p-4 text-left">Action</th>
                </tr>
            </thead>

            <tbody>

            @forelse($cases as $case)

                <tr class="border-t">
                    <td class="p-4">
                        {{ $case->case_number }}
                    </td>
                    <td class="p-4">
                        {{ $case->client->name }}
                    </td>
                    <td class="p-4">
                        {{ $case->title }}
                    </td>
                    <td class="p-4">
                        <span class="px-3 py-1 rounded bg-blue-100 text-blue-700">
                            {{ $case->status }}
                        </span>
                    </td>

                    <td class="p-4">
                        <a href="{{ route('lawyer.cases.show',$case) }}"
                           class="text-blue-600 hover:underline">
                            View
                        </a>
                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="5" class="p-8 text-center text-gray-500">
                        No legal cases assigned.
                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection