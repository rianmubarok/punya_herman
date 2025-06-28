<x-app-layout>
    <div class="bg-gradient-to-br from-blue-100 via-purple-100 to-pink-100 min-h-screen py-10 flex items-center justify-center">
        <div class="max-w-lg w-full bg-gradient-to-br from-white via-blue-50 to-purple-100 p-8 rounded-2xl shadow-2xl border-4 border-blue-200 text-center animate-fade-in">
            <div class="flex flex-col items-center mb-4">
                <img src="https://undraw.co/api/illustrations/user_dashboard.svg" alt="User Dashboard Illustration" class="w-28 h-28 mb-2" loading="lazy">
                <h1 class="text-3xl font-bold mb-4 text-blue-900 drop-shadow-lg">Dashboard User</h1>
            </div>
            <div class="mb-4 text-gray-700 text-lg">Halo, <span class="font-semibold text-purple-700">{{ Auth::user()->name }}</span>!</div>
            <div class="mb-6 text-gray-500">Kelola portofolio kamu dengan mudah dan tampilkan karya terbaikmu di galeri.</div>
            <a href="{{ route('user.portfolios.index') }}" class="px-6 py-2 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 text-white font-semibold rounded-lg shadow hover:from-blue-600 hover:to-pink-600 transition-all duration-200 transform hover:scale-105">Kelola Portofolio Saya</a>
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