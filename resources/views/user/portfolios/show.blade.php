<x-app-layout>
    <div class="bg-gradient-to-br from-blue-50 to-purple-100 min-h-screen py-6 flex items-center justify-center">
        <div class="max-w-xl w-full bg-gradient-to-br from-white via-blue-50 to-purple-100 p-8 rounded-2xl shadow-lg border border-blue-200 animate-fade-in">
            <div class="flex flex-col items-center mb-4">
                <img src="https://undraw.co/api/illustrations/portfolio_item.svg" alt="Portfolio Detail Illustration" class="w-24 h-24 mb-2" loading="lazy">
                <h1 class="text-2xl font-bold text-blue-900 text-center">{{ $portfolio->title }}</h1>
            </div>
            <div class="mb-2 text-gray-700"><strong>Deskripsi:</strong><br>{{ $portfolio->description }}</div>
            <div class="mb-2 text-gray-700"><strong>Skill:</strong> 
                @foreach(explode(',', $portfolio->skills) as $skill)
                    @if(trim($skill) !== '')
                        <span class="inline-block bg-gradient-to-r from-green-200 via-blue-200 to-purple-200 text-green-800 text-xs px-2 py-1 rounded-full font-semibold mr-1 shadow">{{ trim($skill) }}</span>
                    @endif
                @endforeach
            </div>
            @if($portfolio->image)
                <img src="{{ asset('storage/'.$portfolio->image) }}" width="200" class="mb-4 rounded shadow border border-purple-200">
            @endif
            @if($portfolio->project_link)
                <div class="mb-2"><strong>Link Proyek:</strong> <a href="{{ $portfolio->project_link }}" target="_blank" class="text-blue-500 underline hover:text-purple-600 transition-colors">Lihat Proyek</a></div>
            @endif
            <div class="text-xs text-gray-400 mb-4">Dibuat: {{ $portfolio->created_at->format('d M Y') }}</div>
            <a href="{{ route('user.portfolios.index') }}" class="inline-block mt-4 px-6 py-2 bg-gradient-to-r from-green-500 via-blue-500 to-purple-500 text-white font-semibold rounded-lg shadow hover:from-green-600 hover:to-purple-600 transition-all duration-200">Kembali ke daftar</a>
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