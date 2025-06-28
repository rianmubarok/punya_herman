<x-guest-layout>
    <div class="bg-gradient-to-br from-blue-50 to-purple-100 min-h-screen flex items-center justify-center py-10">
        <div class="max-w-md w-full bg-gradient-to-br from-white via-blue-50 to-purple-100 p-8 md:p-10 rounded-2xl shadow-lg border border-blue-200 transition-all duration-300">
            <div class="flex flex-col items-center mb-6">
                <img src="https://undraw.co/api/illustrations/email_sent.svg" alt="Verify Email Illustration" class="w-28 h-28 mb-4 animate-fade-in" loading="lazy">
                <h1 class="text-2xl md:text-3xl font-bold mb-2 text-blue-900 drop-shadow text-center">Verifikasi Email</h1>
            </div>
            <div class="mb-4 text-sm text-gray-600 text-center">
                Sebelum melanjutkan, silakan verifikasi email Anda dengan mengklik link yang telah dikirimkan ke email Anda. Jika belum menerima email, kami dapat mengirim ulang.
            </div>
            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600 text-center">
                    Link verifikasi baru telah dikirim ke email Anda.
                </div>
            @endif
            <div class="mt-4 flex flex-col md:flex-row items-center justify-between gap-4 animate-fade-in">
                <form method="POST" action="{{ route('verification.send') }}" class="w-full md:w-auto">
                    @csrf
                    <button type="submit" class="w-full md:w-auto px-6 py-2 bg-gradient-to-r from-blue-500 to-purple-500 text-white font-semibold rounded-lg shadow hover:from-blue-600 hover:to-purple-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 transition-all duration-200 transform hover:scale-105">Kirim Ulang Email Verifikasi</button>
                </form>
                <div class="flex flex-col md:flex-row gap-2 w-full md:w-auto justify-center items-center">
                    <a href="{{ route('profile.show') }}" class="underline text-sm text-blue-600 hover:text-purple-600 font-semibold transition-colors">Edit Profil</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="underline text-sm text-blue-600 hover:text-purple-600 font-semibold transition-colors ms-2">Logout</button>
                    </form>
                </div>
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
