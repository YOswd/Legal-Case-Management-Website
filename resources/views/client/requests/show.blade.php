@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="bg-white shadow rounded-lg p-8">

        <h1 class="text-3xl font-bold mb-8">
            My Case Request
        </h1>

        <table class="w-full">

            <tr>
                <td class="font-semibold py-2">Lawyer</td>
                <td>{{ $caseRequest->lawyer->name }}</td>
            </tr>

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

        </table>

        <div class="mt-8">

            <h2 class="text-xl font-bold mb-3">
                Description
            </h2>

            <div class="bg-gray-100 rounded p-5">
                {{ $caseRequest->description }}
            </div>

        </div>

    </div>

</div>

@endsection