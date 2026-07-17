<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Legal Case System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-100 antialiased bg-slate-950 bg-gradient-to-br from-indigo-950 via-slate-900 to-blue-950 min-h-screen relative overflow-x-hidden flex flex-col">
    <!-- Background Effects -->
    <div class="fixed top-0 -left-40 w-[30rem] h-[30rem] bg-indigo-500 rounded-full mix-blend-multiply filter blur-[100px] opacity-20 pointer-events-none"></div>
    <div class="fixed bottom-0 -right-40 w-[30rem] h-[30rem] bg-blue-500 rounded-full mix-blend-multiply filter blur-[100px] opacity-20 pointer-events-none"></div>

    {{-- Navbar --}}
    <nav class="w-full relative z-40 bg-white/5 backdrop-blur-md border-b border-white/10 shrink-0">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-blue-500 to-indigo-500 flex items-center justify-center transform transition-transform group-hover:scale-110 shadow-lg shadow-indigo-500/50">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path></svg>
                    </div>
                    <span class="text-xl font-bold tracking-widest text-white">LCS</span>
                </a>

                <div class="hidden md:flex items-center gap-8">
                    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-indigo-400 font-semibold border-b-2 border-indigo-400' : 'text-slate-300 hover:text-white transition' }}">Home</a>
                    <a href="{{ route('lawyers.index') }}" class="{{ request()->routeIs('lawyers.*') ? 'text-indigo-400 font-semibold border-b-2 border-indigo-400' : 'text-slate-300 hover:text-white transition' }}">Find Lawyers</a>
                    <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'text-indigo-400 font-semibold border-b-2 border-indigo-400' : 'text-slate-300 hover:text-white transition' }}">About</a>
                    <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'text-indigo-400 font-semibold border-b-2 border-indigo-400' : 'text-slate-300 hover:text-white transition' }}">Contact</a>
                </div>

                <div class="flex gap-4 items-center">
                    @auth
                        @php
                            $dashboardRoute = 'dashboard';
                            if(auth()->user()->role) {
                                $dashboardRoute = auth()->user()->role . '.dashboard';
                            }
                        @endphp
                        <a href="{{ route($dashboardRoute) }}" class="px-5 py-2 text-sm font-medium bg-white/10 hover:bg-white/20 rounded-lg text-white transition border border-white/10 shadow-lg backdrop-blur-sm">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="px-5 py-2 text-sm font-medium text-white hover:text-indigo-300 transition">
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="px-5 py-2 text-sm font-medium bg-indigo-600 hover:bg-indigo-500 rounded-lg shadow-[0_0_15px_rgba(79,70,229,0.5)] text-white transition active:scale-95">
                            Register
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    {{-- Main Content --}}
    <main class="relative z-10 flex-grow w-full">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="border-t border-white/10 relative z-10 shrink-0 mt-auto backdrop-blur-sm bg-black/20">
        <div class="max-w-7xl mx-auto px-6 py-12">
            <div class="grid md:grid-cols-3 gap-8">
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-8 h-8 rounded-full bg-gradient-to-tr from-blue-500 to-indigo-500 flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path></svg>
                        </div>
                        <span class="text-xl font-bold tracking-widest text-white">LCS</span>
                    </div>
                    <p class="text-slate-400 text-sm leading-relaxed">
                        Connecting clients with verified, professional lawyers securely across Bangladesh through technology.
                    </p>
                </div>

                <div>
                    <h3 class="font-bold text-white mb-4">Quick Links</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('home') }}" class="text-slate-400 hover:text-indigo-400 transition">Home</a></li>
                        <li><a href="{{ route('lawyers.index') }}" class="text-slate-400 hover:text-indigo-400 transition">Find Lawyers</a></li>
                        <li><a href="{{ route('about') }}" class="text-slate-400 hover:text-indigo-400 transition">About Us</a></li>
                        <li><a href="{{ route('contact') }}" class="text-slate-400 hover:text-indigo-400 transition">Contact</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="font-bold text-white mb-4">Support</h3>
                    <ul class="space-y-2 text-sm text-slate-400 flex flex-col">
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            support@legalcasesystem.test
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            +880 1234 567890
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-white/10 mt-10 pt-6 text-center text-slate-500 text-sm">
                © {{ date('Y') }} Legal Case System. Developed for the Laravel Web Programming Course.
            </div>
        </div>
    </footer>
</body>
</html>