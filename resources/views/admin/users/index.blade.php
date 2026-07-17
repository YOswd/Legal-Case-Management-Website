@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto">

    <h1 class="text-3xl font-bold mb-6">Manage Users</h1>

    <div class="bg-white shadow rounded">

        <table class="w-full">

            <thead class="bg-gray-100">
                <tr>
                    <th class="p-4">Name</th>
                    <th class="p-4">Email</th>
                    <th class="p-4">Role</th>
                    <th class="p-4">Action</th>
                </tr>
            </thead>

            <tbody>

            @foreach($users as $user)

            <tr class="border-t">
            <td class="p-4">{{ $user->name }}</td>
            <td class="p-4">{{ $user->email }}</td>
            <td class="p-4">{{ ucfirst($user->role) }}</td>
            <td class="p-4">
                <a href="{{ route('admin.users.show',$user) }}" class="text-blue-600">
                    View
                </a>
            </td>
            </tr>

            @endforeach

            </tbody>

        </table>

    </div>

    <div class="mt-5">
        {{ $users->links() }}
    </div>

</div>

@endsection