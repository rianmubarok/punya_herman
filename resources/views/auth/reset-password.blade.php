<x-guest-layout>
    <div class="bg-gradient-to-br from-blue-50 to-purple-100 min-h-screen flex items-center justify-center py-10">
        <div class="max-w-md w-full bg-gradient-to-br from-white via-blue-50 to-purple-100 p-8 md:p-10 rounded-2xl shadow-lg border border-blue-200 transition-all duration-300">
            <div class="flex flex-col items-center mb-6">
                <img src="https://undraw.co/api/illustrations/reset_password.svg" alt="Reset Password Illustration" class="w-28 h-28 mb-4 animate-fade-in" loading="lazy">
                <h1 class="text-2xl md:text-3xl font-bold mb-2 text-blue-900 drop-shadow text-center">Reset Password</h1>
            </div>
            <x-validation-errors class="mb-4" />
            <form method="POST" action="{{ route('password.update') }}" class="space-y-5 animate-fade-in">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <div>
                    <label class="block font-semibold mb-1 text-blue-800">Email</label>
                    <input id="email" class="block mt-1 w-full border border-purple-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-300 focus:border-blue-400 transition-all duration-200" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                </div>
                <div>
                    <label class="block font-semibold mb-1 text-blue-800">Password Baru</label>
                    <input id="password" class="block mt-1 w-full border border-purple-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-300 focus:border-blue-400 transition-all duration-200" type="password" name="password" required autocomplete="new-password" />
                </div>
                <div>
                    <label class="block font-semibold mb-1 text-blue-800">Konfirmasi Password</label>
                    <input id="password_confirmation" class="block mt-1 w-full border border-purple-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-300 focus:border-blue-400 transition-all duration-200" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>
                <div class="flex gap-3 mt-6">
                    <button type="submit" class="px-6 py-2 bg-gradient-to-r from-blue-500 to-purple-500 text-white font-semibold rounded-lg shadow hover:from-blue-600 hover:to-purple-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 transition-all duration-200 transform hover:scale-105 w-full">Reset Password</button>
                </div>
            </form>
            <div class="mt-6 text-center animate-fade-in">
                <a href="{{ route('login') }}" class="text-blue-600 hover:text-purple-600 font-semibold transition-colors">Kembali ke Login</a>
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
