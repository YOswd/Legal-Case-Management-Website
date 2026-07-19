@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-6">National Holidays</h1>

<table class="w-full border">
    <thead>
        <tr>
            <th class="border p-2">Date</th>
            <th class="border p-2">Holiday</th>
        </tr>
    </thead>
    <tbody>
        @foreach($holidays as $holiday)
        <tr>
            <td class="border p-2">{{ $holiday['date'] }}</td>
            <td class="border p-2">{{ $holiday['localName'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection