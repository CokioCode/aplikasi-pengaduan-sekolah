<x-app-layout>
    <div class="py-6">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-wrap gap-4 mb-6">
                <div class="flex-1 min-w-[220px] bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-gray-600 text-sm">Total Aspirasi</div>
                    <div class="text-3xl font-bold text-blue-600">{{ $totalAspirasi }}</div>
                </div>

                <div class="flex-1 min-w-[220px] bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-gray-600 text-sm">Aspirasi Baru</div>
                    <div class="text-3xl font-bold text-yellow-600">{{ $aspirasiBaru }}</div>
                </div>

                <div class="flex-1 min-w-[220px] bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-gray-600 text-sm">Diproses</div>
                    <div class="text-3xl font-bold text-orange-600">{{ $aspirasiDiproses }}</div>
                </div>

                <div class="flex-1 min-w-[220px] bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-gray-600 text-sm">Selesai</div>
                    <div class="text-3xl font-bold text-green-600">{{ $aspirasiSelesai }}</div>
                </div>
            </div>


            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">Aspirasi Terbaru</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Siswa
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
                                @forelse($recentAspirasi as $aspirasi)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            {{ $aspirasi->tanggal_aspirasi->format('d/m/Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $aspirasi->user->fullname }}
                                        </td>
                                        <td class="px-6 py-4 text-sm">{{ Str::limit($aspirasi->judul_aspirasi, 40) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            {{ $aspirasi->kategori->nama_kategori }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                            @if ($aspirasi->status == 'baru') bg-yellow-100 text-yellow-800
                                            @elseif($aspirasi->status == 'diproses') bg-blue-100 text-blue-800
                                            @else bg-green-100 text-green-800 @endif">
                                                {{ ucfirst($aspirasi->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <a href="{{ route('admin.aspirasi.show', $aspirasi->id) }}"
                                                class="text-blue-600 hover:text-blue-900">Detail</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">Belum ada
                                            aspirasi</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
