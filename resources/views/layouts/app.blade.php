<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Legal Case Management System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
<div class="min-h-screen flex">
    
    {{-- Sidebar --}}
    <aside class="w-64 bg-gray-900 text-white p-6">
        <h2 class="text-2xl font-bold mb-8">⚖️ LCMS</h2>

    <nav class="space-y-3 mt-8">

    @if(Auth::user()->role == 'admin')

        <a href="{{ route('admin.dashboard') }}" class="block p-3 rounded hover:bg-gray-700">
            🏠 Dashboard
        </a>
        <a href="{{ route('admin.cases.index') }}" class="block p-3 rounded hover:bg-gray-700">
            📂 Manage Legal Cases
        </a>

    @elseif(Auth::user()->role == 'lawyer')

        <a href="{{ route('lawyer.dashboard') }}" class="block p-3 rounded hover:bg-gray-700">
            🏠 Dashboard
        </a>
        <a href="{{ route('lawyer.cases') }}" class="block p-3 rounded hover:bg-gray-700">
            ⚖️ My Cases
        </a>
        <a href="{{ route('lawyer.profile.edit') }}" class="block p-3 rounded hover:bg-gray-700">
            👤 My Profile
        </a>

    @elseif(Auth::user()->role == 'client')

        <a href="{{ route('client.dashboard') }}" class="block p-3 rounded hover:bg-gray-700">
            🏠 Dashboard
        </a>
        <a href="{{ route('client.cases') }}" class="block p-3 rounded hover:bg-gray-700">
            ⚖️ My Legal Cases
        </a>
        <a href="{{ route('lawyers.index') }}" class="block p-3 rounded hover:bg-gray-700">
            👨‍⚖️ Browse Lawyers
        </a>

    @endif

    </nav>
    </aside>

    {{-- Main Content --}}

    <main class="flex-1 bg-gray-100">
    <header class="bg-white shadow px-8 py-4 flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold">
                Legal Case Management System
            </h1>
        </div>
        <div class="flex items-center gap-4">
            <div class="text-right">
                <p class="font-semibold">
                    {{ Auth::user()->name }}
                </p>
                <p class="text-sm text-gray-500 capitalize">
                    {{ Auth::user()->role }}
                </p>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                    Logout
                </button>
            </form>
        </div>
    </header>
    <div class="p-8">
        @yield('content')
    </div>
    </main>
</div>
</body>
</html>