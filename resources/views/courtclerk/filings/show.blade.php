@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="bg-white rounded-lg shadow p-8">

        <h1 class="text-3xl font-bold mb-8">
            Verify Court Filing
        </h1>

        {{-- Case Information --}}

        <div class="grid grid-cols-2 gap-6 mb-10">

            <div>
                <p class="font-semibold">Client</p>
                <p>{{ $legalCase->client->name }}</p>
            </div>

            <div>
                <p class="font-semibold">Lawyer</p>
                <p>{{ $legalCase->lawyer->name }}</p>
            </div>

            <div>
                <p class="font-semibold">Case Number</p>
                <p>{{ $legalCase->case_number }}</p>
            </div>

            <div>
                <p class="font-semibold">Case Type</p>
                <p>{{ $legalCase->case_type }}</p>
            </div>

        </div>

        {{-- Documents --}}

        <h2 class="text-2xl font-bold mb-4">
            Submitted Documents
        </h2>

        <div class="border rounded-lg overflow-hidden mb-10">

            <table class="w-full">

                <thead class="bg-gray-100">

                    <tr>

                        <th class="p-3 text-left">Title</th>

                        <th class="p-3 text-left">Type</th>

                        <th class="p-3 text-left">Uploaded By</th>

                        <th class="p-3 text-left">Download</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($legalCase->documents as $document)

                    <tr class="border-t">

                        <td class="p-3">
                            {{ $document->title }}
                        </td>

                        <td class="p-3">
                            {{ $document->document_type }}
                        </td>

                        <td class="p-3">
                            {{ $document->uploader->name }}
                        </td>

                        <td class="p-3">

                            <a href="{{ route('court_clerk.documents.download',$document) }}"
                               class="text-blue-600 hover:underline">

                                Download

                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4"
                            class="text-center p-5 text-gray-500">

                            No documents uploaded.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        {{-- Verification Form --}}

        <h2 class="text-2xl font-bold mb-4">
            Court Assignment
        </h2>

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

                <input
                    type="text"
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

                    <input
                        type="date"
                        name="hearing_date"
                        class="w-full border rounded p-3"
                        required>

                </div>

                <div>

                    <label class="block font-semibold mb-2">
                        Hearing Time
                    </label>

                    <input
                        type="time"
                        name="hearing_time"
                        class="w-full border rounded p-3"
                        required>

                </div>

            </div>

            <div class="mt-8 flex gap-4">

                <button
                    class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded">

                    Verify Filing

                </button>

                <a href="{{ route('court_clerk.hearings.form',$legalCase) }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded">

                    Schedule Hearing

                </a>

            </div>

        </form>

    </div>

</div>

@endsection