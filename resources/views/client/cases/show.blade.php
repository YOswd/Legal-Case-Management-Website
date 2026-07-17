@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="bg-white shadow rounded-lg p-8">

        <h1 class="text-3xl font-bold mb-8">
            My Legal Case
        </h1>

        <table class="w-full">
            <tr>
                <td class="font-bold py-2 w-1/3">Case Number</td>
                <td>{{ $legalCase->case_number }}</td>
            </tr>
            <tr>
                <td class="font-bold py-2">Lawyer</td>
                <td>{{ $legalCase->lawyer->name }}</td>
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
                <td>
                    @if($legalCase->status=='Pending')
                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded">
                            Pending Verification
                        </span>
                    @elseif($legalCase->status=='In Progress')
                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded">
                            Hearing Scheduled
                        </span>
                    @elseif($legalCase->status=='Resolved')
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded">
                            Judgment Published
                        </span>
                    @else
                        <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded">
                            {{ $legalCase->status }}
                        </span>
                    @endif
                </td>
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

    @if($legalCase->status == 'Resolved' && !$legalCase->appealed)

    <a href="{{ route('client.cases.appeal',$legalCase) }}"
    class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded">
        Appeal to Higher Court
    </a>

    @endif

    @if($legalCase->appealed)

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

    @endif

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

    </div>

</div>

@endsection