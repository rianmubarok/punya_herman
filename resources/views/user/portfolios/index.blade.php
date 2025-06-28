<x-app-layout>
    <div class="bg-gradient-to-br from-blue-50 to-purple-100 min-h-screen py-6">
        <h1 class="text-2xl font-bold mb-4 text-blue-900">Daftar Portofolio Saya</h1>
        @if(session('success'))
            <div class="mb-4 p-2 bg-green-100 text-green-700 rounded shadow">{{ session('success') }}</div>
        @endif
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @forelse($portfolios as $portfolio)
                <div class="bg-gradient-to-br from-white via-blue-50 to-purple-100 border border-blue-200 rounded-xl shadow p-4 flex flex-col hover:shadow-lg transition">
                    @if($portfolio->image)
                        <img src="{{ asset('storage/'.$portfolio->image) }}" alt="Gambar" class="mb-2 rounded h-32 object-cover w-full border border-purple-200">
                    @else
                        <img src="https://laravel.com/img/logomark.min.svg" alt="Logo Jetstream" class="mb-2 rounded h-32 object-cover w-full border border-purple-200 bg-white p-4">
                    @endif
                    <h2 class="font-semibold text-lg mb-1 text-blue-800">{{ $portfolio->title }}</h2>
                    <div class="mb-1 flex flex-wrap gap-1">
                        @foreach(explode(',', $portfolio->skills) as $skill)
                            @if(trim($skill) !== '')
                                <span class="inline-block bg-purple-100 text-purple-700 text-xs px-2 py-1 rounded-full font-semibold">{{ trim($skill) }}</span>
                            @endif
                        @endforeach
                    </div>
                    <div class="text-xs text-gray-400 mb-2">{{ $portfolio->created_at->format('d M Y') }}</div>
                    <div class="flex gap-2 mt-auto flex-wrap">
                        <a href="{{ route('user.portfolios.show', $portfolio) }}" class="px-3 py-1 bg-gradient-to-r from-blue-500 to-purple-500 text-white rounded shadow hover:from-blue-600 hover:to-purple-600 text-xs font-semibold transition">Lihat</a>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center text-gray-500">Belum ada portofolio.</div>
            @endforelse
        </div>
    </div>
</x-app-layout>