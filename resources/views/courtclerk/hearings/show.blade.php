@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto bg-white rounded-lg shadow p-8">

<h2 class="text-3xl font-bold mb-6">

Schedule Hearing

</h2>

<p><strong>Case Number:</strong> {{ $legalCase->case_number }}</p>

<p><strong>Client:</strong> {{ $legalCase->client->name }}</p>

<p><strong>Lawyer:</strong> {{ $legalCase->lawyer->name }}</p>

<form method="POST"
action="{{ route('court_clerk.hearings.schedule',$legalCase) }}">

@csrf
@method('PUT')

<div class="mt-5">

<label>Hearing Date</label>

<input
type="date"
name="hearing_date"
class="w-full border rounded p-3"
required>

</div>

<div class="mt-5">

<label>Hearing Time</label>

<input
type="time"
name="hearing_time"
class="w-full border rounded p-3"
required>

</div>

<div class="mt-5">

<label>Court Name</label>

<input
type="text"
name="court_name"
class="w-full border rounded p-3"
value="{{ $legalCase->court_name }}"
required>

</div>

<div class="mt-5">

<label>Court Level</label>

<select
name="court_level"
class="w-full border rounded p-3">

<option>District Court</option>

<option>High Court</option>

<option>Supreme Court</option>

</select>

</div>

<button
class="mt-6 bg-indigo-600 text-white px-6 py-3 rounded">

Schedule Hearing

</button>

</form>

</div>

@endsection