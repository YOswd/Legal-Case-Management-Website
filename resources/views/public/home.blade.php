@extends('layouts.public')

@section('content')

<!-- Hero Section -->
<section class="relative">
    <div class="max-w-7xl mx-auto px-6 py-28 relative z-10">
        <div class="grid md:grid-cols-2 gap-16 items-center">
            <div>
                <span class="inline-block py-1 px-3 rounded-full bg-indigo-500/10 text-indigo-400 border border-indigo-500/20 text-sm font-medium mb-6">
                    Justice Driven by Technology
                </span>
                <h1 class="text-5xl lg:text-7xl font-extrabold leading-tight text-white tracking-tight">
                    Find Trusted <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-400">Lawyers</span>
                </h1>
                <p class="mt-6 text-xl text-slate-400 font-light leading-relaxed">
                    Connect with verified professionals for legal cases, consultation and steadfast legal advice securely across Bangladesh.
                </p>
                <div class="mt-10 flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('lawyers.index') }}"
                       class="bg-indigo-600 hover:bg-indigo-500 text-white px-8 py-4 rounded-xl font-semibold shadow-lg shadow-indigo-500/30 transition-all text-center group flex items-center justify-center gap-2">
                        Browse Lawyers
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                    <a href="{{ route('register') }}"
                       class="bg-white/5 hover:bg-white/10 text-white border border-white/10 px-8 py-4 rounded-xl font-semibold backdrop-blur-sm transition-all text-center">
                        Client Registration
                    </a>
                </div>
            </div>
            
            <div class="relative">
                <!-- Decorative Frame -->
                <div class="absolute inset-0 bg-gradient-to-tr from-blue-500 to-indigo-500 rounded-3xl transform rotate-3 scale-105 opacity-50 blur-lg"></div>
                <div class="bg-slate-900 border border-white/10 rounded-3xl p-4 relative z-10 shadow-2xl backdrop-blur-xl">
                    <img
                        src="https://images.unsplash.com/photo-1589829085413-56de8ae18c73?q=80&w=1200&auto=format&fit=crop"
                        alt="Legal professional at work"
                        class="rounded-2xl shadow-xl w-full h-[400px] object-cover grayscale-[20%] hover:grayscale-0 transition-all duration-700">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics -->
<section class="py-16 relative z-10 border-y border-white/10 bg-black/20 backdrop-blur-md">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center divide-x divide-white/10">
            <div class="px-4">
                <h2 class="text-4xl md:text-5xl font-black text-transparent bg-clip-text bg-gradient-to-t from-blue-300 to-white">
                    {{ $lawyerCount }}+
                </h2>
                <p class="mt-2 text-slate-400 font-medium">Verified Lawyers</p>
            </div>
            <div class="px-4">
                <h2 class="text-4xl md:text-5xl font-black text-transparent bg-clip-text bg-gradient-to-t from-blue-300 to-white">
                    {{ $clientCount }}+
                </h2>
                <p class="mt-2 text-slate-400 font-medium">Registered Clients</p>
            </div>
            <div class="px-4">
                <h2 class="text-4xl md:text-5xl font-black text-transparent bg-clip-text bg-gradient-to-t from-blue-300 to-white">
                    {{ $caseCount }}+
                </h2>
                <p class="mt-2 text-slate-400 font-medium">Cases Handled</p>
            </div>
            <div class="px-4">
                <h2 class="text-4xl md:text-5xl font-black text-transparent bg-clip-text bg-gradient-to-t from-blue-300 to-white">
                    24/7
                </h2>
                <p class="mt-2 text-slate-400 font-medium">Secure Access</p>
            </div>
        </div>
    </div>
</section>

<!-- Featured Lawyers -->
<section class="py-24 relative z-10">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-end mb-12">
            <div>
                <h2 class="text-4xl font-extrabold text-white">Featured Experts</h2>
                <p class="text-slate-400 mt-2">Top-rated legal professionals available for consultation.</p>
            </div>
            <a href="{{ route('lawyers.index') }}" class="text-indigo-400 hover:text-indigo-300 font-medium flex items-center gap-1 transition">
                View all <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($featuredLawyers as $lawyer)
            <div class="bg-white/5 border border-white/10 rounded-2xl p-6 text-center hover:bg-white/10 transition-all group backdrop-blur-sm cursor-pointer shadow-xl relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-b from-indigo-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                
                <div class="relative w-24 h-24 mx-auto mb-5 rounded-full p-1 bg-gradient-to-tr from-blue-500 to-indigo-500">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($lawyer->user->name) }}&background=1e293b&color=fff&size=150" class="rounded-full w-full h-full object-cover border-4 border-slate-900">
                </div>

                <h3 class="text-xl font-bold text-white relative z-10">{{ $lawyer->user->name }}</h3>
                <p class="text-indigo-400 text-sm font-medium mb-3 relative z-10">{{ $lawyer->specialization }}</p>
                <div class="inline-flex items-center gap-2 bg-slate-900/50 rounded-full px-3 py-1 mb-6 border border-white/5 relative z-10">
                    <span class="w-2 h-2 rounded-full bg-green-500"></span>
                    <span class="text-xs text-slate-300">{{ $lawyer->experience }} Yrs Exp</span>
                </div>

                <a href="{{ route('lawyers.show', $lawyer->id) }}" class="block w-full py-2.5 rounded-xl bg-white/5 border border-white/10 text-white font-medium hover:bg-indigo-600 hover:border-indigo-500 transition-colors relative z-10">
                    View Profile
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-20 relative z-10">
    <div class="max-w-7xl mx-auto px-6">
        <div class="bg-gradient-to-r from-blue-900 to-indigo-900 rounded-3xl p-12 text-center relative overflow-hidden border border-indigo-500/30">
            <div class="absolute top-0 right-0 w-64 h-64 bg-blue-500 rounded-full mix-blend-screen filter blur-[80px] opacity-20"></div>
            
            <h2 class="text-4xl font-extrabold text-white mb-4 relative z-10">Ready to resolve your legal matters?</h2>
            <p class="text-indigo-200 text-lg mb-8 max-w-2xl mx-auto relative z-10">Join thousands of citizens who have found expert legal representation securely and efficiently.</p>
            
            <a href="{{ route('register') }}" class="inline-block bg-white text-indigo-900 px-8 py-4 rounded-xl font-bold shadow-xl hover:bg-slate-100 transition-all active:scale-95 relative z-10">
                Create Client Account
            </a>
        </div>
    </div>
</section>

@endsection