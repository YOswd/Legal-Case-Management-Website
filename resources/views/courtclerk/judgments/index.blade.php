@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-8">Published Judgments</h1>

<div class="bg-white rounded shadow p-6">
    <table class="w-full">
        <thead>
            <tr class="border-b">
                <th class="text-left p-3">Case</th>
                <th class="text-left p-3">Client</th>
                <th class="text-left p-3">Lawyer</th>
                <th class="text-left p-3">Judgment Date</th>
                <th class="text-left p-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($cases as $case)
            <tr class="border-b">
                <td class="p-3">{{ $case->title }}</td>
                <td class="p-3">{{ $case->client?->name ?? 'N/A' }}</td>
                <td class="p-3">{{ $case->lawyer?->name ?? 'N/A' }}</td>
                <td class="p-3">
                    {{ \Carbon\Carbon::parse($case->judgment_date)->format('d M Y') }}
                </td>
                <td class="p-3">
                    <a href="{{ route('court_clerk.judgments.form', $case) }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded text-sm">
                        View
                    </a>>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="p-4 text-center">No judgments published yet.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection