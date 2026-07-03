@extends('layouts.app')

@section('content')

<h1 class="text-4xl font-bold mb-8">
    Find a Lawyer
</h1>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

@forelse($lawyers as $lawyer)

<div class="bg-white rounded-lg shadow p-6">

    <div class="text-center">

        <img
            src="https://placehold.co/120x120"
            class="mx-auto rounded-full mb-4">

        <h2 class="text-xl font-bold">
            {{ $lawyer->user->name }}
        </h2>

        <p class="text-blue-600">
            {{ $lawyer->specialization }}
        </p>

        <p class="mt-2">
            {{ $lawyer->experience }} Years Experience
        </p>

        <p class="mt-2">
            Consultation Fee:
            <strong>
                ৳{{ number_format($lawyer->consultation_fee) }}
            </strong>
        </p>

        <a href="{{ route('lawyers.show', $lawyer->id) }}"
           class="block mt-5 bg-blue-600 text-white py-2 rounded">

            View Profile

        </a>

    </div>

</div>

@empty

<div>

    No lawyers available.

</div>

@endforelse

</div>

@endsection