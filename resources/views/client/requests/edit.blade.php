@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto">

    <h1 class="text-3xl font-bold mb-6">

        Request Case

    </h1>

    <div class="bg-white shadow rounded-lg p-6">

        <p class="mb-6">

            Requesting Lawyer:

            <strong>{{ $caseRequest->lawyer->name }}</strong>

        </p>

        <form method="POST" action="{{ route('client.requests.update', $caseRequest) }}">

            @csrf
            @method('PUT')

            <input
                type="hidden"
                name="lawyer_id"
                value="{{ $caseRequest->lawyer_id }}">

            <div class="mb-5">

                <label>Case Title</label>

                <input
                    type="text"
                    name="title"
                    class="w-full border rounded p-2"
                    value="{{ old('title', $caseRequest->title) }}">

            </div>

            <div class="mb-5">

                <label>Description</label>

                <textarea
                    name="description"
                    rows="6"
                    class="w-full border rounded p-2">
                    {{ old('description', $caseRequest->description) }}
                </textarea>

            </div>

            <div class="mb-5">

                <label>Estimated Budget (Optional)</label>

                <input
                    type="number"
                    name="budget"
                    class="w-full border rounded p-2"
                    value="{{ old('budget', $caseRequest->budget) }}">

            </div>

            <h3 class="font-semibold mt-6 mb-3">
    Uploaded Documents
</h3>

@if($caseRequest->documents->count())

    <ul class="mb-4">

        @foreach($caseRequest->documents as $document)

            <li class="mb-2">

                <a href="{{ route('client.documents.download', $document) }}"
                   class="text-blue-600 underline">

                    {{ $document->title }}.{{ $document->document_type }}

                </a>

            </li>

        @endforeach

    </ul>

@else

    <p class="text-gray-500 mb-4">
        No documents uploaded.
    </p>

@endif

<div class="mb-5">

    <label>Add More Supporting Documents</label>

    <input
        type="file"
        name="documents[]"
        multiple
        class="w-full border rounded p-2">

</div>

            <button
                class="bg-blue-600 text-white px-6 py-3 rounded">

                Send Request

            </button>

        </form>

    </div>

</div>

@endsection