@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto">

    <h2 class="text-3xl font-bold mb-6">
        Create Legal Case
    </h2>

    <form action="{{ route('cases.store') }}" method="POST">

        @csrf

        <div class="mb-4">
            <label>Title</label>

            <input
                type="text"
                name="title"
                class="border rounded w-full p-2"
                value="{{ old('title') }}">
        </div>

        <div class="mb-4">
            <label>Description</label>

            <textarea
                name="description"
                class="border rounded w-full p-2">{{ old('description') }}</textarea>
        </div>

        <div class="mb-4">
            <label>Case Type</label>

            <select
                name="case_type"
                class="border rounded w-full p-2">

                <option value="Civil">Civil</option>
                <option value="Criminal">Criminal</option>
                <option value="Family">Family</option>
                <option value="Property">Property</option>

            </select>
        </div>

        <div class="mb-4">
            <label>Priority</label>

            <select
                name="priority"
                class="border rounded w-full p-2">

                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>

            </select>
        </div>

        <div class="mb-4">
            <label>Filing Date</label>

            <input
                type="date"
                name="filing_date"
                class="border rounded w-full p-2">
        </div>

        <div class="mb-4">
            <label>Court Name</label>

            <input
                type="text"
                name="court_name"
                class="border rounded w-full p-2">
        </div>

        <button class="bg-blue-600 text-white px-5 py-2 rounded">
            Save Case
        </button>

    </form>

</div>

@endsection