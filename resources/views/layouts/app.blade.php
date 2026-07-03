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

        <h2 class="text-2xl font-bold mb-8">
            ⚖️ LCMS
        </h2>

        <nav class="space-y-3 mt-8">

    <a href="#" class="block p-3 rounded hover:bg-gray-700">
        🏠 Dashboard
    </a>

    <a href="#" class="block p-3 rounded hover:bg-gray-700">
        ⚖️ Cases
    </a>

    <a href="#" class="block p-3 rounded hover:bg-gray-700">
        👨‍⚖️ Lawyers
    </a>

    <a href="#" class="block p-3 rounded hover:bg-gray-700">
        📄 Reports
    </a>

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

                <button
                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">

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