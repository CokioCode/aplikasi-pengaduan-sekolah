<x-app-layout>
    <div class="py-6">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-gray-600 text-sm">Total Aspirasi</div>
                    <div class="text-3xl font-bold text-blue-600">{{ $statistics['total'] }}</div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-gray-600 text-sm">Status Baru</div>
                    <div class="text-3xl font-bold text-yellow-600">{{ $statistics['baru'] }}</div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-gray-600 text-sm">Diproses</div>
                    <div class="text-3xl font-bold text-orange-600">{{ $statistics['diproses'] }}</div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-gray-600 text-sm">Selesai</div>
                    <div class="text-3xl font-bold text-green-600">{{ $statistics['selesai'] }}</div>
                </div>
            </div>


            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">Daftar Aspirasi Saya</h3>

                    @if ($aspirasi->count() > 0)
                        <div class="space-y-4">
                            @foreach ($aspirasi as $item)
                                <div class="border rounded-lg p-4 hover:bg-gray-50 transition">
                                    <div class="flex justify-between items-start">
                                        <div class="flex-1">

                                            <div class="flex items-center space-x-3 mb-2">
                                                <h4 class="font-semibold text-gray-900 text-lg">
                                                    {{ $item->judul_aspirasi }}</h4>
                                                <span
                                                    class="px-2 py-1 text-xs font-semibold rounded-full
                                                @if ($item->status == 'baru') bg-yellow-100 text-yellow-800
                                                @elseif($item->status == 'diproses') bg-blue-100 text-blue-800
                                                @else bg-green-100 text-green-800 @endif">
                                                    {{ ucfirst($item->status) }}
                                                </span>
                                            </div>


                                            <p class="text-sm text-gray-600 mb-3">
                                                {{ Str::limit($item->isi_aspirasi, 150) }}</p>


                                            <div class="flex items-center space-x-4 text-xs text-gray-500">
                                                <span class="flex items-center">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                        </path>
                                                    </svg>
                                                    {{ $item->tanggal_aspirasi->format('d M Y') }}
                                                </span>
                                                <span class="flex items-center">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                                        </path>
                                                    </svg>
                                                    {{ $item->kategori->nama_kategori }}
                                                </span>
                                                @if ($item->umpanBalik->count() > 0)
                                                    <span class="flex items-center text-blue-600 font-medium">
                                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                                            </path>
                                                        </svg>
                                                        {{ $item->umpanBalik->count() }} Umpan Balik
                                                    </span>
                                                @endif
                                                @if ($item->progresPerbaikan->count() > 0)
                                                    <span class="flex items-center text-green-600 font-medium">
                                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                                            </path>
                                                        </svg>
                                                        {{ $item->progresPerbaikan->count() }} Progres Update
                                                    </span>
                                                @endif
                                            </div>


                                            @if ($item->umpanBalik->count() > 0)
                                                <div class="mt-3 p-3 bg-blue-50 border-l-4 border-blue-500 rounded">
                                                    <p class="text-xs text-gray-600 mb-1">
                                                        <strong>Umpan Balik Terakhir:</strong>
                                                    </p>
                                                    <p class="text-sm text-gray-700">
                                                        {{ Str::limit($item->umpanBalik->last()->isi_umpan_balik, 100) }}
                                                    </p>
                                                </div>
                                            @endif


                                            @if ($item->progresPerbaikan->count() > 0)
                                                <div class="mt-2 p-3 bg-green-50 border-l-4 border-green-500 rounded">
                                                    <p class="text-xs text-gray-600 mb-1">
                                                        <strong>Progres Terakhir:</strong>
                                                        <span
                                                            class="px-2 py-0.5 bg-green-200 text-green-800 rounded text-xs font-semibold">
                                                            {{ $item->progresPerbaikan->last()->status }}
                                                        </span>
                                                    </p>
                                                    <p class="text-sm text-gray-700">
                                                        {{ Str::limit($item->progresPerbaikan->last()->keterangan_progres, 100) }}
                                                    </p>
                                                </div>
                                            @endif
                                        </div>


                                        <div class="ml-4">
                                            <a href="{{ route('siswa.aspirasi.show', $item->id) }}"
                                                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 transition">
                                                Lihat Detail
                                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada aspirasi</h3>
                            <p class="mt-1 text-sm text-gray-500">Mulai dengan membuat aspirasi pertama Anda.</p>
                            <div class="mt-6">
                                <a href="{{ route('siswa.aspirasi.create') }}"
                                    class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Buat Aspirasi Baru
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>


            @if ($statistics['total'] > 0)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                    <div class="p-6">
                        <h4 class="text-sm font-semibold text-gray-700 mb-3">Filter Cepat:</h4>
                        <div class="flex flex-wrap gap-2">
                            <a href="{{ route('siswa.aspirasi.index') }}"
                                class="px-4 py-2 text-sm font-medium rounded-md {{ !request('status') ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                                Semua ({{ $statistics['total'] }})
                            </a>
                            <a href="{{ route('siswa.aspirasi.index', ['status' => 'baru']) }}"
                                class="px-4 py-2 text-sm font-medium rounded-md {{ request('status') == 'baru' ? 'bg-yellow-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                                Baru ({{ $statistics['baru'] }})
                            </a>
                            <a href="{{ route('siswa.aspirasi.index', ['status' => 'diproses']) }}"
                                class="px-4 py-2 text-sm font-medium rounded-md {{ request('status') == 'diproses' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                                Diproses ({{ $statistics['diproses'] }})
                            </a>
                            <a href="{{ route('siswa.aspirasi.index', ['status' => 'selesai']) }}"
                                class="px-4 py-2 text-sm font-medium rounded-md {{ request('status') == 'selesai' ? 'bg-green-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                                Selesai ({{ $statistics['selesai'] }})
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
