@extends('layouts.app')

@section('content')

{{-- Page Header --}}
<div class="mb-8 flex items-center justify-between">
    <div>
        <p class="text-xs font-semibold uppercase tracking-widest text-indigo-600 mb-1">Legal Practice</p>
        <h1 class="text-3xl font-extrabold text-gray-800">Lawyer Dashboard</h1>
        <p class="text-gray-500 mt-1 text-sm">Manage your cases and client requests, {{ Auth::user()->name }}.</p>
    </div>
    <a href="{{ route('lawyer.cases') }}"
       class="inline-flex items-center gap-2 px-5 py-2.5 bg-indigo-700 hover:bg-indigo-800 text-white text-sm font-semibold rounded-lg shadow transition active:scale-95">
        ⚖️ View My Cases
    </a>
</div>

{{-- Stats Row --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-5 mb-10">

    <div class="bg-white rounded-xl shadow-sm p-6 border-t-4 border-indigo-600">
        <p class="text-xs font-bold text-indigo-600 uppercase tracking-wide mb-4">Total Cases</p>
        <p class="text-4xl font-black text-gray-800">{{ $totalCases }}</p>
        <p class="text-sm text-gray-400 mt-2">Assigned to you</p>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6 border-t-4 border-amber-500">
        <p class="text-xs font-bold text-amber-600 uppercase tracking-wide mb-4">Pending Requests</p>
        <p class="text-4xl font-black text-gray-800">{{ $pendingRequests }}</p>
        <p class="text-sm text-gray-400 mt-2">Awaiting your review</p>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6 border-t-4 border-sky-500">
        <p class="text-xs font-bold text-sky-600 uppercase tracking-wide mb-4">Active Cases</p>
        <p class="text-4xl font-black text-gray-800">{{ $activeCases }}</p>
        <p class="text-sm text-gray-400 mt-2">In progress</p>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6 border-t-4 border-emerald-500">
        <p class="text-xs font-bold text-emerald-600 uppercase tracking-wide mb-4">Resolved Cases</p>
        <p class="text-4xl font-black text-gray-800">{{ $resolvedCases }}</p>
        <p class="text-sm text-gray-400 mt-2">Successfully closed</p>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6 border-t-4 border-violet-500">
        <p class="text-xs font-bold text-violet-600 uppercase tracking-wide mb-4">Documents</p>
        <p class="text-4xl font-black text-gray-800">{{ $documents }}</p>
        <p class="text-sm text-gray-400 mt-2">Files uploaded</p>
    </div>

</div>

{{-- Action Panels --}}
<h2 class="text-lg font-bold text-gray-700 mb-4">Manage Your Work</h2>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    {{-- Requests Panel --}}
    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">
        <div class="flex items-center justify-between px-6 py-4 bg-amber-50 border-b border-amber-100">
            <div class="flex items-center gap-3">
                <span class="text-2xl">📩</span>
                <div>
                    <h3 class="font-bold text-gray-800">Client Requests</h3>
                    <p class="text-xs text-gray-500">Review and respond to requests</p>
                </div>
            </div>
            <span class="px-3 py-1 text-sm font-bold bg-amber-500 text-white rounded-full">{{ $pendingRequests }}</span>
        </div>
        <div class="p-6 flex items-center justify-between">
            <p class="text-sm text-gray-500">{{ $pendingRequests }} pending request(s) from clients.</p>
            <a href="{{ route('lawyer.requests') }}"
               class="text-sm font-semibold text-amber-600 hover:text-amber-800 transition">View All →</a>
        </div>
    </div>

    {{-- Cases Panel --}}
    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">
        <div class="flex items-center justify-between px-6 py-4 bg-indigo-50 border-b border-indigo-100">
            <div class="flex items-center gap-3">
                <span class="text-2xl">⚖️</span>
                <div>
                    <h3 class="font-bold text-gray-800">My Cases</h3>
                    <p class="text-xs text-gray-500">Track your active legal cases</p>
                </div>
            </div>
            <span class="px-3 py-1 text-sm font-bold bg-indigo-600 text-white rounded-full">{{ $activeCases }} active</span>
        </div>
        <div class="p-6 flex items-center justify-between">
            <p class="text-sm text-gray-500">{{ $totalCases }} total case(s) assigned to you.</p>
            <a href="{{ route('lawyer.cases') }}"
               class="text-sm font-semibold text-indigo-600 hover:text-indigo-800 transition">View All →</a>
        </div>
    </div>

    {{-- Profile Panel --}}
    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">
        <div class="flex items-center justify-between px-6 py-4 bg-violet-50 border-b border-violet-100">
            <div class="flex items-center gap-3">
                <span class="text-2xl">👤</span>
                <div>
                    <h3 class="font-bold text-gray-800">My Profile</h3>
                    <p class="text-xs text-gray-500">Update specialization and fees</p>
                </div>
            </div>
        </div>
        <div class="p-6 flex items-center justify-between">
            <p class="text-sm text-gray-500">Keep your public profile up to date.</p>
            <a href="{{ route('lawyer.profile.edit') }}"
               class="text-sm font-semibold text-violet-600 hover:text-violet-800 transition">Edit Profile →</a>
        </div>
    </div>

    {{-- Documents Panel --}}
    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">
        <div class="flex items-center justify-between px-6 py-4 bg-emerald-50 border-b border-emerald-100">
            <div class="flex items-center gap-3">
                <span class="text-2xl">📄</span>
                <div>
                    <h3 class="font-bold text-gray-800">Documents</h3>
                    <p class="text-xs text-gray-500">Access case related documents</p>
                </div>
            </div>
            <span class="px-3 py-1 text-sm font-bold bg-emerald-500 text-white rounded-full">{{ $documents }}</span>
        </div>
        <div class="p-6 flex items-center justify-between">
            <p class="text-sm text-gray-500">{{ $documents }} document(s) uploaded for your cases.</p>
            <a href="{{ route('lawyer.cases') }}"
               class="text-sm font-semibold text-emerald-600 hover:text-emerald-800 transition">View Cases →</a>
        </div>
    </div>

</div>

@endsection