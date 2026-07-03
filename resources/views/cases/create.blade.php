@extends('layouts.app')

@section('content')

<h2 class="text-3xl font-bold mb-6">
    Create New Legal Case
</h2>

<form action="{{ route('cases.store') }}" method="POST">

    @csrf

    <div class="mb-4">
        <label class="block font-semibold">Title</label>
        <input type="text"
               name="title"
               class="border rounded w-full p-2">
    </div>

    <div class="mb-4">
        <label class="block font-semibold">Description</label>
        <textarea
            name="description"
            rows="5"
            class="border rounded w-full p-2"></textarea>
    </div>

    <div class="mb-4">
        <label class="block font-semibold">Case Type</label>

        <select
            name="case_type"
            class="border rounded w-full p-2">

            <option>Civil</option>
            <option>Criminal</option>
            <option>Family</option>
            <option>Property</option>

        </select>

    </div>

    <div class="mb-4">

        <label class="block font-semibold">
            Priority
        </label>

        <select
            name="priority"
            class="border rounded w-full p-2">

            <option>Low</option>
            <option>Medium</option>
            <option>High</option>

        </select>

    </div>

    <div class="mb-4">

        <label class="block font-semibold">
            Court Name
        </label>

        <input
            type="text"
            name="court_name"
            class="border rounded w-full p-2">

    </div>

    <button
        class="bg-blue-600 text-white px-5 py-2 rounded">

        Save Case

    </button>

</form>

@endsection