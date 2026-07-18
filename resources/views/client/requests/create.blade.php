@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto">

    <h1 class="text-3xl font-bold mb-6">Request Case</h1>

    <div class="bg-white shadow rounded-lg p-6">

        <p class="mb-6">
            Requesting Lawyer:
            <strong>{{ $lawyer->name }}</strong>
        </p>

        <form method="POST" action="{{ route('requests.store') }}" enctype="multipart/form-data">
            @csrf
            <input
                type="hidden"
                name="lawyer_id"
                value="{{ $lawyer->id }}">

            <div class="mb-5">

                <label>Case Title</label>

                <input
                    type="text"
                    name="title"
                    class="w-full border rounded p-2">

            </div>

            <div class="mb-5">

                <label>Description</label>

                <textarea
                    name="description"
                    rows="6"
                    class="w-full border rounded p-2"></textarea>

            </div>

            <div class="mb-5">

                <label>Estimated Budget (Optional)</label>

                <input
                    type="number"
                    name="budget"
                    class="w-full border rounded p-2">

            </div>

            <div class="mt-6">

                <label class="block font-medium mb-2">Supporting Documents</label>

                <input type="file" name="documents[]" multiple class="w-full border rounded p-2">

                <p class="text-sm text-gray-500 mt-2">
                    You may upload contracts, evidence, IDs, reports, photos, etc.
                </p>

           </div>

            <button
                class="bg-blue-600 text-white px-6 py-3 rounded">

                Send Request

            </button>

        </form>

    </div>

</div>

@endsection