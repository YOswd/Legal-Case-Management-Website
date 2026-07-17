@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-6">
Court Clerk Dashboard
</h1>

<div class="grid grid-cols-3 gap-6">

    <div class="bg-white shadow rounded-lg p-6">
        Pending Filings
    </div>

    <div class="bg-white shadow rounded-lg p-6">
        Hearing Schedule
    </div>

    <div class="bg-white shadow rounded-lg p-6">
        Judgments
    </div>

</div>

@endsection