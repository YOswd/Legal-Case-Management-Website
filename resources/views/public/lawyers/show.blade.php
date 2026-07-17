@extends('layouts.public')

@section('content')
<div class="max-w-5xl mx-auto px-6 py-16">
    <div class="mb-6 flex items-center gap-2">
        <a href="{{ route('lawyers.index') }}" class="text-slate-400 hover:text-white transition flex items-center gap-1 font-medium text-sm">
            <svg class="w-4 h-4 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Back to Directory
        </a>
    </div>

    <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl p-10 shadow-2xl relative overflow-hidden">
        <div class="absolute top-0 right-0 w-[40rem] h-[40rem] bg-indigo-500/10 rounded-full filter blur-[80px] -translate-y-1/2 translate-x-1/3 pointer-events-none"></div>

        <div class="flex flex-col md:flex-row gap-12 relative z-10">
            <!-- Left Info Panel -->
            <div class="md:w-1/3 flex flex-col items-center">
                <div class="relative w-48 h-48 mb-6 rounded-full p-1.5 bg-gradient-to-tr from-blue-500 to-indigo-500 shadow-[0_0_30px_rgba(99,102,241,0.3)]">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($lawyer->user->name) }}&background=0f172a&color=fff&size=300" class="rounded-full w-full h-full object-cover border-4 border-slate-900">
                </div>
                
                <h2 class="text-3xl font-extrabold text-white text-center tracking-tight mb-2">
                    {{ $lawyer->user->name }}
                </h2>
                <p class="text-indigo-400 font-medium text-center uppercase tracking-wider text-sm mb-4">
                    {{ $lawyer->specialization }}
                </p>

                <div class="flex items-center gap-1 bg-yellow-500/10 border border-yellow-500/20 text-yellow-400 px-4 py-1.5 rounded-full mb-8">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    <span class="font-bold">{{ number_format((float)($lawyer->rating ?? 5), 1) }} / 5.0</span>
                </div>
                
                <div class="w-full space-y-3">
                    <a href="{{ route('requests.create', $lawyer->user->id) }}" class="w-full flex items-center justify-center py-3.5 bg-indigo-600 hover:bg-indigo-500 text-white rounded-xl font-bold transition shadow-lg shadow-indigo-600/30">
                        Request Case Evaluation
                    </a>
                    <button onclick="alert('Feature coming soon!')" class="w-full flex items-center justify-center py-3.5 bg-white/5 hover:bg-white/10 border border-white/10 text-white rounded-xl font-semibold transition">
                        Ask for Advice
                    </button>
                </div>
            </div>

            <!-- Right Details Panel -->
            <div class="md:w-2/3">
                <h3 class="text-2xl font-bold text-white mb-6 flex items-center gap-3">
                    <span class="w-8 h-8 rounded-lg bg-indigo-500/20 text-indigo-400 flex items-center justify-center">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </span>
                    Professional Details
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-10">
                    <div class="bg-black/30 rounded-2xl p-5 border border-white/5">
                        <p class="text-slate-500 text-xs font-semibold uppercase tracking-wider mb-1">Experience</p>
                        <p class="text-white text-lg font-medium">{{ $lawyer->experience }} Years</p>
                    </div>
                    <div class="bg-black/30 rounded-2xl p-5 border border-white/5">
                        <p class="text-slate-500 text-xs font-semibold uppercase tracking-wider mb-1">Qualification</p>
                        <p class="text-white text-lg font-medium">{{ $lawyer->qualification }}</p>
                    </div>
                    <div class="bg-black/30 rounded-2xl p-5 border border-white/5">
                        <p class="text-slate-500 text-xs font-semibold uppercase tracking-wider mb-1">Bar Council No.</p>
                        <p class="text-white text-lg font-medium tracking-wide">{{ $lawyer->bar_council_no }}</p>
                    </div>
                    <div class="bg-black/30 rounded-2xl p-5 border border-white/5">
                        <p class="text-slate-500 text-xs font-semibold uppercase tracking-wider mb-1">Consultation Fee</p>
                        <p class="text-green-400 text-lg font-bold">৳{{ number_format($lawyer->consultation_fee) }}</p>
                    </div>
                    <div class="bg-black/30 rounded-2xl p-5 border border-white/5">
                        <p class="text-slate-500 text-xs font-semibold uppercase tracking-wider mb-1">Location</p>
                        <p class="text-white text-lg font-medium flex items-center gap-1">
                            <svg class="w-4 h-4 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            {{ $lawyer->city }}
                        </p>
                    </div>
                    <div class="bg-black/30 rounded-2xl p-5 border border-white/5">
                        <p class="text-slate-500 text-xs font-semibold uppercase tracking-wider mb-1">Contact</p>
                        <p class="text-white text-lg font-medium">{{ $lawyer->phone }}</p>
                    </div>
                </div>

                <h3 class="text-2xl font-bold text-white mb-4 flex items-center gap-3">
                    <span class="w-8 h-8 rounded-lg bg-indigo-500/20 text-indigo-400 flex items-center justify-center">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </span>
                    Biography
                </h3>
                <div class="bg-black/20 rounded-2xl p-6 border border-white/5 leading-relaxed text-slate-300 text-lg font-light shadow-inner">
                    @if($lawyer->bio)
                        {{ $lawyer->bio }}
                    @else
                        This legal professional has not provided a biography yet.
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection