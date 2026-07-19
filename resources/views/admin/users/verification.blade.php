@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto">

<h1 class="text-3xl font-bold mb-6">
Pending Verifications
</h1>

@if(session('success'))

<div class="bg-green-100 border border-green-300 p-3 rounded mb-4">
{{ session('success') }}
</div>

@endif

<table class="w-full border">

<thead class="bg-gray-100">

<tr>

<th class="p-3">Name</th>

<th>Email</th>

<th>Role</th>

<th>Registered</th>

<th>Action</th>

</tr>

</thead>

<tbody>

@forelse($users as $user)

<tr>

<td class="p-3">
{{ $user->name }}
</td>

<td>
{{ $user->email }}
</td>

<td>
{{ ucfirst(str_replace('_',' ',$user->role)) }}
</td>

<td>
{{ $user->created_at->format('d M Y') }}
</td>

<td>

<div class="flex gap-2">

<form
method="POST"
action="{{ route('admin.users.verify',$user) }}">

@csrf
@method('PUT')

<button
class="bg-green-600 text-white px-4 py-2 rounded">

Approve

</button>

</form>

<form
method="POST"
action="{{ route('admin.users.reject',$user) }}">

@csrf
@method('DELETE')

<button
class="bg-red-600 text-white px-4 py-2 rounded">

Reject

</button>

</form>

</div>

</td>

</tr>

@empty

<tr>

<td colspan="5"
class="text-center p-6">

No pending users.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

@endsection