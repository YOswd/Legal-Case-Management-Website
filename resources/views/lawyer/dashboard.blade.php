@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-8">

    Lawyer Dashboard

</h1>

<a href="{{ route('lawyer.profile.edit') }}"
   class="block p-3 rounded hover:bg-gray-700">
    👨‍⚖️ My Profile
</a>

@endsection