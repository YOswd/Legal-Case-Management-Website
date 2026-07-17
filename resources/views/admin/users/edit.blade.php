@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="bg-white shadow rounded-lg p-8">

    <h1 class="text-3xl font-bold mb-8">Edit User</h1>

    <form method="POST" action="{{ route('admin.users.update',$user) }}">

        @csrf
        @method('PUT')

        <div class="mb-5">

            <label>Name</label>
            <input
            type="text"
            name="name"
            value="{{ old('name',$user->name) }}"
            class="w-full border rounded p-2">

        </div>

        <div class="mb-5">

            <label>Email</label>
            <input
            type="email"
            name="email"
            value="{{ old('email',$user->email) }}"
            class="w-full border rounded p-2">

        </div>

        <div class="mb-6">

            <label>Role</label>
            <select name="role" class="w-full border rounded p-2">
                <option value="admin" {{ $user->role=='admin'?'selected':'' }}>Admin</option>
                <option value="lawyer" {{ $user->role=='lawyer'?'selected':'' }}>Lawyer</option>
                <option value="client" {{ $user->role=='client'?'selected':'' }}>Client</option>
            </select>

        </div>

        <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded">
            Update User
        </button>

    </form>

    </div>

</div>

@endsection