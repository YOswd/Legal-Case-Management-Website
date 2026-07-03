@extends('layouts.app')

@section('content')

<h2 class="text-3xl font-bold mb-6">
    Edit Legal Case
</h2>

<form action="{{ route('cases.update', $case->id) }}" method="POST">

    @csrf
    @method('PUT')

    <div class="mb-4">
        <label>Title</label>
        <input type="text"
               name="title"
               value="{{ old('title', $case->title) }}"
               class="border rounded w-full p-2">
    </div>

    <div class="mb-4">
        <label>Description</label>
        <textarea name="description"
                  class="border rounded w-full p-2">{{ old('description', $case->description) }}</textarea>
    </div>

    <div class="mb-4">
        <label>Case Type</label>

        <select name="case_type" class="border rounded w-full p-2">

            <option value="Civil" {{ $case->case_type=='Civil' ? 'selected' : '' }}>Civil</option>
            <option value="Criminal" {{ $case->case_type=='Criminal' ? 'selected' : '' }}>Criminal</option>
            <option value="Family" {{ $case->case_type=='Family' ? 'selected' : '' }}>Family</option>
            <option value="Property" {{ $case->case_type=='Property' ? 'selected' : '' }}>Property</option>

        </select>

    </div>

    <div class="mb-4">
        <label>Priority</label>

        <select name="priority" class="border rounded w-full p-2">

            <option value="Low" {{ $case->priority=='Low' ? 'selected' : '' }}>Low</option>
            <option value="Medium" {{ $case->priority=='Medium' ? 'selected' : '' }}>Medium</option>
            <option value="High" {{ $case->priority=='High' ? 'selected' : '' }}>High</option>

        </select>

    </div>

    <div class="mb-4">
        <label>Status</label>

        <select name="status" class="border rounded w-full p-2">

            <option value="Pending" {{ $case->status=='Pending' ? 'selected' : '' }}>Pending</option>
            <option value="In Progress" {{ $case->status=='In Progress' ? 'selected' : '' }}>In Progress</option>
            <option value="Resolved" {{ $case->status=='Resolved' ? 'selected' : '' }}>Resolved</option>
            <option value="Closed" {{ $case->status=='Closed' ? 'selected' : '' }}>Closed</option>

        </select>

    </div>

    <div class="mb-4">
        <label>Filing Date</label>

        <input type="date"
               name="filing_date"
               value="{{ $case->filing_date }}"
               class="border rounded w-full p-2">
    </div>

    <div class="mb-4">
        <label>Court Name</label>

        <input type="text"
               name="court_name"
               value="{{ $case->court_name }}"
               class="border rounded w-full p-2">
    </div>

    <button class="bg-green-600 text-white px-5 py-2 rounded">
        Update Case
    </button>

</form>

@endsection