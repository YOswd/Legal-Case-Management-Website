@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto bg-white shadow rounded-lg p-8">

    <h1 class="text-3xl font-bold mb-6">
        Legal Case Details
    </h1>

    <table class="w-full">

        <tr>
            <td class="font-bold w-48 py-2">Case Number</td>
            <td>{{ $case->case_number }}</td>
        </tr>

        <tr>
            <td class="font-bold py-2">Client</td>
            <td>{{ $case->client->name }}</td>
        </tr>

        <tr>
            <td class="font-bold py-2">Lawyer</td>
            <td>{{ $case->lawyer?->name ?? 'Not Assigned' }}</td>
        </tr>

        <tr>
            <td class="font-bold py-2">Title</td>
            <td>{{ $case->title }}</td>
        </tr>

        <tr>
            <td class="font-bold py-2">Case Type</td>
            <td>{{ $case->case_type }}</td>
        </tr>

        <tr>
            <td class="font-bold py-2">Priority</td>
            <td>{{ $case->priority }}</td>
        </tr>

        <tr>
            <td class="font-bold py-2">Status</td>
            <td>{{ $case->status }}</td>
        </tr>

        <tr>
            <td class="font-bold py-2">Court</td>
            <td>{{ $case->court_name }}</td>
        </tr>

    </table>

    <div class="mt-8">
        <h2 class="font-bold text-xl mb-2">Description</h2>

        <div class="bg-gray-100 rounded p-5">
            {{ $case->description }}
        </div>
    </div>

    <div class="mt-8">
        <h2 class="font-bold text-xl mb-3">Documents</h2>

        @forelse($case->documents as $document)

            <div class="border rounded p-3 mb-2 flex justify-between">

                <div>
                    <strong>{{ $document->title }}</strong><br>
                    {{ $document->document_type }}
                </div>

            </div>

        @empty

            <p>No documents uploaded.</p>

        @endforelse

    </div>

</div>

@endsection