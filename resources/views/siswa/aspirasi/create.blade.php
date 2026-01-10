<x-app-layout>
    <div class="py-6">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('siswa.aspirasi.store') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="id_kategori" class="block text-sm font-medium text-gray-700 mb-2">
                                Kategori Aspirasi <span class="text-red-500">*</span>
                            </label>
                            <select id="id_kategori" name="id_kategori"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategori as $kat)
                                    <option value="{{ $kat->id }}"
                                        {{ old('id_kategori') == $kat->id_kategori ? 'selected' : '' }}>
                                        {{ $kat->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_kategori')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="judul_aspirasi" class="block text-sm font-medium text-gray-700 mb-2">
                                Judul Aspirasi <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="judul_aspirasi" name="judul_aspirasi"
                                value="{{ old('judul_aspirasi') }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Contoh: Kerusakan Kursi di Kelas XII IPA 1" required>
                            @error('judul_aspirasi')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="isi_aspirasi" class="block text-sm font-medium text-gray-700 mb-2">
                                Isi Aspirasi <span class="text-red-500">*</span>
                            </label>
                            <textarea id="isi_aspirasi" name="isi_aspirasi" rows="6"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Jelaskan detail aspirasi Anda..." required>{{ old('isi_aspirasi') }}</textarea>
                            @error('isi_aspirasi')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end space-x-3">
                            <a href="{{ route('siswa.aspirasi.index') }}"
                                class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">
                                Batal
                            </a>
                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                Kirim Aspirasi
                            </button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
