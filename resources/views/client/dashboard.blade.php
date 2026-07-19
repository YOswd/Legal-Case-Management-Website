@extends('layouts.app')

@section('content')

{{-- Page Header --}}
<div class="mb-8 flex items-center justify-between">
    <div>
        <p class="text-xs font-semibold uppercase tracking-widest text-teal-600 mb-1">My Portal</p>
        <h1 class="text-3xl font-extrabold text-gray-800">Welcome back, {{ Auth::user()->name }} 👋</h1>
        <p class="text-gray-500 mt-1 text-sm">Here's an overview of your legal activities.</p>
    </div>
    <a href="{{ route('lawyers.index') }}"
       class="inline-flex items-center gap-2 px-5 py-2.5 bg-teal-600 hover:bg-teal-700 text-white text-sm font-semibold rounded-lg shadow transition active:scale-95">
        ⚖️ Find a Lawyer
    </a>
</div>

{{-- Stats Row --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-5 mb-10">

    <div class="bg-white border-l-4 border-teal-500 rounded-xl shadow-sm p-6">
        <div class="flex items-center justify-between mb-3">
            <span class="text-2xl">📁</span>
            <span class="text-xs font-bold uppercase text-teal-500 bg-teal-50 px-2 py-1 rounded-full">All</span>
        </div>
        <p class="text-3xl font-extrabold text-gray-800">{{ $totalCases }}</p>
        <p class="text-sm text-gray-500 mt-1">Total Cases</p>
    </div>

    <div class="bg-white border-l-4 border-blue-500 rounded-xl shadow-sm p-6">
        <div class="flex items-center justify-between mb-3">
            <span class="text-2xl">⚡</span>
            <span class="text-xs font-bold uppercase text-blue-500 bg-blue-50 px-2 py-1 rounded-full">Live</span>
        </div>
        <p class="text-3xl font-extrabold text-gray-800">{{ $activeCases }}</p>
        <p class="text-sm text-gray-500 mt-1">Active Cases</p>
    </div>

    <div class="bg-white border-l-4 border-green-500 rounded-xl shadow-sm p-6">
        <div class="flex items-center justify-between mb-3">
            <span class="text-2xl">✅</span>
            <span class="text-xs font-bold uppercase text-green-500 bg-green-50 px-2 py-1 rounded-full">Done</span>
        </div>
        <p class="text-3xl font-extrabold text-gray-800">{{ $resolvedCases }}</p>
        <p class="text-sm text-gray-500 mt-1">Resolved Cases</p>
    </div>

    <div class="bg-white border-l-4 border-orange-400 rounded-xl shadow-sm p-6">
        <div class="flex items-center justify-between mb-3">
            <span class="text-2xl">📩</span>
            <span class="text-xs font-bold uppercase text-orange-500 bg-orange-50 px-2 py-1 rounded-full">Pending</span>
        </div>
        <p class="text-3xl font-extrabold text-gray-800">{{ $pendingRequests }}</p>
        <p class="text-sm text-gray-500 mt-1">Pending Requests</p>
    </div>

    <div class="bg-white border-l-4 border-purple-500 rounded-xl shadow-sm p-6">
        <div class="flex items-center justify-between mb-3">
            <span class="text-2xl">📄</span>
            <span class="text-xs font-bold uppercase text-purple-500 bg-purple-50 px-2 py-1 rounded-full">Files</span>
        </div>
        <p class="text-3xl font-extrabold text-gray-800">{{ $myDocuments }}</p>
        <p class="text-sm text-gray-500 mt-1">My Documents</p>
    </div>

</div>

{{-- Quick Actions --}}
<div class="mb-8">
    <h2 class="text-lg font-bold text-gray-700 mb-4">Quick Actions</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

        <a href="{{ route('client.cases') }}"
           class="flex items-center gap-4 bg-white border border-gray-100 rounded-xl p-5 hover:border-teal-400 hover:shadow-md transition group">
            <div class="w-12 h-12 rounded-lg bg-teal-100 flex items-center justify-center text-2xl group-hover:bg-teal-600 group-hover:text-white transition">⚖️</div>
            <div>
                <p class="font-semibold text-gray-800">My Legal Cases</p>
                <p class="text-xs text-gray-400">View all your cases</p>
            </div>
        </a>

        <a href="{{ route('client.requests') }}"
           class="flex items-center gap-4 bg-white border border-gray-100 rounded-xl p-5 hover:border-blue-400 hover:shadow-md transition group">
            <div class="w-12 h-12 rounded-lg bg-blue-100 flex items-center justify-center text-2xl group-hover:bg-blue-600 group-hover:text-white transition">📩</div>
            <div>
                <p class="font-semibold text-gray-800">My Requests</p>
                <p class="text-xs text-gray-400">Pending lawyer requests</p>
            </div>
        </a>

        <a href="{{ route('client.documents.all') }}"
           class="flex items-center gap-4 bg-white border border-gray-100 rounded-xl p-5 hover:border-purple-400 hover:shadow-md transition group">
            <div class="w-12 h-12 rounded-lg bg-purple-100 flex items-center justify-center text-2xl group-hover:bg-purple-600 group-hover:text-white transition">📄</div>
            <div>
                <p class="font-semibold text-gray-800">Documents</p>
                <p class="text-xs text-gray-400">All uploaded files</p>
            </div>
        </a>

        <a href="{{ route('lawyers.index') }}"
           class="flex items-center gap-4 bg-white border border-gray-100 rounded-xl p-5 hover:border-orange-400 hover:shadow-md transition group">
            <div class="w-12 h-12 rounded-lg bg-orange-100 flex items-center justify-center text-2xl group-hover:bg-orange-500 group-hover:text-white transition">👨‍⚖️</div>
            <div>
                <p class="font-semibold text-gray-800">Browse Lawyers</p>
                <p class="text-xs text-gray-400">Find a legal professional</p>
            </div>
        </a>

    </div>
</div>

@endsection