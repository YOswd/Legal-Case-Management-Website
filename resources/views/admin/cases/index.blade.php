@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto">

    <h1 class="text-3xl font-bold mb-6">All Legal Cases</h1>

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