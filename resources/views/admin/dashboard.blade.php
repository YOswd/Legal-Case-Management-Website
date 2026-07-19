@extends('layouts.app')

@section('content')

{{-- Page Header --}}
<div class="mb-8 flex items-center justify-between">
    <div>
        <p class="text-xs font-semibold uppercase tracking-widest text-gray-500 mb-1">System Administration</p>
        <h1 class="text-3xl font-extrabold text-gray-800">Admin Dashboard</h1>
        <p class="text-gray-500 mt-1 text-sm">Full system overview and control panel — {{ now()->format('l, F j, Y') }}</p>
    </div>
    <div class="flex gap-3">
        <a href="{{ route('admin.users.index') }}"
           class="inline-flex items-center gap-2 px-4 py-2.5 bg-gray-800 hover:bg-gray-900 text-white text-sm font-semibold rounded-lg shadow transition active:scale-95">
            👥 Manage Users
        </a>
        <a href="{{ route('admin.cases.index') }}"
           class="inline-flex items-center gap-2 px-4 py-2.5 bg-indigo-700 hover:bg-indigo-800 text-white text-sm font-semibold rounded-lg shadow transition active:scale-95">
            📂 Manage Cases
        </a>
    </div>
</div>

{{-- Users Stats Row --}}
<div class="mb-3">
    <p class="text-xs text-gray-400 font-bold uppercase tracking-widest mb-3">User Statistics</p>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mb-6">

        <div class="bg-white rounded-2xl shadow-sm overflow-hidden flex">
            <div class="w-2 bg-blue-600 shrink-0"></div>
            <div class="p-6 flex-1">
                <div class="flex items-center justify-between mb-2">
                    <p class="text-sm font-semibold text-gray-500">Total Users</p>
                    <span class="text-2xl">👥</span>
                </div>
                <p class="text-4xl font-black text-gray-800">{{ $totalUsers }}</p>
                <div class="mt-3 h-1 bg-gray-100 rounded-full">
                    <div class="h-1 bg-blue-500 rounded-full" style="width: 100%"></div>
                </div>
                <p class="text-xs text-gray-400 mt-2">Across all roles</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm overflow-hidden flex">
            <div class="w-2 bg-emerald-500 shrink-0"></div>
            <div class="p-6 flex-1">
                <div class="flex items-center justify-between mb-2">
                    <p class="text-sm font-semibold text-gray-500">Total Lawyers</p>
                    <span class="text-2xl">👨‍⚖️</span>
                </div>
                <p class="text-4xl font-black text-gray-800">{{ $totalLawyers }}</p>
                <div class="mt-3 h-1 bg-gray-100 rounded-full">
                    @php $lawyerPct = $totalUsers > 0 ? round(($totalLawyers / $totalUsers) * 100) : 0; @endphp
                    <div class="h-1 bg-emerald-500 rounded-full" style="width: {{ $lawyerPct }}%"></div>
                </div>
                <p class="text-xs text-gray-400 mt-2">{{ $lawyerPct }}% of all users</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm overflow-hidden flex">
            <div class="w-2 bg-violet-500 shrink-0"></div>
            <div class="p-6 flex-1">
                <div class="flex items-center justify-between mb-2">
                    <p class="text-sm font-semibold text-gray-500">Total Clients</p>
                    <span class="text-2xl">🧑‍💼</span>
                </div>
                <p class="text-4xl font-black text-gray-800">{{ $totalClients }}</p>
                <div class="mt-3 h-1 bg-gray-100 rounded-full">
                    @php $clientPct = $totalUsers > 0 ? round(($totalClients / $totalUsers) * 100) : 0; @endphp
                    <div class="h-1 bg-violet-500 rounded-full" style="width: {{ $clientPct }}%"></div>
                </div>
                <p class="text-xs text-gray-400 mt-2">{{ $clientPct }}% of all users</p>
            </div>
        </div>

    </div>
</div>

{{-- Cases Stats Row --}}
<div class="mb-10">
    <p class="text-xs text-gray-400 font-bold uppercase tracking-widest mb-3">Case Statistics</p>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">

        <div class="bg-gray-800 text-white rounded-2xl p-6 shadow-md">
            <div class="flex items-center justify-between mb-3">
                <p class="text-sm font-semibold text-gray-400">Total Cases</p>
                <span class="text-2xl">📂</span>
            </div>
            <p class="text-5xl font-black">{{ $totalCases }}</p>
            <p class="text-xs text-gray-500 mt-3">All cases in the system</p>
        </div>

        <div class="bg-amber-500 text-white rounded-2xl p-6 shadow-md">
            <div class="flex items-center justify-between mb-3">
                <p class="text-sm font-semibold text-amber-100">Pending Cases</p>
                <span class="text-2xl">⏳</span>
            </div>
            <p class="text-5xl font-black">{{ $pendingCases }}</p>
            <p class="text-xs text-amber-200 mt-3">Cases awaiting action</p>
        </div>

        <div class="bg-green-600 text-white rounded-2xl p-6 shadow-md">
            <div class="flex items-center justify-between mb-3">
                <p class="text-sm font-semibold text-green-100">Resolved Cases</p>
                <span class="text-2xl">✅</span>
            </div>
            <p class="text-5xl font-black">{{ $resolvedCases }}</p>
            <p class="text-xs text-green-200 mt-3">Successfully closed</p>
        </div>

    </div>
</div>

{{-- Quick Management Links --}}
<h2 class="text-lg font-bold text-gray-700 mb-4">Management Tools</h2>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

    <a href="{{ route('admin.users.index') }}"
       class="group flex items-center gap-5 bg-white border border-gray-100 rounded-2xl shadow-sm p-6 hover:border-blue-300 hover:shadow-md transition">
        <div class="w-14 h-14 rounded-xl bg-blue-100 flex items-center justify-center text-3xl group-hover:bg-blue-600 group-hover:text-white transition">👥</div>
        <div class="flex-1">
            <h3 class="font-bold text-gray-800">User Management</h3>
            <p class="text-sm text-gray-400">View, edit and manage all system users</p>
        </div>
        <span class="text-gray-300 group-hover:text-blue-500 text-xl transition">→</span>
    </a>

    <a href="{{ route('admin.cases.index') }}"
       class="group flex items-center gap-5 bg-white border border-gray-100 rounded-2xl shadow-sm p-6 hover:border-indigo-300 hover:shadow-md transition">
        <div class="w-14 h-14 rounded-xl bg-indigo-100 flex items-center justify-center text-3xl group-hover:bg-indigo-600 group-hover:text-white transition">📂</div>
        <div class="flex-1">
            <h3 class="font-bold text-gray-800">Case Management</h3>
            <p class="text-sm text-gray-400">Oversee all legal cases in the system</p>
        </div>
        <span class="text-gray-300 group-hover:text-indigo-500 text-xl transition">→</span>
    </a>

</div>

@endsection