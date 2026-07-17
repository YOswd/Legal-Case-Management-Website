<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us - Legal Case System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-100 antialiased bg-slate-950 bg-gradient-to-tr from-blue-950 via-slate-900 to-indigo-950 min-h-screen relative overflow-x-hidden">
    <!-- Background Effects -->
    <div class="fixed top-20 right-20 w-[25rem] h-[25rem] bg-indigo-600/20 rounded-full mix-blend-screen filter blur-[80px] pointer-events-none"></div>
    <div class="fixed bottom-20 left-20 w-[25rem] h-[25rem] bg-blue-600/20 rounded-full mix-blend-screen filter blur-[80px] pointer-events-none"></div>

    <!-- Navigation -->
    <nav class="w-full relative z-40 bg-white/5 backdrop-blur-md border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-blue-500 to-indigo-500 flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path></svg>
                    </div>
                    <span class="text-xl font-bold tracking-widest text-white">LCS</span>
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="{{ route('home') }}" class="text-slate-300 hover:text-white transition">Home</a>
                    <a href="{{ route('about') }}" class="text-slate-300 hover:text-white transition">About</a>
                    <a href="{{ route('contact') }}" class="text-indigo-400 font-semibold border-b-2 border-indigo-400">Contact</a>
                </div>
                <div class="flex space-x-4">
                    <a href="{{ route('login') }}" class="px-5 py-2 text-sm font-medium text-white hover:text-indigo-300 transition">Login</a>
                    <a href="{{ route('register') }}" class="px-5 py-2 text-sm font-medium bg-indigo-600 hover:bg-indigo-500 rounded-lg shadow-lg text-white transition active:scale-95">Join Now</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 flex flex-col lg:flex-row gap-16 items-center">
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
    </main>
</body>
</html>