<x-app-layout>
    <div class="bg-gradient-to-br from-blue-50 to-purple-100 min-h-screen py-10 flex items-center justify-center">
        <div class="max-w-lg w-full bg-gradient-to-br from-white via-blue-50 to-purple-100 p-8 md:p-10 rounded-2xl shadow-lg border border-blue-200 text-center transition-all duration-300">
            <div class="flex flex-col items-center mb-6">
                <img src="https://undraw.co/api/illustrations/hello.svg" alt="Welcome Illustration" class="w-32 h-32 mb-4 animate-fade-in" loading="lazy">
                <h1 class="text-3xl md:text-4xl font-bold mb-2 text-blue-900 drop-shadow">Selamat Datang di Dashboard</h1>
            </div>
            <div class="mb-4 text-gray-700 text-lg">Halo, <span class="font-semibold text-purple-700">{{ Auth::user()->name }}</span>!</div>
            <div class="mb-6 text-gray-500">Kamu berhasil login. Silakan gunakan menu navigasi untuk mengelola portofolio atau data lainnya.</div>
            <a href="/portfolios" class="inline-block px-6 py-2 bg-gradient-to-r from-blue-500 to-purple-500 text-white font-semibold rounded shadow hover:from-blue-600 hover:to-purple-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 transition-all duration-200 transform hover:scale-105">Lihat Galeri Portofolio</a>
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
</x-app-layout>
