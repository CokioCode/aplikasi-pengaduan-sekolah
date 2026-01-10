<x-app-layout>
    <div class="py-6">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900">{{ $aspirasi->judul_aspirasi }}</h3>
                            <div class="mt-2 flex items-center space-x-4 text-sm text-gray-600">
                                <span>{{ $aspirasi->user->nama_user }} ({{ $aspirasi->user->kelas }})</span>
                                <span>•</span>
                                <span>{{ $aspirasi->tanggal_aspirasi->format('d F Y') }}</span>
                                <span>•</span>
                                <span class="font-medium">{{ $aspirasi->kategori->nama_kategori }}</span>
                            </div>
                        </div>
                        <span
                            class="px-3 py-1 text-sm font-semibold rounded-full
                            @if ($aspirasi->status == 'baru') bg-yellow-100 text-yellow-800
                            @elseif($aspirasi->status == 'diproses') bg-blue-100 text-blue-800
                            @else bg-green-100 text-green-800 @endif">
                            {{ ucfirst($aspirasi->status) }}
                        </span>
                    </div>

                    <div class="mt-4 p-4 bg-gray-50 rounded-lg">
                        <p class="text-gray-700 whitespace-pre-line">{{ $aspirasi->isi_aspirasi }}</p>
                    </div>

                    @if (Auth::user()->isAdmin())
                        <div class="mt-6 border-t pt-4">
                            <h4 class="font-semibold mb-3">Update Status</h4>
                            <form method="POST" action="{{ route('admin.aspirasi.updateStatus', $aspirasi->id) }}"
                                class="flex items-center space-x-3">
                                @csrf
                                @method('PATCH')
                                <select name="status" class="border-gray-300 rounded-md shadow-sm">
                                    <option value="baru" {{ $aspirasi->status == 'baru' ? 'selected' : '' }}>Baru
                                    </option>
                                    <option value="diproses" {{ $aspirasi->status == 'diproses' ? 'selected' : '' }}>
                                        Diproses</option>
                                    <option value="selesai" {{ $aspirasi->status == 'selesai' ? 'selected' : '' }}>
                                        Selesai</option>
                                </select>
                                <button type="submit"
                                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                    Update Status
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">Umpan Balik Admin</h3>

                    @if (Auth::user()->isAdmin())
                        <form method="POST" action="{{ route('admin.umpanBalik.store') }}" class="mb-6">
                            @csrf
                            <input type="hidden" name="id_aspirasi" value="{{ $aspirasi->id }}">
                            <textarea name="isi_umpan_balik" rows="3" class="w-full border-gray-300 rounded-md shadow-sm"
                                placeholder="Tulis umpan balik..." required></textarea>
                            <button type="submit"
                                class="mt-2 px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                                Kirim Umpan Balik
                            </button>
                        </form>
                    @endif

                    <div class="space-y-4">
                        @forelse($aspirasi->umpanBalik as $ub)
                            <div class="border-l-4 border-blue-500 pl-4 py-2 bg-blue-50">
                                <div class="flex justify-between items-start">
                                    <div class="flex-1">
                                        <p class="text-gray-700">{{ $ub->isi_umpan_balik }}</p>
                                        <p class="text-xs text-gray-500 mt-2">
                                            {{ $ub->user->nama_user }} •
                                            {{ $ub->tanggal_umpan_balik->format('d M Y H:i') }}
                                        </p>
                                    </div>
                                    @if (Auth::user()->isAdmin())
                                        <form method="POST" action="{{ route('admin.umpanBalik.destroy', $ub->id) }}"
                                            onsubmit="return confirm('Yakin hapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:text-red-900 text-sm">Hapus</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-500 text-center py-4">Belum ada umpan balik</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">Progres Perbaikan</h3>

                    @if (Auth::user()->isAdmin())
                        <form method="POST" action="{{ route('admin.progres.store') }}"
                            class="mb-6 p-4 bg-gray-50 rounded-lg">
                            @csrf
                            <input type="hidden" name="id_aspirasi" value="{{ $aspirasi->id }}">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Status Progres</label>
                                    <input type="text" name="status"
                                        class="w-full border-gray-300 rounded-md shadow-sm"
                                        placeholder="Contoh: Dalam perbaikan" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Keterangan</label>
                                    <textarea name="keterangan_progres" rows="2" class="w-full border-gray-300 rounded-md shadow-sm" required></textarea>
                                </div>
                            </div>
                            <button type="submit"
                                class="mt-3 px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                                Tambah Progres
                            </button>
                        </form>
                    @endif

                    <div class="space-y-4">
                        @forelse($aspirasi->progresPerbaikan()->latest('tanggal_update')->get() as $progres)
                            <div class="border rounded-lg p-4 bg-green-50">
                                <div class="flex justify-between items-start">
                                    <div class="flex-1">
                                        <div class="flex items-center space-x-2 mb-2">
                                            <span
                                                class="px-2 py-1 bg-green-200 text-green-800 text-xs font-semibold rounded">{{ $progres->status }}</span>
                                            <span
                                                class="text-xs text-gray-500">{{ $progres->tanggal_update->format('d M Y') }}</span>
                                        </div>
                                        <p class="text-gray-700">{{ $progres->keterangan_progres }}</p>
                                    </div>
                                    @if (Auth::user()->isAdmin())
                                        <form method="POST"
                                            action="{{ route('admin.progres.destroy', $progres->id) }}"
                                            onsubmit="return confirm('Yakin hapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:text-red-900 text-sm">Hapus</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-500 text-center py-4">Belum ada progres perbaikan</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
