@extends('layouts.app')

@section('content')

<h2 class="text-3xl font-bold mb-6">
    Legal Cases
</h2>

@if(session('success'))
    <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('cases.create') }}"
   class="bg-blue-600 text-white px-4 py-2 rounded">
    Create New Case
</a>

<table class="w-full mt-6 border border-gray-300">

    <thead class="bg-gray-200">
        <tr>
            <th class="border p-2">Case No</th>
            <th class="border p-2">Title</th>
            <th class="border p-2">Type</th>
            <th class="border p-2">Priority</th>
            <th class="border p-2">Status</th>
        </tr>
    </thead>

    <tbody>

    @forelse($cases as $case)

        <tr>
            <td class="border p-2">{{ $case->case_number }}</td>
            <td class="border p-2">{{ $case->title }}</td>
            <td class="border p-2">{{ $case->case_type }}</td>
            <td class="border p-2">{{ $case->priority }}</td>
            <td class="border p-2">{{ $case->status }}</td>
        </tr>

    @empty

        <tr>
            <td colspan="5" class="border p-4 text-center">
                No legal cases found.
            </td>
        </tr>

    @endforelse

    </tbody>

</table>

@endsection