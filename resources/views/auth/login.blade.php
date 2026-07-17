<x-guest-layout>
    <div class="text-center mb-8">
        <h2 class="text-3xl font-extrabold text-white mb-2">Welcome Back</h2>
        <p class="text-sm text-indigo-300">Sign in to manage your legal cases.</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-medium text-slate-300 mb-1">Email Address</label>
            <input id="email" class="block w-full rounded-xl bg-slate-900/50 border border-slate-700/50 text-white placeholder-slate-400 focus:border-indigo-500 focus:ring-indigo-500 dark:bg-slate-900/50" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Enter your email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
        </div>

        <!-- Password -->
        <div>
            <div class="flex justify-between items-center mb-1">
                <label for="password" class="block text-sm font-medium text-slate-300">Password</label>
                @if (Route::has('password.request'))
                    <a class="text-xs text-indigo-400 hover:text-indigo-300 transition-colors" href="{{ route('password.request') }}">
                        Forgot password?
                    </a>
                @endif
            </div>
            
            <input id="password" class="block w-full rounded-xl bg-slate-900/50 border border-slate-700/50 text-white placeholder-slate-400 focus:border-indigo-500 focus:ring-indigo-500 dark:bg-slate-900/50"
                            type="password"
                            name="password"
                            required autocomplete="current-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center mt-2">
            <input id="remember_me" type="checkbox" class="w-4 h-4 rounded bg-slate-900 border-slate-600 text-indigo-500 focus:ring-indigo-500 focus:ring-offset-slate-900" name="remember">
            <label for="remember_me" class="ms-2 text-sm text-slate-300 cursor-pointer select-none">
                Remember my device
            </label>
        </div>

        <div class="pt-2">
            <button class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-lg text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 focus:ring-offset-slate-900 transition-all active:scale-95">
                Sign In
            </button>
        </div>
        
        <p class="mt-6 text-center text-sm text-slate-400">
            Don't have an account? 
            <a href="{{ route('register') }}" class="font-medium text-indigo-400 hover:text-indigo-300 transition-colors">Register now</a>
        </p>
    </form>
</x-guest-layout>
