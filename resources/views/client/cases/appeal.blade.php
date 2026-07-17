@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto bg-white rounded-lg shadow p-8">

    <h2 class="text-3xl font-bold mb-6">
        Appeal to Higher Court
    </h2>

    <div class="mb-8">

        <p><strong>Case Number:</strong> {{ $legalCase->case_number }}</p>

        <p><strong>Title:</strong> {{ $legalCase->title }}</p>

        <p><strong>Current Court:</strong> {{ $legalCase->court_name }}</p>

        <p><strong>Status:</strong> {{ $legalCase->status }}</p>

    </div>

    <form method="POST"
          action="{{ route('client.cases.appeal.store',$legalCase) }}">

        @csrf

        <label class="block font-semibold mb-2">

            Select Appeal Court

        </label>

        <select
            name="appeal_court"
            class="w-full border rounded p-3 mb-6"
            required>

            <option value="">Choose Court</option>

            <option>High Court</option>

            <option>Supreme Court</option>

        </select>

        <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded">
            Submit Appeal
        </button>

    </form>

</div>

@endsection