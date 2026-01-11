<x-app-layout>
    <div class="py-6">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">Filter Aspirasi</h3>
                    <form method="GET" action="{{ route('admin.aspirasi.index') }}"
                        class="grid grid-cols-1 md:grid-cols-5 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <select name="status" class="w-full border-gray-300 rounded-md shadow-sm">
                                <option value="">Semua Status</option>
                                <option value="baru" {{ request('status') == 'baru' ? 'selected' : '' }}>Baru</option>
                                <option value="diproses" {{ request('status') == 'diproses' ? 'selected' : '' }}>
                                    Diproses</option>
                                <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai
                                </option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                            <select name="id_kategori" class="w-full border-gray-300 rounded-md shadow-sm">
                                <option value="">Semua Kategori</option>
                                @foreach ($kategori as $kat)
                                    <option value="{{ $kat->id_kategori }}"
                                        {{ request('id_kategori') == $kat->id_kategori ? 'selected' : '' }}>
                                        {{ $kat->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                            <input type="date" name="tanggal" value="{{ request('tanggal') }}"
                                class="w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Bulan</label>
                            <input type="month" name="bulan" value="{{ request('bulan') }}"
                                class="w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div class="flex items-end">
                            <button type="submit"
                                class="w-full px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                Filter
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Siswa
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kelas
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Judul
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kategori
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($aspirasi as $index => $item)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            {{ $aspirasi->firstItem() + $index }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            {{ $item->tanggal_aspirasi->format('d/m/Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $item->user->nama_user }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $item->user->kelas }}</td>
                                        <td class="px-6 py-4 text-sm">{{ Str::limit($item->judul_aspirasi, 40) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            {{ $item->kategori->nama_kategori }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                            @if ($item->status == 'baru') bg-yellow-100 text-yellow-800
                                            @elseif($item->status == 'diproses') bg-blue-100 text-blue-800
                                            @else bg-green-100 text-green-800 @endif">
                                                {{ ucfirst($item->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <a href="{{ route('admin.aspirasi.show', $item->id) }}"
                                                class="text-blue-600 hover:text-blue-900">Detail</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="px-6 py-4 text-center text-gray-500">Tidak ada data
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $aspirasi->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
