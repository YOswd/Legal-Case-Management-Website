<x-guest-layout>
    <div class="text-center mb-8">
        <h2 class="text-3xl font-extrabold text-white mb-2">Create Account</h2>
        <p class="text-sm text-indigo-300">Join us to manage your legal cases.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-slate-300 mb-1">Full Name</label>
            <input id="name" class="block w-full rounded-xl
            bg-slate-900/50 border border-slate-700/50
            text-white placeholder-slate-400 focus:border-indigo-500
            focus:ring-indigo-500 dark:bg-slate-900/50"
            type="text" name="name" :value="old('name')"
            required autofocus autocomplete="name" placeholder="" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-400" />
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-medium text-slate-300 mb-1">Email Address</label>
            <input id="email" class="block w-full rounded-xl bg-slate-900/50 border
            border-slate-700/50 text-white placeholder-slate-400
            focus:border-indigo-500 focus:ring-indigo-500
            dark:bg-slate-900/50" type="email" name="email"
            :value="old('email')" required autocomplete="username" placeholder="Enter your email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-medium text-slate-300 mb-1">Password</label>
            <input id="password" class="block w-full rounded-xl bg-slate-900/50 border border-slate-700/50 text-white placeholder-slate-400 focus:border-indigo-500 focus:ring-indigo-500 dark:bg-slate-900/50"
                            type="password"
                            name="password"
                            required autocomplete="new-password" placeholder="" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-slate-300 mb-1">Confirm Password</label>
            <input id="password_confirmation" class="block w-full rounded-xl bg-slate-900/50 border border-slate-700/50 text-white placeholder-slate-400 focus:border-indigo-500 focus:ring-indigo-500 dark:bg-slate-900/50"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" placeholder="" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-400" />
        </div>

        <div class="pt-4">
            <button class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-lg text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 focus:ring-offset-slate-900 transition-all active:scale-95">
                Register
            </button>
        </div>

        <p class="mt-6 text-center text-sm text-slate-400">
            Already registered? 
            <a href="{{ route('login') }}" class="font-medium text-indigo-400 hover:text-indigo-300 transition-colors">Sign in here</a>
        </p>
    </form>
</x-guest-layout>
