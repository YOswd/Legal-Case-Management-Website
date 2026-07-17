@extends('layouts.public')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-16">

    <div class="mb-12">
        <h1 class="text-4xl lg:text-5xl font-extrabold text-white tracking-tight">
            Find an <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-400">Expert</span>
        </h1>
        <p class="text-slate-400 mt-4 text-lg">Browse our network of verified legal professionals.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($lawyers as $lawyer)
        <div class="bg-white/5 border border-white/10 rounded-3xl p-8 text-center hover:bg-white/10 hover:-translate-y-2 transition-all duration-300 group backdrop-blur-sm cursor-pointer shadow-xl relative overflow-hidden flex flex-col h-full">
            <div class="absolute inset-0 bg-gradient-to-b from-indigo-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
            
            <div class="relative w-32 h-32 mx-auto mb-6 rounded-full p-1 bg-gradient-to-tr from-blue-500 to-indigo-500 shadow-[0_0_20px_rgba(99,102,241,0.4)] group-hover:shadow-[0_0_30px_rgba(99,102,241,0.6)] transition-shadow">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($lawyer->user->name) }}&background=0f172a&color=fff&size=200" class="rounded-full w-full h-full object-cover border-4 border-slate-900">
            </div>

            <h2 class="text-2xl font-bold text-white relative z-10">{{ $lawyer->user->name }}</h2>
            <p class="text-indigo-400 font-medium mb-4 relative z-10">{{ $lawyer->specialization }}</p>

            <div class="flex justify-center gap-3 mb-6 relative z-10">
                <div class="bg-slate-900/50 rounded-full px-4 py-1.5 border border-white/5 flex items-center gap-2">
                    <svg class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    <span class="text-xs font-medium text-slate-300">{{ $lawyer->experience }} Yrs</span>
                </div>
                <div class="bg-slate-900/50 rounded-full px-4 py-1.5 border border-white/5 flex items-center gap-2">
                    <svg class="w-4 h-4 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="text-xs font-medium text-slate-300">৳{{ number_format($lawyer->consultation_fee) }}</span>
                </div>
            </div>

            <div class="mt-auto relative z-10 pt-6">
                <a href="{{ route('lawyers.show', $lawyer->id) }}" class="flex items-center justify-center gap-2 w-full py-3 rounded-xl bg-white/5 border border-white/10 text-white font-medium hover:bg-indigo-600 hover:border-indigo-500 transition-colors">
                    View Full Profile
                    <svg class="w-4 h-4 text-white/50" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>
        </div>
        @empty
        <div class="col-span-full py-16 text-center bg-white/5 backdrop-blur-sm border border-white/10 rounded-3xl">
            <div class="w-20 h-20 bg-slate-800 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
            <h3 class="text-2xl font-bold text-white mb-2">No Lawyers Available</h3>
            <p class="text-slate-400">Please check back later as our network expands.</p>
        </div>
        @endforelse
    </div>

    @if($lawyers->hasPages())
    <div class="mt-12 bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-4">
        {{ $lawyers->links() }}
    </div>
    @endif

</div>
@endsection