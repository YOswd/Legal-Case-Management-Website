@extends('layouts.app')

@section('content')

{{-- Page Header --}}
<div class="mb-8">
    <p class="text-xs font-semibold uppercase tracking-widest text-slate-500 mb-1">Court Operations</p>
    <h1 class="text-3xl font-extrabold text-gray-800">Court Clerk Dashboard</h1>
    <p class="text-gray-500 mt-1 text-sm">Manage filings, hearings, judgments and appeals — {{ now()->format('F j, Y') }}</p>
</div>

{{-- Overview Stats --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-5 mb-10">

    <div class="bg-gradient-to-br from-red-500 to-rose-600 rounded-2xl p-6 text-white shadow-md">
        <div class="flex items-start justify-between mb-4">
            <div>
                <p class="text-xs font-bold uppercase opacity-80 tracking-wide">Pending Filings</p>
                <p class="text-5xl font-black mt-1">{{ $pendingFilings }}</p>
            </div>
            <span class="text-3xl">📂</span>
        </div>
        <p class="text-xs opacity-70">Awaiting verification</p>
    </div>

    <div class="bg-gradient-to-br from-sky-500 to-blue-600 rounded-2xl p-6 text-white shadow-md">
        <div class="flex items-start justify-between mb-4">
            <div>
                <p class="text-xs font-bold uppercase opacity-80 tracking-wide">Active Cases</p>
                <p class="text-5xl font-black mt-1">{{ $activeCases }}</p>
            </div>
            <span class="text-3xl">⚖️</span>
        </div>
        <p class="text-xs opacity-70">In progress court cases</p>
    </div>

    <div class="bg-gradient-to-br from-amber-500 to-orange-600 rounded-2xl p-6 text-white shadow-md">
        <div class="flex items-start justify-between mb-4">
            <div>
                <p class="text-xs font-bold uppercase opacity-80 tracking-wide">Upcoming Hearings</p>
                <p class="text-5xl font-black mt-1">{{ $upcomingHearings }}</p>
            </div>
            <span class="text-3xl">📅</span>
        </div>
        <p class="text-xs opacity-70">Scheduled from today</p>
    </div>

    <div class="bg-gradient-to-br from-emerald-500 to-green-600 rounded-2xl p-6 text-white shadow-md">
        <div class="flex items-start justify-between mb-4">
            <div>
                <p class="text-xs font-bold uppercase opacity-80 tracking-wide">Resolved Cases</p>
                <p class="text-5xl font-black mt-1">{{ $resolvedCases }}</p>
            </div>
            <span class="text-3xl">✅</span>
        </div>
        <p class="text-xs opacity-70">Successfully closed</p>
    </div>

</div>

{{-- Operations Grid --}}
<h2 class="text-lg font-bold text-gray-700 mb-4">Court Operations</h2>
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5">

    <a href="{{ route('court_clerk.filings') }}"
       class="group flex flex-col justify-between bg-white border border-gray-100 rounded-2xl shadow-sm p-6 hover:border-red-300 hover:shadow-md transition">
        <div>
            <div class="w-12 h-12 rounded-xl bg-red-100 group-hover:bg-red-500 flex items-center justify-center text-2xl transition mb-5">📂</div>
            <h3 class="font-bold text-gray-800">Pending Filings</h3>
            <p class="text-sm text-gray-500 mt-1">Verify and process submitted case filings</p>
        </div>
        <div class="mt-6 flex items-center text-sm font-semibold text-red-500 group-hover:text-red-700">
            Go to Filings <span class="ml-auto">→</span>
        </div>
    </a>

    <a href="{{ route('court_clerk.hearings') }}"
       class="group flex flex-col justify-between bg-white border border-gray-100 rounded-2xl shadow-sm p-6 hover:border-amber-300 hover:shadow-md transition">
        <div>
            <div class="w-12 h-12 rounded-xl bg-amber-100 group-hover:bg-amber-500 flex items-center justify-center text-2xl transition mb-5">📅</div>
            <h3 class="font-bold text-gray-800">Hearing Schedule</h3>
            <p class="text-sm text-gray-500 mt-1">Manage and schedule court hearings</p>
        </div>
        <div class="mt-6 flex items-center text-sm font-semibold text-amber-500 group-hover:text-amber-700">
            Manage Hearings <span class="ml-auto">→</span>
        </div>
    </a>

    <a href="{{ route('court_clerk.judgments') }}"
       class="group flex flex-col justify-between bg-white border border-gray-100 rounded-2xl shadow-sm p-6 hover:border-indigo-300 hover:shadow-md transition">
        <div>
            <div class="w-12 h-12 rounded-xl bg-indigo-100 group-hover:bg-indigo-600 flex items-center justify-center text-2xl transition mb-5">⚖️</div>
            <h3 class="font-bold text-gray-800">Judgments</h3>
            <p class="text-sm text-gray-500 mt-1">Publish and manage case judgments</p>
        </div>
        <div class="mt-6 flex items-center text-sm font-semibold text-indigo-500 group-hover:text-indigo-700">
            Manage Judgments <span class="ml-auto">→</span>
        </div>
    </a>

    <a href="{{ route('court_clerk.appeals') }}"
       class="group flex flex-col justify-between bg-white border border-gray-100 rounded-2xl shadow-sm p-6 hover:border-violet-300 hover:shadow-md transition">
        <div>
            <div class="w-12 h-12 rounded-xl bg-violet-100 group-hover:bg-violet-600 flex items-center justify-center text-2xl transition mb-5">🏛️</div>
            <h3 class="font-bold text-gray-800">Appeals</h3>
            <p class="text-sm text-gray-500 mt-1">Review and handle pending case appeals</p>
        </div>
        <div class="mt-6 flex items-center text-sm font-semibold text-violet-500 group-hover:text-violet-700">
            View Appeals <span class="ml-auto">→</span>
        </div>
    </a>

</div>

@endsection