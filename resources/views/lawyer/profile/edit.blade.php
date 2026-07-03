@extends('layouts.app')

@section('content')

<h2 class="text-3xl font-bold mb-6">
    Lawyer Profile
</h2>

@if(session('success'))
    <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<form method="POST"
      action="{{ route('lawyer.profile.update') }}">

    @csrf

    <div class="mb-4">
        <label>Specialization</label>
        <input type="text"
               name="specialization"
               value="{{ $profile->specialization }}"
               class="border rounded w-full p-2">
    </div>

    <div class="mb-4">
        <label>Experience (Years)</label>
        <input type="number"
               name="experience"
               value="{{ $profile->experience }}"
               class="border rounded w-full p-2">
    </div>

    <div class="mb-4">
        <label>Qualification</label>
        <input type="text"
               name="qualification"
               value="{{ $profile->qualification }}"
               class="border rounded w-full p-2">
    </div>

    <div class="mb-4">
        <label>Bar Council Number</label>
        <input type="text"
               name="bar_council_no"
               value="{{ $profile->bar_council_no }}"
               class="border rounded w-full p-2">
    </div>

    <div class="mb-4">
        <label>Consultation Fee (BDT)</label>
        <input type="number"
               name="consultation_fee"
               value="{{ $profile->consultation_fee }}"
               class="border rounded w-full p-2">
    </div>

    <div class="mb-4">
        <label>Bio</label>
        <textarea name="bio"
                  class="border rounded w-full p-2">{{ $profile->bio }}</textarea>
    </div>

    <div class="mb-4">
        <label>Phone</label>
        <input type="text"
               name="phone"
               value="{{ $profile->phone }}"
               class="border rounded w-full p-2">
    </div>

    <div class="mb-4">
        <label>Address</label>
        <input type="text"
               name="address"
               value="{{ $profile->address }}"
               class="border rounded w-full p-2">
    </div>

    <div class="mb-4">
        <label>City</label>
        <input type="text"
               name="city"
               value="{{ $profile->city }}"
               class="border rounded w-full p-2">
    </div>

    <button class="bg-blue-600 text-white px-5 py-2 rounded">
        Save Profile
    </button>

</form>

@endsection