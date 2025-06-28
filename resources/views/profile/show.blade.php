<x-app-layout>
    <div class="bg-gradient-to-br from-blue-50 to-purple-100 min-h-screen py-10 flex items-center justify-center">
        <div class="max-w-lg w-full bg-gradient-to-br from-white via-blue-50 to-purple-100 p-8 rounded-xl shadow border border-blue-200 text-center">
            <h1 class="text-2xl font-bold mb-4 text-blue-900">Profil Saya</h1>
            <div class="mb-4 text-gray-700">Nama: <span class="font-semibold text-purple-700">{{ Auth::user()->name }}</span></div>
            <div class="mb-4 text-gray-700">Email: <span class="font-semibold text-blue-700">{{ Auth::user()->email }}</span></div>
            <div class="mb-6 text-gray-500">Kelola data profil dan keamanan akun Anda di sini.</div>
            {{-- <a href="{{ route('profile.edit') }}" class="px-6 py-2 bg-gradient-to-r from-blue-500 to-purple-500 text-white font-semibold rounded shadow hover:from-blue-600 hover:to-purple-600 transition">Edit Profil</a> --}}
        </div>
    </div>
</x-app-layout>
