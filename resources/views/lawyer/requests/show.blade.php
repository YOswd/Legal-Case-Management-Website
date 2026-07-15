@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="bg-white shadow rounded-lg p-8">

        <h1 class="text-3xl font-bold mb-8">
            Case Request Details
        </h1>

        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-3 rounded mb-5">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-2 gap-8">

            <div>

                <h2 class="text-xl font-bold mb-4">
                    Client Information
                </h2>

                <table class="w-full">

                    <tr>
                        <td class="font-semibold py-2">Name</td>
                        <td>{{ $caseRequest->client->name }}</td>
                    </tr>

                    <tr>
                        <td class="font-semibold py-2">Email</td>
                        <td>{{ $caseRequest->client->email }}</td>
                    </tr>

                </table>

            </div>

            <div>

                <h2 class="text-xl font-bold mb-4">
                    Request Information
                </h2>

                <table class="w-full">

                    <tr>
                        <td class="font-semibold py-2">Title</td>
                        <td>{{ $caseRequest->title }}</td>
                    </tr>

                    <tr>
                        <td class="font-semibold py-2">Budget</td>
                        <td>
                            {{ $caseRequest->budget ? '৳'.number_format($caseRequest->budget) : 'Not Specified' }}
                        </td>
                    </tr>

                    <tr>
                        <td class="font-semibold py-2">Status</td>
                        <td>{{ $caseRequest->status }}</td>
                    </tr>

                    <tr>
                        <td class="font-semibold py-2">Requested At</td>
                        <td>{{ $caseRequest->created_at->format('d M Y h:i A') }}</td>
                    </tr>

                </table>

            </div>

        </div>

        <div class="mt-10">

            <h2 class="text-xl font-bold mb-3">
                Case Description
            </h2>

            <div class="bg-gray-100 rounded p-5">
                {{ $caseRequest->description }}
            </div>

        </div>

        @if($caseRequest->status == 'Pending')

        <div class="mt-8 flex gap-4">

            <form method="POST" action="{{ route('requests.accept', $caseRequest) }}">

                @csrf
                @method('PATCH')

                <button class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded">
                    Accept Request
                </button>

            </form>

            <form method="POST" action="{{ route('requests.reject', $caseRequest) }}">

                @csrf
                @method('PATCH')

                <button class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded">
                    Reject Request
                </button>

            </form>

        </div>

        @endif

    </div>

</div>

@endsection