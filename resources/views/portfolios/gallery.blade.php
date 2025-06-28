<x-app-layout>
    <h1 class="text-2xl font-bold mb-6 text-blue-900 text-center">Galeri Portofolio</h1>
    <form method="GET" class="mb-6 flex flex-wrap gap-2 items-center justify-center">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari judul..." class="border rounded px-3 py-2" />
        <select name="user_id" class="border rounded px-3 py-2">
            <option value="">Semua User</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ request('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
            @endforeach
        </select>
        <button type="submit" class="px-4 py-2 bg-gradient-to-r from-blue-500 to-purple-500 text-white rounded shadow hover:from-blue-600 hover:to-purple-600 transition">Filter</button>
        @if(request('q') || request('user_id'))
            <a href="{{ route('portfolios.gallery') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 transition">Reset</a>
        @endif
    </form>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($portfolios as $portfolio)
            <div class="bg-white rounded-2xl shadow p-4 flex flex-col hover:shadow-2xl hover:scale-105 transition-all duration-300">
                @if($portfolio->image)
                    <img src="{{ asset('storage/'.$portfolio->image) }}" alt="Gambar" class="mb-2 rounded h-40 object-cover w-full border border-purple-200">
                @else
                    <img src="https://laravel.com/img/logomark.min.svg" alt="Logo Jetstream" class="mb-2 rounded h-40 object-cover w-full border border-purple-200 bg-white p-4">
                @endif
                <h2 class="font-semibold text-lg mb-1 text-blue-800">{{ $portfolio->title }}</h2>
                <div class="mb-1 flex flex-wrap gap-1">
                    @foreach(explode(',', $portfolio->skills) as $skill)
                        @if(trim($skill) !== '')
                            <span class="inline-block bg-gradient-to-r from-green-200 via-blue-200 to-purple-200 text-green-800 text-xs px-2 py-1 rounded-full font-semibold shadow">{{ trim($skill) }}</span>
                        @endif
                    @endforeach
                </div>
                <div class="text-sm text-gray-500 mb-1">Oleh: {{ $portfolio->user->name ?? '-' }}<br><span class="text-xs">{{ $portfolio->user->email ?? '' }}</span></div>
                <div class="text-xs text-gray-400 mb-2">{{ $portfolio->created_at->format('d M Y') }}</div>
                <div class="mb-2 line-clamp-3">{{ Str::limit($portfolio->description, 80) }}</div>
                @if($portfolio->project_link)
                    <a href="{{ $portfolio->project_link }}" target="_blank" class="text-blue-500 underline mb-2 hover:text-purple-600 transition-colors">Lihat Proyek</a>
                @endif
                <a href="{{ route('user.portfolios.show', $portfolio->id) }}" class="mt-auto inline-block px-3 py-1 bg-gradient-to-r from-blue-500 to-purple-500 text-white rounded shadow hover:from-blue-600 hover:to-purple-600 transition">Detail</a>
            </div>
        @empty
            <div class="col-span-4 text-center text-gray-500">Belum ada portofolio.</div>
        @endforelse
    </div>
    <div class="mt-6 flex justify-center">{{ $portfolios->links() }}</div>
</x-app-layout> 