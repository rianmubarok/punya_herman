<x-app-layout>
    <div class="bg-gradient-to-br from-blue-50 to-purple-100 min-h-screen py-6">
        <div class="flex flex-col items-center mb-6 animate-fade-in">
            <img src="https://undraw.co/api/illustrations/portfolio_update.svg" alt="Portfolio Illustration" class="w-28 h-28 mb-2" loading="lazy">
            <h1 class="text-2xl font-bold text-blue-900 text-center">Kelola Portofolio</h1>
        </div>
        <a href="{{ route('admin.portfolios.create') }}" class="inline-block mb-4 px-4 py-2 bg-gradient-to-r from-blue-500 to-purple-500 text-white rounded shadow hover:from-blue-600 hover:to-purple-600 font-semibold transition-all duration-200 animate-fade-in">Tambah Portofolio</a>
        @if(session('success'))
            <div class="mb-4 p-2 bg-green-100 text-green-700 rounded shadow animate-fade-in">{{ session('success') }}</div>
        @endif
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 animate-fade-in">
            @forelse($portfolios as $portfolio)
                <div class="bg-gradient-to-br from-white via-blue-50 to-purple-100 border border-blue-200 rounded-2xl shadow p-4 flex flex-col hover:shadow-2xl hover:scale-105 transition-all duration-300">
                    @if($portfolio->image)
                        <img src="{{ asset('storage/'.$portfolio->image) }}" alt="Gambar" class="mb-2 rounded h-32 object-cover w-full border border-purple-200">
                    @endif
                    <h2 class="font-semibold text-lg mb-1 text-blue-800">{{ $portfolio->title }}</h2>
                    <div class="mb-1 flex flex-wrap gap-1">
                        @foreach(explode(',', $portfolio->skills) as $skill)
                            @if(trim($skill) !== '')
                                <span class="inline-block bg-purple-100 text-purple-700 text-xs px-2 py-1 rounded-full font-semibold">{{ trim($skill) }}</span>
                            @endif
                        @endforeach
                    </div>
                    <div class="text-sm text-gray-500 mb-1">User: {{ $portfolio->user->name ?? '-' }}</div>
                    <div class="text-xs text-gray-400 mb-2">{{ $portfolio->created_at->format('d M Y') }}</div>
                    <div class="mb-2 line-clamp-2">{{ Str::limit($portfolio->description, 60) }}</div>
                    <div class="flex gap-2 mt-auto flex-wrap">
                        <a href="{{ route('admin.portfolios.show', $portfolio) }}" class="px-3 py-1 bg-gradient-to-r from-blue-500 to-purple-500 text-white rounded shadow hover:from-blue-600 hover:to-purple-600 text-xs font-semibold transition-all duration-200">Lihat</a>
                        <a href="{{ route('admin.portfolios.edit', $portfolio) }}" class="px-3 py-1 bg-gradient-to-r from-yellow-400 to-yellow-600 text-white rounded shadow hover:from-yellow-500 hover:to-yellow-700 text-xs font-semibold transition-all duration-200">Edit</a>
                        <form action="{{ route('admin.portfolios.destroy', $portfolio) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin hapus?')" class="px-3 py-1 bg-gradient-to-r from-red-500 to-pink-500 text-white rounded shadow hover:from-red-600 hover:to-pink-600 text-xs font-semibold transition-all duration-200">Hapus</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-4 text-center text-gray-500 animate-fade-in">Belum ada portofolio.</div>
            @endforelse
        </div>
        <div class="mt-6 animate-fade-in">{{ $portfolios->links() }}</div>
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