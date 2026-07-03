<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LegalConnect Bangladesh</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    {{-- Navbar --}}
    <nav class="bg-white shadow">

        <div class="max-w-7xl mx-auto px-6">

            <div class="flex justify-between items-center h-16">

                <a href="{{ route('home') }}"
                   class="text-2xl font-bold text-blue-700">

                    ⚖️ LegalConnect

                </a>

                <div class="hidden md:flex items-center gap-8">

                    <a href="{{ route('home') }}"
                       class="hover:text-blue-600">
                        Home
                    </a>

                    <a href="{{ route('lawyers.index') }}"
                       class="hover:text-blue-600">
                        Browse Lawyers
                    </a>

                    <a href="{{ route('about') }}"
                       class="hover:text-blue-600">
                        About
                    </a>

                    <a href="{{ route('contact') }}"
                       class="hover:text-blue-600">
                        Contact
                    </a>

                </div>

                <div class="flex gap-3">

                    @auth

                        <a href="{{ route(auth()->user()->role.'.dashboard') }}"
                           class="bg-blue-600 text-white px-4 py-2 rounded">

                            Dashboard

                        </a>

                    @else

                        <a href="{{ route('login') }}"
                           class="px-4 py-2 border rounded">

                            Login

                        </a>

                        <a href="{{ route('register') }}"
                           class="bg-blue-600 text-white px-4 py-2 rounded">

                            Register

                        </a>

                    @endauth

                </div>

            </div>

        </div>

    </nav>

    {{-- Main Content --}}
    <main>

        @yield('content')

    </main>

    {{-- Footer --}}
    <footer class="bg-gray-900 text-white mt-16">

        <div class="max-w-7xl mx-auto px-6 py-12">

            <div class="grid md:grid-cols-3 gap-8">

                <div>

                    <h2 class="text-2xl font-bold mb-4">

                        ⚖️ LegalConnect

                    </h2>

                    <p class="text-gray-400">

                        Connecting clients with trusted lawyers across Bangladesh.

                    </p>

                </div>

                <div>

                    <h3 class="font-bold mb-4">

                        Quick Links

                    </h3>

                    <ul class="space-y-2">

                        <li>
                            <a href="{{ route('home') }}">Home</a>
                        </li>

                        <li>
                            <a href="{{ route('lawyers.index') }}">Browse Lawyers</a>
                        </li>

                        <li>
                            <a href="{{ route('about') }}">About</a>
                        </li>

                        <li>
                            <a href="{{ route('contact') }}">Contact</a>
                        </li>

                    </ul>

                </div>

                <div>

                    <h3 class="font-bold mb-4">

                        Contact

                    </h3>

                    <p>Email: support@legalconnect.com</p>

                    <p>Phone: +880 1XXXXXXXXX</p>

                </div>

            </div>

            <div class="border-t border-gray-700 mt-10 pt-6 text-center text-gray-400">

                © {{ date('Y') }} LegalConnect Bangladesh.
                All Rights Reserved.

            </div>

        </div>

    </footer>

</body>

</html>