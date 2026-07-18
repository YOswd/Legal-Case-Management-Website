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

        <!-- Description -->

        <div class="mt-8">

            <h2 class="text-xl font-bold mb-3">
                Description
            </h2>

            <div class="bg-gray-100 rounded p-5">
                {{ $legalCase->description }}
            </div>

        </div>

        <!-- Documents -->

        <div class="mt-10">

            <h2 class="text-xl font-bold mb-4">
                📄 Case Documents
            </h2>

            <form method="POST"
                  action="{{ route('lawyer.documents.store',$legalCase) }}"
                  enctype="multipart/form-data"
                  class="mb-8">

                @csrf

                <input
                    type="text"
                    name="title"
                    placeholder="Document Title"
                    class="border rounded p-2 w-full mb-3">

                <select
                    name="document_type"
                    class="border rounded p-2 w-full mb-3">

                    <option>Evidence</option>
                    <option>Legal Notice</option>
                    <option>Judgment</option>
                    <option>Other</option>

                </select>

                <input
                    type="file"
                    name="file"
                    class="mb-4">

                <button
                    class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded">

                    Upload Document

                </button>

            </form>

            <table class="w-full border">

                <thead class="bg-gray-100">

                    <tr>

                        <th class="border p-2 text-left">Title</th>
                        <th class="border p-2 text-left">Type</th>
                        <th class="border p-2 text-left">Download</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($legalCase->documents as $document)

                    <tr>

                        <td class="border p-2">
                            {{ $document->title }}
                        </td>

                        <td class="border p-2">
                            {{ $document->document_type }}
                        </td>

                        <td class="border p-2">

                            <a href="{{ route('lawyer.documents.download',$document) }}"
                               class="text-blue-600 hover:underline">

                                Download

                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="3"
                            class="border p-4 text-center text-gray-500">

                            No documents uploaded yet.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <!-- Appeal -->

        @if($legalCase->appealed)

        <div class="mt-10 bg-green-100 border border-green-300 rounded-lg p-6">

            <h2 class="text-xl font-bold mb-4">

                Appeal Submitted

            </h2>

            <p>

                <strong>Appeal Court:</strong>

                {{ $legalCase->appeal_court }}

            </p>

            <p class="mt-2">

                <strong>Appeal Date:</strong>

                {{ $legalCase->appeal_date }}

            </p>

        </div>

        @endif

        <!-- Court Information -->

        <div class="mt-10">

            <h2 class="text-xl font-bold mb-5">

                Court Information

            </h2>

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

        <div class="mt-10">

            <a href="{{ route('lawyer.cases.edit',$legalCase) }}"
               class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded">

                Edit Case

            </a>

        </div>

    </div>

</div>

@endsection