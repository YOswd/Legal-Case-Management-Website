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

        <button class="mt-8 bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded">
            Verify Filing
        </button>

        <a href="{{ route('court_clerk.hearings.form',$legalCase) }}"
        class="bg-blue-600 text-white px-5 py-2 rounded">
            Schedule Hearing
        </a>

    </form>

    <form
method="POST"
action="{{ route('documents.store',$legalCase) }}"
enctype="multipart/form-data">

@csrf

<input
type="text"
name="title"
placeholder="Document Title"
class="border rounded p-2 w-full mb-2">

<select
name="document_type"
class="border rounded p-2 w-full mb-2">

<option>Evidence</option>

<option>Legal Notice</option>

<option>Judgment</option>

<option>Other</option>

</select>

<input
type="file"
name="file"
class="mb-3">

<button
class="bg-green-600 text-white px-5 py-2 rounded">

Upload Document

</button>

</form>

<h3 class="text-xl font-bold mt-8">

Documents

</h3>

<table class="w-full mt-3">

<thead>

<tr>

<th>Title</th>

<th>Type</th>

<th>Download</th>

</tr>

</thead>

<tbody>

@foreach($legalCase->documents as $document)

<tr>

<td>{{ $document->title }}</td>

<td>{{ $document->document_type }}</td>

<td>

<a
href="{{ route('documents.download',$document) }}"
class="text-blue-600">

Download

</a>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

@endsection