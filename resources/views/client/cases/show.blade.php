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
                            Pending
                        </span>
                    @elseif($legalCase->status=='In Progress')
                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded">
                            In Progress
                        </span>
                    @elseif($legalCase->status=='Resolved')
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded">
                            Resolved
                        </span>
                    @else
                        <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded">
                            Closed
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

    </div>

</div>

@endsection