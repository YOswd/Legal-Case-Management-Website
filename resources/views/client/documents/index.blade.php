@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    Case Documents
</h1>

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 p-4 rounded mb-6">
        {{ session('success') }}
    </div>
@endif

{{-- Upload Form --}}
<div class="bg-white shadow rounded p-6 mb-8">

    <h2 class="text-xl font-semibold mb-4">
        Upload Supporting Document
    </h2>

    <form method="POST"
          action="{{ route('client.documents.store', $legalCase) }}"
          enctype="multipart/form-data">

        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <div>
                <label class="block mb-2 font-medium">
                    Document Title
                </label>

                <input type="text"
                       name="title"
                       class="w-full border rounded p-2"
                       required>
            </div>

            <div>
                <label class="block mb-2 font-medium">
                    Document Type
                </label>

                <select name="document_type"
                        class="w-full border rounded p-2"
                        required>
                    <option value="">Select</option>
                    <option>National ID</option>
                    <option>Passport</option>
                    <option>Contract</option>
                    <option>Property Document</option>
                    <option>Medical Report</option>
                    <option>Police Report</option>
                    <option>Photograph</option>
                    <option>Evidence</option>
                    <option>Other</option>
                </select>
            </div>

        </div>

        <div class="mt-4">

            <label class="block mb-2 font-medium">
                Choose File
            </label>

            <input type="file"
                   name="file"
                   class="w-full border rounded p-2"
                   required>

        </div>

        <button class="mt-6 bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded">
            Upload Document
        </button>

    </form>

</div>

{{-- Documents List --}}
<div class="bg-white shadow rounded p-6">

    <table class="w-full">

        <thead>
        <tr class="border-b">
            <th class="p-3 text-left">Title</th>
            <th class="p-3 text-left">Type</th>
            <th class="p-3 text-left">Action</th>
        </tr>
        </thead>

        <tbody>

        @forelse($documents as $document)

            <tr class="border-b">
                <td class="p-3">
                    {{ $document->title }}
                </td>
                <td class="p-3">
                    {{ $document->document_type }}
                </td>
                <td class="p-3">
                    <a href="{{ route('client.documents.download',$document) }}"
                       class="text-blue-600">
                        Download
                    </a>
                </td>
            </tr>

        @empty

            <tr>
                <td colspan="3" class="p-4 text-center">
                    No documents uploaded yet.
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection