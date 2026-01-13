<x-app-layout>
    <div class="py-6">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('admin.kategori.update', $kategori->id) }}">
                        @csrf
                        @method('PATCH')

                        <div class="mb-6">
                            <label for="nama_kategori" class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Kategori <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="nama_kategori" name="nama_kategori"
                                value="{{ old('nama_kategori', $kategori->nama_kategori) }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('nama_kategori') border-red-500 @enderror"
                                placeholder="Contoh: Fasilitas Kelas" required autofocus>
                            @error('nama_kategori')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6 p-4 bg-blue-50 border border-blue-200 rounded-md">
                            <div class="flex">
                                <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div class="text-sm text-blue-700">
                                    <p class="font-medium">Informasi:</p>
                                    <p>Kategori ini saat ini digunakan oleh <strong>{{ $kategori->aspirasi()->count() }}
                                            aspirasi</strong></p>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end space-x-3">
                            <a href="{{ route('admin.kategori.index') }}"
                                class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">
                                Batal
                            </a>
                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                Update Kategori
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
