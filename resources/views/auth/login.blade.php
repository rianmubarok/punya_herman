<x-guest-layout>
    <div class="bg-gradient-to-br from-blue-50 to-purple-100 min-h-screen flex items-center justify-center py-10">
        <div class="max-w-md w-full bg-gradient-to-br from-white via-blue-50 to-purple-100 p-8 md:p-10 rounded-2xl shadow-lg border border-blue-200 transition-all duration-300">
            <div class="flex flex-col items-center mb-6">
                <img src="https://laravel.com/img/logomark.min.svg" alt="Logo Jetstream" class="w-28 h-28 mb-4 animate-fade-in bg-white p-4 rounded-full shadow" loading="lazy">
                <h1 class="text-2xl md:text-3xl font-bold mb-2 text-blue-900 drop-shadow text-center">Login</h1>
            </div>
            <form method="POST" action="{{ route('login') }}" class="space-y-5 animate-fade-in">
                @csrf
                <div>
                    <label class="block font-semibold mb-1 text-blue-800">Email</label>
                    <input id="email" class="block mt-1 w-full border border-purple-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-300 focus:border-blue-400 transition-all duration-200" type="email" name="email" :value="old('email')" required autofocus />
                    @error('email') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label class="block font-semibold mb-1 text-blue-800">Password</label>
                    <input id="password" class="block mt-1 w-full border border-purple-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-300 focus:border-blue-400 transition-all duration-200" type="password" name="password" required autocomplete="current-password" />
                    @error('password') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                </div>
                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring focus:ring-blue-200">
                        <span class="ml-2 text-sm text-gray-600">Remember me</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a class="text-sm text-blue-600 hover:text-purple-600 transition-colors" href="{{ route('password.request') }}">Lupa password?</a>
                    @endif
                </div>
                <div class="flex gap-3 mt-6">
                    <button type="submit" class="px-6 py-2 bg-gradient-to-r from-blue-500 to-purple-500 text-white font-semibold rounded-lg shadow hover:from-blue-600 hover:to-purple-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 transition-all duration-200 transform hover:scale-105 w-full">Login</button>
                </div>
            </form>
            <div class="mt-6 text-center animate-fade-in">
                <span class="text-gray-600">Belum punya akun?</span>
                <a href="{{ route('register') }}" class="text-blue-600 hover:text-purple-600 font-semibold transition-colors">Register</a>
            </div>
        </div>
    </div>
    <style>
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fade-in 1s ease;
        }
    </style>
</x-guest-layout>
