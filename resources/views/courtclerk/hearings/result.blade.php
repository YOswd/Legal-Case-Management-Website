@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto bg-white shadow rounded-lg p-8">

    <h1 class="text-3xl font-bold mb-6">
        Hearing Result
    </h1>

    <div class="mb-6">
        <p><strong>Case Number:</strong> {{ $legalCase->case_number }}</p>
        <p><strong>Title:</strong> {{ $legalCase->title }}</p>
        <p><strong>Client:</strong> {{ $legalCase->client->name }}</p>
    </div>

    <form method="POST"
          action="{{ route('court_clerk.hearing.save', $legalCase) }}">

        @csrf
        @method('PUT')

        <div class="mb-5">
            <label class="block font-semibold mb-2">
                Hearing Status
            </label>

            <select
                name="hearing_status"
                class="w-full border rounded p-3"
                required>

                <option value="Completed">Completed</option>
                <option value="Adjourned">Adjourned</option>
                <option value="Postponed">Postponed</option>

            </select>
        </div>

        <div class="mb-5">

            <label class="block font-semibold mb-2">
                Hearing Result
            </label>

            <textarea
                name="hearing_result"
                rows="5"
                class="w-full border rounded p-3"></textarea>

        </div>

        <div class="mb-5">

            <label class="block font-semibold mb-2">
                Next Hearing Date (optional)
            </label>

            <input
                type="date"
                name="next_hearing_date"
                class="w-full border rounded p-3">

        </div>

        <button
            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded">

            Save Result

        </button>

    </form>

</div>

@endsection