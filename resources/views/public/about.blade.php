@extends('layouts.public')

@section('content')
<div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
    <div class="text-center max-w-3xl mx-auto mb-16">
        <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight text-white mb-6">
            Justice Driven by <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-400">Technology</span>
        </h1>
        <p class="text-lg text-slate-400">
            The Legal Case System is designed to bridge the gap between clients seeking legal help and the lawyers who can provide it, all within a streamlined, modern interface.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-24">
        <!-- Card 1 -->
        <div class="bg-white/5 backdrop-blur-lg border border-white/10 p-8 rounded-2xl hover:bg-white/10 transition-all cursor-pointer">
            <div class="w-14 h-14 bg-indigo-500/20 rounded-xl flex items-center justify-center mb-6">
                <svg class="w-8 h-8 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
            </div>
            <h3 class="text-xl font-bold text-white mb-3">Efficiency</h3>
            <p class="text-slate-400 text-sm leading-relaxed">We optimize the workflow for lawyers to track cases and for clients to monitor their progress securely from anywhere.</p>
        </div>
        
        <!-- Card 2 -->
        <div class="bg-white/5 backdrop-blur-lg border border-white/10 p-8 rounded-2xl hover:bg-white/10 transition-all cursor-pointer">
            <div class="w-14 h-14 bg-blue-500/20 rounded-xl flex items-center justify-center mb-6">
                <svg class="w-8 h-8 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
            </div>
            <h3 class="text-xl font-bold text-white mb-3">Security</h3>
            <p class="text-slate-400 text-sm leading-relaxed">Legal matters require absolute confidentiality. Our platform uses state-of-the-art role protections and secure database handling.</p>
        </div>

        <!-- Card 3 -->
        <div class="bg-white/5 backdrop-blur-lg border border-white/10 p-8 rounded-2xl hover:bg-white/10 transition-all cursor-pointer">
            <div class="w-14 h-14 bg-purple-500/20 rounded-xl flex items-center justify-center mb-6">
                <svg class="w-8 h-8 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
            <h3 class="text-xl font-bold text-white mb-3">Accessibility</h3>
            <p class="text-slate-400 text-sm leading-relaxed">Built with a responsive, modern interface allowing all roles to access vital case information efficiently on any device.</p>
        </div>
    </div>
</div>
@endsection