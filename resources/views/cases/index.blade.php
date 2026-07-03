@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-6">

    <h2 class="text-3xl font-bold">

        Legal Cases

    </h2>

    <a href="{{ route('cases.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded">

        + New Case

    </a>

</div>

<table class="w-full bg-white shadow rounded">

    <thead>

    <tr class="border-b">

        <th class="p-3">Case Number</th>
        <th>Title</th>
        <th>Status</th>
        <th>Priority</th>
        <th>Actions</th>

    </tr>

    </thead>

    <tbody>

    </tbody>

</table>

@endsection