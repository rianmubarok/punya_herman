<x-app-layout>
    <div class="bg-gradient-to-br from-blue-50 to-purple-100 min-h-screen py-10 flex items-center justify-center">
        <div class="max-w-lg w-full bg-gradient-to-br from-white via-blue-50 to-purple-100 p-8 rounded-xl shadow border border-blue-200">
            <h1 class="text-2xl font-bold mb-4 text-blue-900">Edit Profil</h1>
            <form method="POST" action="{{ route('profile.update') }}" class="space-y-5">
                @csrf
                @method('PUT')
                <div>
                    <label class="block font-semibold mb-1 text-blue-800">Nama</label>
                    <input id="name" class="block mt-1 w-full border border-purple-200 rounded px-3 py-2 focus:ring focus:ring-blue-200" type="text" name="name" value="{{ old('name', Auth::user()->name) }}" required autofocus />
                    @error('name') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label class="block font-semibold mb-1 text-blue-800">Email</label>
                    <input id="email" class="block mt-1 w-full border border-purple-200 rounded px-3 py-2 focus:ring focus:ring-blue-200" type="email" name="email" value="{{ old('email', Auth::user()->email) }}" required />
                    @error('email') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                </div>
                <div class="flex gap-3 mt-6">
                    <button type="submit" class="px-6 py-2 bg-gradient-to-r from-blue-500 to-purple-500 text-white font-semibold rounded shadow hover:from-blue-600 hover:to-purple-600 transition w-full">Simpan</button>
                    <a href="{{ route('profile.show') }}" class="px-6 py-2 bg-gray-300 text-gray-700 font-semibold rounded shadow hover:bg-gray-400 transition w-full text-center">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout> 