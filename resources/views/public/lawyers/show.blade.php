@extends('layouts.public')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="bg-white shadow rounded-lg p-8">

        <div class="flex gap-8">

            <div class="w-1/3 text-center">

                <img
                    src="https://placehold.co/250x250"
                    class="rounded-full mx-auto">

                <h2 class="text-3xl font-bold mt-5">
                    {{ $lawyer->user->name }}
                </h2>

                <p class="text-blue-600 mt-2">
                    {{ $lawyer->specialization }}
                </p>

                <p class="mt-3">
                    ⭐ {{ $lawyer->rating }}/5
                </p>

            </div>

            <div class="flex-1">

                <table class="w-full">

                    <tr>
                        <td class="font-bold py-2">Experience</td>
                        <td>{{ $lawyer->experience }} Years</td>
                    </tr>

                    <tr>
                        <td class="font-bold py-2">Qualification</td>
                        <td>{{ $lawyer->qualification }}</td>
                    </tr>

                    <tr>
                        <td class="font-bold py-2">Bar Council No.</td>
                        <td>{{ $lawyer->bar_council_no }}</td>
                    </tr>

                    <tr>
                        <td class="font-bold py-2">Consultation Fee</td>
                        <td>৳{{ number_format($lawyer->consultation_fee) }}</td>
                    </tr>

                    <tr>
                        <td class="font-bold py-2">City</td>
                        <td>{{ $lawyer->city }}</td>
                    </tr>

                    <tr>
                        <td class="font-bold py-2">Phone</td>
                        <td>{{ $lawyer->phone }}</td>
                    </tr>

                </table>

                <div class="mt-8">

                    <h3 class="text-xl font-bold mb-3">
                        Biography
                    </h3>

                    <p>
                        {{ $lawyer->bio }}
                    </p>

                </div>

                <div class="mt-8 flex gap-4">

                    <a href="#"
                       class="bg-blue-600 text-white px-6 py-3 rounded">

                        Request Case

                    </a>

                    <a href="#"
                       class="bg-green-600 text-white px-6 py-3 rounded">

                        Ask for Advice

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection