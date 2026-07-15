@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="bg-white shadow rounded-lg p-8">

        <h1 class="text-3xl font-bold mb-8">
            Edit Legal Case
        </h1>

        <form method="POST" action="{{ route('lawyer.cases.update', $legalCase) }}">

            @csrf
            @method('PUT')

            {{-- Case Number --}}
            <div class="mb-5">
                <label class="font-semibold">Case Number</label>
                <input
                    type="text"
                    value="{{ $legalCase->case_number }}"
                    class="w-full border rounded p-2 bg-gray-100"
                    readonly>
            </div>

            {{-- Client --}}
            <div class="mb-5">
                <label class="font-semibold">Client</label>
                <input
                    type="text"
                    value="{{ $legalCase->client->name }}"
                    class="w-full border rounded p-2 bg-gray-100"
                    readonly>
            </div>

            {{-- Case Type --}}
            <div class="mb-5">
                <label class="font-semibold">Case Type</label>
                <select
                    name="case_type"
                    class="w-full border rounded p-2">
                    <option value="Civil" {{ $legalCase->case_type == 'Civil' ? 'selected' : '' }}>Civil</option>
                    <option value="Criminal" {{ $legalCase->case_type == 'Criminal' ? 'selected' : '' }}>Criminal</option>
                    <option value="Family" {{ $legalCase->case_type == 'Family' ? 'selected' : '' }}>Family</option>
                    <option value="Property" {{ $legalCase->case_type == 'Property' ? 'selected' : '' }}>Property</option>
                </select>
            </div>

            {{-- Priority --}}
            <div class="mb-5">
                <label class="font-semibold">Priority</label>
                <select name="priority" class="w-full border rounded p-2">
                    <option value="Low" {{ $legalCase->priority == 'Low' ? 'selected' : '' }}>Low</option>
                    <option value="Medium" {{ $legalCase->priority == 'Medium' ? 'selected' : '' }}>Medium</option>
                    <option value="High" {{ $legalCase->priority == 'High' ? 'selected' : '' }}>High</option>
                </select>
            </div>

            {{-- Status --}}
            <div class="mb-5">
                <label class="font-semibold">Status</label>
                <select name="status" class="w-full border rounded p-2">
                    <option value="Pending" {{ $legalCase->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="In Progress" {{ $legalCase->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="Resolved" {{ $legalCase->status == 'Resolved' ? 'selected' : '' }}>Resolved</option>
                    <option value="Closed" {{ $legalCase->status == 'Closed' ? 'selected' : '' }}>Closed</option>
                </select>
            </div>

            {{-- Court --}}
            <div class="mb-5">
                <label class="font-semibold">Court Name</label>
                <input
                    type="text"
                    name="court_name"
                    value="{{ $legalCase->court_name }}"
                    class="w-full border rounded p-2">
            </div>

            {{-- Filing Date --}}
            <div class="mb-8">
                <label class="font-semibold">Filing Date</label>
                <input
                    type="date"
                    name="filing_date"
                    value="{{ $legalCase->filing_date }}"
                    class="w-full border rounded p-2">
            </div>

            <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded">
                Update Case
            </button>

        </form>

    </div>

</div>

@endsection