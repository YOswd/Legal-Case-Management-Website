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
        <a href="{{ route('admin.users.index') }}" class="block p-3 rounded hover:bg-gray-700">
            👥 Manage Users
        </a>

    @elseif(Auth::user()->role == 'lawyer')

        <a href="{{ route('lawyer.dashboard') }}" class="block p-3 rounded hover:bg-gray-700">
            🏠 Dashboard
        </a>
        <a href="{{ route('lawyer.requests') }}" class="block p-3 rounded hover:bg-gray-700">
            📩 Client Requests
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
        <a href="{{ route('client.requests') }}" class="block p-3 rounded hover:bg-gray-700">
            📩 My Requests
        </a>
        <a href="{{ route('client.documents.all') }}" class="block p-3 rounded hover:bg-gray-700">
            📄 My Documents
         </a>
        <a href="{{ route('lawyers.index') }}" class="block p-3 rounded hover:bg-gray-700">
            👨‍⚖️ Browse Lawyers
        </a>

    @elseif(Auth::user()->role == 'court_clerk')

        <a href="{{ route('court_clerk.dashboard') }}" class="block p-3 rounded hover:bg-gray-700">
            🏛 Dashboard
        </a>
        <a href="{{ route('court_clerk.filings') }}" class="block p-3 rounded hover:bg-gray-700">
            📂 Pending Filings
        </a>
        <a href="{{ route('court_clerk.hearings') }}" class="block p-3 rounded hover:bg-gray-700">
            📅 Hearing Schedule
        </a>
        <a href="{{ route('court_clerk.judgments') }}" class="block p-3 rounded hover:bg-gray-700">
            ⚖ Judgments
        </a>

    @endif

    </nav>
    </aside>

    {{-- Main Content --}}

    <main class="flex-1 bg-gray-100">
    <header class="bg-white shadow px-8 py-4 flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold">
                Digital Judiciary Sytem
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

    {{-- Success Message --}}
    @if(session('success'))

        <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
            {{ session('success') }}
        </div>

    @endif

    {{-- Error Message --}}
    @if(session('error'))

        <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">

            {{ session('error') }}

        </div>

    @endif

    {{-- Validation Errors --}}
    @if($errors->any())

        <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <ul class="list-disc ml-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif

    @yield('content')
    </div>
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.querySelectorAll('.delete-form').forEach(form => {

        form.addEventListener('submit', function(e) {

            e.preventDefault();

            Swal.fire({
                title: 'Delete?',
                text: 'This action cannot be undone.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Delete'
            }).then((result) => {

                if (result.isConfirmed) {
                    form.submit();
                }

            });

        });

    });
</script>

</body>
</html>