@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Incoming Case Requests
</h1>

@if(session('success'))
    <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<table class="w-full border border-gray-300">
    <thead class="bg-gray-200">
        <tr>
            <th class="border p-2">Client</th>
            <th class="border p-2">Title</th>
            <th class="border p-2">Budget</th>
            <th class="border p-2">Status</th>
            <th class="border p-2">Actions</th>
        </tr>
    </thead>
    <tbody>

    @forelse($requests as $request)

        <tr>
            <td class="border p-2">
                {{ $request->client->name }}
            </td>
            <td class="border p-2">
                {{ $request->title }}
            </td>
            <td class="border p-2">
                {{ $request->budget ? '৳'.number_format($request->budget) : 'N/A' }}
            </td>
            <td class="border p-2">
                {{ $request->status }}
            </td>
            <td class="border p-2">
                @if($request->status == 'Pending')
                    <div class="flex gap-2">
                        <form method="POST"
                              action="{{ route('lawyer.requests.show',$request) }}">
                            @csrf
                            @method('PATCH')
                            <button class="bg-green-600 text-white px-3 py-1 rounded">
                                View
                            </button>
                        </form>
                        <form method="POST"
                              action="{{ route('requests.accept', $request) }}">
                            @csrf
                            @method('PATCH')
                            <button class="bg-green-600 text-white px-3 py-1 rounded">
                                Accept
                            </button>
                        </form>
                        <form method="POST"
                              action="{{ route('requests.reject', $request) }}">
                            @csrf
                            @method('PATCH')
                            <button class="bg-red-600 text-white px-3 py-1 rounded">
                                Reject
                            </button>
                        </form>
                    </div>
                @else
                    —
                @endif
            </td>
        </tr>

    @empty

        <tr>
            <td colspan="5" class="border p-4 text-center">
                No case requests yet.
            </td>
        </tr>

    @endforelse
    </tbody>
</table>

@endsection