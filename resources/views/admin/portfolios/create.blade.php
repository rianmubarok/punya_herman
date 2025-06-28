<x-app-layout>
    <div class="bg-gradient-to-br from-blue-50 to-purple-100 min-h-screen py-6 flex items-center justify-center">
        <div class="max-w-xl w-full bg-white p-8 rounded-2xl shadow-lg border border-blue-200 animate-fade-in">
            <div class="flex flex-col items-center mb-4">
                <img src="https://undraw.co/api/illustrations/add_files.svg" alt="Add Portfolio Illustration" class="w-20 h-20 mb-2" loading="lazy">
                <h1 class="text-2xl font-bold text-blue-900 text-center">Tambah Portofolio</h1>
            </div>
            <form action="{{ route('admin.portfolios.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5 animate-fade-in">
                @csrf
                <div>
                    <label class="block font-semibold mb-1 text-blue-800">User:</label>
                    <select name="user_id" required class="w-full border border-purple-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-300 focus:border-blue-400 transition-all duration-200">
                        <option value="">-- Pilih User --</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                        @endforeach
                    </select>
                    @error('user_id') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label class="block font-semibold mb-1 text-blue-800">Judul:</label>
                    <input type="text" name="title" value="{{ old('title') }}" required class="w-full border border-purple-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-300 focus:border-blue-400 transition-all duration-200">
                    @error('title') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label class="block font-semibold mb-1 text-blue-800">Deskripsi:</label>
                    <textarea name="description" required class="w-full border border-purple-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-300 focus:border-blue-400 transition-all duration-200">{{ old('description') }}</textarea>
                    @error('description') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label class="block font-semibold mb-1 text-blue-800">Skill (pisahkan dengan koma):</label>
                    <input type="text" name="skills" value="{{ old('skills') }}" class="w-full border border-purple-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-300 focus:border-blue-400 transition-all duration-200">
                    @error('skills') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label class="block font-semibold mb-1 text-blue-800">Gambar (opsional):</label>
                    <input type="file" name="image" class="w-full border border-purple-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-300 focus:border-blue-400 transition-all duration-200">
                    @error('image') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label class="block font-semibold mb-1 text-blue-800">Link Proyek (opsional):</label>
                    <input type="url" name="project_link" value="{{ old('project_link') }}" class="w-full border border-purple-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-300 focus:border-blue-400 transition-all duration-200">
                    @error('project_link') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                </div>
                <div class="flex gap-3 mt-6">
                    <button type="submit" class="px-6 py-2 bg-gradient-to-r from-blue-500 to-purple-500 text-white font-semibold rounded-lg shadow hover:from-blue-600 hover:to-purple-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 transition-all duration-200 transform hover:scale-105">Simpan</button>
                    <a href="{{ route('admin.portfolios.index') }}" class="px-6 py-2 bg-gray-300 text-gray-700 font-semibold rounded-lg shadow hover:bg-gray-400 transition-all duration-200">Batal</a>
                </div>
            </form>
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