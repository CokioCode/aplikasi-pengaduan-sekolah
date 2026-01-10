<x-app-layout>
    <div class="py-6">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-wrap gap-4 mb-6">
                <div class="flex-1 min-w-[200px] bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-gray-600 text-sm">Total Aspirasi</div>
                    <div class="text-3xl font-bold text-blue-600">{{ $totalAspirasi }}</div>
                </div>

                <div class="flex-1 min-w-[200px] bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-gray-600 text-sm">Baru</div>
                    <div class="text-3xl font-bold text-yellow-600">{{ $aspirasiBaru }}</div>
                </div>

                <div class="flex-1 min-w-[200px] bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-gray-600 text-sm">Diproses</div>
                    <div class="text-3xl font-bold text-orange-600">{{ $aspirasiDiproses }}</div>
                </div>

                <div class="flex-1 min-w-[200px] bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-gray-600 text-sm">Selesai</div>
                    <div class="text-3xl font-bold text-green-600">{{ $aspirasiSelesai }}</div>
                </div>
            </div>


            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6 p-6">
                <h3 class="text-lg font-semibold mb-4">Quick Action</h3>
                <a href="{{ route('siswa.aspirasi.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700">
                    + Buat Aspirasi Baru
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">Aspirasi Terbaru Saya</h3>
                    <div class="space-y-4">
                        @forelse($recentAspirasi as $aspirasi)
                            <div class="border rounded-lg p-4 hover:bg-gray-50 transition">
                                <div class="flex justify-between items-start">
                                    <div class="flex-1">
                                        <h4 class="font-semibold text-gray-900">{{ $aspirasi->judul_aspirasi }}</h4>
                                        <p class="text-sm text-gray-600 mt-1">
                                            {{ Str::limit($aspirasi->isi_aspirasi, 100) }}</p>
                                        <div class="mt-2 flex items-center space-x-4 text-xs text-gray-500">
                                            <span>{{ $aspirasi->tanggal_aspirasi->format('d M Y') }}</span>
                                            <span>{{ $aspirasi->kategori->nama_kategori }}</span>
                                            @if ($aspirasi->umpanBalik->count() > 0)
                                                <span class="text-blue-600">{{ $aspirasi->umpanBalik->count() }} Umpan
                                                    Balik</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <span
                                            class="px-2 py-1 text-xs font-semibold rounded-full
                                        @if ($aspirasi->status == 'baru') bg-yellow-100 text-yellow-800
                                        @elseif($aspirasi->status == 'diproses') bg-blue-100 text-blue-800
                                        @else bg-green-100 text-green-800 @endif">
                                            {{ ucfirst($aspirasi->status) }}
                                        </span>
                                        <a href="{{ route('siswa.aspirasi.show', $aspirasi->id) }}"
                                            class="block mt-2 text-blue-600 hover:text-blue-900 text-sm">
                                            Lihat Detail →
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-gray-500 py-8">Belum ada aspirasi. <a
                                    href="{{ route('siswa.aspirasi.create') }}"
                                    class="text-blue-600 hover:underline">Buat aspirasi pertama Anda!</a></p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
