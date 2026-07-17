@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="bg-white shadow rounded-lg p-8">

        <h1 class="text-3xl font-bold mb-8">User Details</h1>

        <table class="w-full">

            <tr>
                <td class="font-bold py-3 w-1/3">Name</td>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <td class="font-bold py-3">Email</td>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <td class="font-bold py-3">Role</td>
                <td>{{ ucfirst($user->role) }}</td>
            </tr>
            <tr>
                <td class="font-bold py-3">Registered</td>
                <td>{{ $user->created_at }}</td>
            </tr>

        </table>

        <div class="mt-8">

            <a href="{{ route('admin.users.edit', $user) }}"
               class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded">
                Edit User
            </a>

        </div>

    </div>

</div>

@endsection