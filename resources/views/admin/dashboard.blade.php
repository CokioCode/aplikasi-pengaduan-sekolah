<x-app-layout>
    <div class="py-6">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                <div class="stats shadow">
                    <div class="stat">
                        <div class="stat-title">Total Aspirasi</div>
                        <div class="stat-value text-primary">{{ $totalAspirasi }}</div>
                    </div>
                </div>

                <div class="stats shadow">
                    <div class="stat">
                        <div class="stat-title">Aspirasi Baru</div>
                        <div class="stat-value text-warning">{{ $aspirasiBaru }}</div>
                    </div>
                </div>

                <div class="stats shadow">
                    <div class="stat">
                        <div class="stat-title">Diproses</div>
                        <div class="stat-value text-info">{{ $aspirasiDiproses }}</div>
                    </div>
                </div>

                <div class="stats shadow">
                    <div class="stat">
                        <div class="stat-title">Selesai</div>
                        <div class="stat-value text-success">{{ $aspirasiSelesai }}</div>
                    </div>
                </div>
            </div>

            <!-- Table Card -->
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <h3 class="card-title text-lg mb-4">Aspirasi Terbaru</h3>
                    <div class="overflow-x-auto">
                        <table class="table table-zebra w-full">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Siswa</th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentAspirasi as $aspirasi)
                                    <tr>
                                        <td>{{ $aspirasi->tanggal_aspirasi->format('d/m/Y') }}</td>
                                        <td>{{ $aspirasi->user->fullname }}</td>
                                        <td>{{ Str::limit($aspirasi->judul_aspirasi, 40) }}</td>
                                        <td>{{ $aspirasi->kategori->nama_kategori }}</td>
                                        <td>
                                            <span class="badge
                                                @if ($aspirasi->status == 'baru') badge-warning
                                                @elseif($aspirasi->status == 'diproses') badge-info
                                                @else badge-success @endif">
                                                {{ ucfirst($aspirasi->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.aspirasi.show', $aspirasi->id) }}"
                                                class="btn btn-ghost btn-sm text-primary">
                                                Detail
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-base-content/60">
                                            Belum ada aspirasi
                                        </td>
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