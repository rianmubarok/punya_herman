<x-app-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-purple-100">
        <div class="bg-white p-8 rounded-xl shadow border border-blue-200 text-center">
            <h1 class="text-2xl font-bold mb-4 text-blue-900">Akses Ditolak</h1>
            <p class="text-gray-600">Anda tidak diizinkan untuk mengedit portofolio. Silakan hubungi admin jika ada pertanyaan.</p>
            <a href="{{ route('user.portfolios.index') }}" class="inline-block mt-6 px-6 py-2 bg-gradient-to-r from-blue-500 to-purple-500 text-white font-semibold rounded shadow hover:from-blue-600 hover:to-purple-600 transition">Kembali ke Daftar Portofolio</a>
        </div>
    </div>
</x-app-layout>