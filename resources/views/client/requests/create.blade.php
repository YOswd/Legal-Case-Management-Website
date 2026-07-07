@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto">

    <h1 class="text-3xl font-bold mb-6">

        Request Case

    </h1>

    <div class="bg-white shadow rounded-lg p-6">

        <p class="mb-6">

            Requesting Lawyer:

            <strong>{{ $lawyer->name }}</strong>

        </p>

        <form method="POST" action="{{ route('requests.store') }}">

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

            <button
                class="bg-blue-600 text-white px-6 py-3 rounded">

                Send Request

            </button>

        </form>

    </div>

</div>

@endsection