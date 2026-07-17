@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="bg-white shadow rounded-lg p-8">

        <h1 class="text-3xl font-bold mb-8">
            Legal Case Details
        </h1>

        <table class="w-full">
            <tr>
                <td class="font-bold py-2 w-1/3">Case Number</td>
                <td>{{ $legalCase->case_number }}</td>
            </tr>
            <tr>
                <td class="font-bold py-2">Client</td>
                <td>{{ $legalCase->client->name }}</td>
            </tr>
            <tr>
                <td class="font-bold py-2">Title</td>
                <td>{{ $legalCase->title }}</td>
            </tr>
            <tr>
                <td class="font-bold py-2">Case Type</td>
                <td>{{ $legalCase->case_type }}</td>
            </tr>
            <tr>
                <td class="font-bold py-2">Priority</td>
                <td>{{ $legalCase->priority }}</td>
            </tr>
            <tr>
                <td class="font-bold py-2">Status</td>
                <td>{{ $legalCase->status }}</td>
            </tr>
            <tr>
                <td class="font-bold py-2">Court Name</td>
                <td>{{ $legalCase->court_name }}</td>
            </tr>
            <tr>
                <td class="font-bold py-2">Filing Date</td>
                <td>{{ $legalCase->filing_date }}</td>
            </tr>
        </table>

        <div class="mt-8">
            <h2 class="text-xl font-bold mb-3">
                Description
            </h2>
            <div class="bg-gray-100 rounded p-5">
                {{ $legalCase->description }}
            </div>
        </div>

    <div class="bg-white rounded-lg shadow p-6 mt-6">

    <div class="mt-6 bg-green-100 border border-green-300 rounded p-5">

        <h3 class="font-bold text-lg mb-3">Appeal Submitted</h3>

        <p>
            <strong>Appeal Court:</strong>
            {{ $legalCase->appeal_court }}
        </p>

        <p>
            <strong>Appeal Date:</strong>
            {{ $legalCase->appeal_date }}
        </p>

   </div>

    <h3 class="text-xl font-bold mb-4">
        Court Information
    </h3>

    <div class="grid grid-cols-2 gap-6">

        <div>
            <strong>Court Level</strong>
            <p>{{ $legalCase->court_level ?? 'Not Assigned' }}</p>
        </div>

        <div>
            <strong>Court Name</strong>
            <p>{{ $legalCase->court_name }}</p>
        </div>

        <div>
            <strong>Hearing Date</strong>
            <p>{{ $legalCase->hearing_date ?? 'Not Scheduled' }}</p>
        </div>

        <div>
            <strong>Hearing Time</strong>
            <p>{{ $legalCase->hearing_time ?? 'Not Scheduled' }}</p>
        </div>

    </div>

</div>

        <div class="mt-8">
            <a href="{{ route('lawyer.cases.edit', $legalCase) }}"
               class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded">
                Edit Case
            </a>
        </div>

    </div>

</div>

@endsection