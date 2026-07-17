@extends('layouts.public')

@section('content')
<div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 flex flex-col lg:flex-row gap-16 items-center">
    <!-- Contact Information -->
    <div class="w-full lg:w-1/2">
        <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-white mb-6">
            Get in <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-blue-400">Touch</span>
        </h1>
        <p class="text-slate-400 text-lg mb-10">Have questions about the system or need technical support? Fill out the form and our team will get back to you shortly.</p>
        
        <div class="space-y-6">
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 bg-white/5 border border-white/10 rounded-xl flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </div>
                <div>
                    <h4 class="text-white font-medium text-lg">Office Address</h4>
                    <p class="text-slate-500 text-sm mt-1">123 Legal Avenue, Tech Park Building<br/>Dhaka, Bangladesh</p>
                </div>
            </div>
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 bg-white/5 border border-white/10 rounded-xl flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <div>
                    <h4 class="text-white font-medium text-lg">Email Us</h4>
                    <p class="text-slate-500 text-sm mt-1">support@legalcasesystem.test<br/>inquiries@legalcasesystem.test</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Form -->
    <div class="w-full lg:w-1/2">
        <form action="#" method="POST" class="bg-white/5 backdrop-blur-xl border border-white/10 p-8 rounded-3xl shadow-2xl space-y-5">
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-1">Your Name</label>
                <input type="text" class="block w-full rounded-xl bg-slate-900/50 border border-slate-700/50 text-white placeholder-slate-500 focus:border-indigo-500 focus:ring-indigo-500" placeholder="John Doe">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-1">Email Address</label>
                <input type="email" class="block w-full rounded-xl bg-slate-900/50 border border-slate-700/50 text-white placeholder-slate-500 focus:border-indigo-500 focus:ring-indigo-500" placeholder="john@example.com">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-1">Message</label>
                <textarea rows="4" class="block w-full rounded-xl bg-slate-900/50 border border-slate-700/50 text-white placeholder-slate-500 focus:border-indigo-500 focus:ring-indigo-500" placeholder="How can we help you?"></textarea>
            </div>
            <button type="button" onclick="alert('Message feature not yet connected to backend, but design looks great!')" class="w-full py-4 px-4 bg-indigo-600 hover:bg-indigo-500 rounded-xl text-white font-semibold transition active:scale-[0.98]">
                Send Message
            </button>
        </form>
    </div>
</div>
@endsection