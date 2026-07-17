@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto bg-white rounded-lg shadow p-8">

    <h2 class="text-3xl font-bold mb-6">
        Verify Court Filing
    </h2>

    <div class="grid grid-cols-2 gap-6 mb-8">

        <div>
            <label class="font-semibold">Client</label>
            <p>{{ $legalCase->client->name }}</p>
        </div>

        <div>
            <label class="font-semibold">Lawyer</label>
            <p>{{ $legalCase->lawyer->name }}</p>
        </div>

        <div>
            <label class="font-semibold">Case Number</label>
            <p>{{ $legalCase->case_number }}</p>
        </div>

        <div>
            <label class="font-semibold">Case Type</label>
            <p>{{ $legalCase->case_type }}</p>
        </div>

    </div>

    <form method="POST"
          action="{{ route('court_clerk.filings.verify',$legalCase) }}">

        @csrf
        @method('PUT')

        <div class="mb-5">

            <label class="block font-semibold mb-2">
                Court Level
            </label>

            <select name="court_level"
                    class="w-full border rounded p-3"
                    required>

                <option value="">Select Court</option>

                <option>District Court</option>

                <option>High Court</option>

                <option>Supreme Court</option>

            </select>

        </div>

        <div class="mb-5">

            <label class="block font-semibold mb-2">
                Court Name
            </label>

            <input type="text"
                   name="court_name"
                   value="{{ $legalCase->court_name }}"
                   class="w-full border rounded p-3"
                   required>

        </div>

        <div class="grid grid-cols-2 gap-6">

            <div>

                <label class="block font-semibold mb-2">
                    Hearing Date
                </label>

                <input type="date"
                       name="hearing_date"
                       class="w-full border rounded p-3"
                       required>

            </div>

            <div>

                <label class="block font-semibold mb-2">
                    Hearing Time
                </label>

                <input type="time"
                       name="hearing_time"
                       class="w-full border rounded p-3"
                       required>

            </div>

        </div>

        <button
            class="mt-8 bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded">

            Verify Filing

        </button>

    </form>

</div>

@endsection