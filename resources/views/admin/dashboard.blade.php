<x-app-layout>
    <div class="bg-gradient-to-br from-blue-100 via-purple-100 to-pink-100 min-h-screen py-10">
        <div class="flex flex-col items-center mb-8 animate-fade-in">
            <img src="https://laravel.com/img/logomark.min.svg" alt="Logo Jetstream" class="w-32 h-32 mb-4 bg-white p-4 rounded-full shadow" loading="lazy">
            <h1 class="text-3xl font-bold text-blue-900 text-center drop-shadow-lg">Dashboard Admin</h1>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10 max-w-4xl mx-auto animate-fade-in">
            <div class="p-6 bg-gradient-to-r from-blue-400 to-blue-600 text-white rounded-2xl shadow-2xl flex flex-col items-center border-4 border-blue-200 transition-all duration-300 hover:scale-105">
                <div class="text-lg">Total User</div>
                <div class="text-4xl font-bold">{{ $userCount }}</div>
            </div>
            <div class="p-6 bg-gradient-to-r from-purple-400 to-pink-500 text-white rounded-2xl shadow-2xl flex flex-col items-center border-4 border-purple-200 transition-all duration-300 hover:scale-105">
                <div class="text-lg">Total Portofolio</div>
                <div class="text-4xl font-bold">{{ $portfolioCount }}</div>
            </div>
        </div>
        <div class="max-w-5xl mx-auto animate-fade-in">
            <h2 class="text-xl font-semibold mb-2 text-blue-800">Daftar User</h2>
            <div class="overflow-x-auto mb-8">
                <table class="min-w-full bg-gradient-to-br from-white via-blue-50 to-purple-100 rounded-xl shadow-lg border-2 border-blue-200">
                    <thead class="bg-gradient-to-r from-blue-200 to-blue-100">
                        <tr>
                            <th class="px-4 py-2">Nama</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Role</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr class="hover:bg-blue-100 transition-all duration-200">
                                <td class="border px-4 py-2">{{ $user->name }}</td>
                                <td class="border px-4 py-2">{{ $user->email }}</td>
                                <td class="border px-4 py-2">{{ $user->role }}</td>
                                <td class="border px-4 py-2">
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Yakin hapus user ini?')" style="display:inline;">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="px-3 py-1 bg-gradient-to-r from-red-500 to-pink-500 text-white rounded shadow hover:from-red-600 hover:to-pink-600 text-xs font-semibold transition-all duration-200">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <h2 class="text-xl font-semibold mb-2 text-purple-800">Daftar Portofolio</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-gradient-to-br from-white via-blue-50 to-purple-100 rounded-xl shadow-lg border-2 border-purple-200">
                    <thead class="bg-gradient-to-r from-purple-200 to-pink-100">
                        <tr>
                            <th class="px-4 py-2">Judul</th>
                            <th class="px-4 py-2">Pemilik</th>
                            <th class="px-4 py-2">Link Proyek</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($portfolios as $portfolio)
                            <tr class="hover:bg-purple-100 transition-all duration-200">
                                <td class="border px-4 py-2 font-semibold text-blue-800">{{ $portfolio->title }}</td>
                                <td class="border px-4 py-2">{{ $portfolio->user->name ?? '-' }}</td>
                                <td class="border px-4 py-2">
                                    @if($portfolio->project_link)
                                        <a href="{{ $portfolio->project_link }}" target="_blank" class="text-blue-500 underline hover:text-purple-600 transition-colors">Lihat</a>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('user.portfolios.show', $portfolio->id) }}" class="px-3 py-1 bg-gradient-to-r from-blue-500 to-purple-500 text-white rounded shadow hover:from-blue-600 hover:to-purple-600 text-xs font-semibold transition-all duration-200" target="_blank">Lihat</a>
                                    <form action="{{ route('admin.portfolios.destroy', $portfolio) }}" method="POST" onsubmit="return confirm('Yakin hapus portofolio ini?')" style="display:inline;">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="px-3 py-1 bg-gradient-to-r from-red-500 to-pink-500 text-white rounded shadow hover:from-red-600 hover:to-pink-600 text-xs font-semibold transition-all duration-200 ml-2">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
</x-app-layout> 