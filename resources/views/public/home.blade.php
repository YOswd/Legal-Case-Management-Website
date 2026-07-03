@extends('layouts.public')

@section('content')

<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-700 to-indigo-800 text-white">

    <div class="max-w-7xl mx-auto px-6 py-24">

        <div class="grid md:grid-cols-2 gap-12 items-center">

            <div>

                <h1 class="text-5xl font-extrabold leading-tight">

                    Find Trusted Lawyers <br>

                    Across Bangladesh

                </h1>

                <p class="mt-6 text-xl text-gray-200">

                    Connect with verified lawyers for legal cases,
                    consultation and professional legal advice.

                </p>

                <div class="mt-10 flex gap-4">

                    <a href="{{ route('lawyers.index') }}"
                       class="bg-white text-blue-700 px-6 py-3 rounded-lg font-semibold">

                        Browse Lawyers

                    </a>

                    <a href="{{ route('register') }}"
                       class="border border-white px-6 py-3 rounded-lg">

                        Get Started

                    </a>

                </div>

            </div>

            <div>

                <img
                    src="https://placehold.co/600x450"
                    class="rounded-xl shadow-2xl">

            </div>

        </div>

    </div>

</section>

<!-- Statistics -->

<section class="py-20 bg-white">

    <div class="max-w-6xl mx-auto">

        <div class="grid md:grid-cols-4 gap-8 text-center">

            <div>

                <h2 class="text-5xl font-bold text-blue-700">

                    {{ $lawyerCount }}+

                </h2>

                <p class="mt-2 text-gray-600">

                    Verified Lawyers

                </p>

            </div>

            <div>

                <h2 class="text-5xl font-bold text-blue-700">

                    {{ $clientCount }}+

                </h2>

                <p class="mt-2 text-gray-600">

                    Registered Clients

                </p>

            </div>

            <div>

                <h2 class="text-5xl font-bold text-blue-700">

                    {{ $caseCount }}+

                </h2>

                <p class="mt-2 text-gray-600">

                    Cases Submitted

                </p>

            </div>

            <div>

                <h2 class="text-5xl font-bold text-blue-700">

                    24/7

                </h2>

                <p class="mt-2 text-gray-600">

                    Legal Support

                </p>

            </div>

        </div>

    </div>

</section>

<section class="py-20 bg-gray-100">

    <div class="max-w-7xl mx-auto">

        <h2 class="text-4xl font-bold text-center mb-12">

            Featured Lawyers

        </h2>

        <div class="grid md:grid-cols-4 gap-8">

            @foreach($featuredLawyers as $lawyer)

            <div class="bg-white rounded-xl shadow p-6 text-center">

                <img
                    src="https://placehold.co/150"
                    class="rounded-full mx-auto mb-4">

                <h3 class="text-xl font-bold">

                    {{ $lawyer->user->name }}

                </h3>

                <p class="text-blue-600">

                    {{ $lawyer->specialization }}

                </p>

                <p class="mt-2">

                    {{ $lawyer->experience }} Years Experience

                </p>

                <a href="{{ route('lawyers.show',$lawyer->id) }}"
                   class="inline-block mt-5 bg-blue-600 text-white px-4 py-2 rounded">

                    View Profile

                </a>

            </div>

            @endforeach

        </div>

    </div>

</section>

<section class="py-20 bg-white">

    <div class="max-w-7xl mx-auto px-6">

        <h2 class="text-4xl font-bold text-center mb-12">
            Practice Areas
        </h2>

        <div class="grid md:grid-cols-3 gap-6 text-center">

            <div class="p-6 border rounded-lg">
                <h3 class="text-xl font-bold">Civil Law</h3>
                <p class="text-gray-600 mt-2">Property disputes, contracts, damages</p>
            </div>

            <div class="p-6 border rounded-lg">
                <h3 class="text-xl font-bold">Criminal Law</h3>
                <p class="text-gray-600 mt-2">Criminal defense and prosecution cases</p>
            </div>

            <div class="p-6 border rounded-lg">
                <h3 class="text-xl font-bold">Family Law</h3>
                <p class="text-gray-600 mt-2">Divorce, custody, marriage issues</p>
            </div>

        </div>

    </div>

</section>

<section class="py-20 bg-gray-100">

    <div class="max-w-7xl mx-auto px-6">

        <h2 class="text-4xl font-bold text-center mb-12">
            How It Works
        </h2>

        <div class="grid md:grid-cols-4 gap-6 text-center">

            <div>
                <div class="text-3xl">1️⃣</div>
                <h3 class="font-bold mt-2">Find Lawyer</h3>
            </div>

            <div>
                <div class="text-3xl">2️⃣</div>
                <h3 class="font-bold mt-2">Send Case</h3>
            </div>

            <div>
                <div class="text-3xl">3️⃣</div>
                <h3 class="font-bold mt-2">Discuss Fees</h3>
            </div>

            <div>
                <div class="text-3xl">4️⃣</div>
                <h3 class="font-bold mt-2">Get Legal Help</h3>
            </div>

        </div>

    </div>

</section>

<section class="py-20 bg-blue-700 text-white text-center">

    <h2 class="text-4xl font-bold">
        Need Legal Advice?
    </h2>

    <p class="mt-4 text-lg">
        Connect with verified lawyers today.
    </p>

    <a href="{{ route('lawyers.index') }}"
       class="mt-6 inline-block bg-white text-blue-700 px-6 py-3 rounded-lg font-semibold">

        Browse Lawyers

    </a>

</section>

@endsection