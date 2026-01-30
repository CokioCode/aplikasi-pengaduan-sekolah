<x-app-layout>
    <div class="py-6">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <!-- Filter Card -->
            <div class="card bg-base-100 shadow-xl mb-6">
                <div class="card-body">
                    <h3 class="card-title">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.207A1 1 0 013 6.5V4z">
                            </path>
                        </svg>
                        Filter Aspirasi
                    </h3>

                    <form method="GET" action="{{ route('admin.aspirasi.index') }}"
                        class="grid grid-cols-1 md:grid-cols-5 gap-4">
                        <!-- Status Filter -->
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Status</span>
                            </label>
                            <select name="status" class="select select-bordered w-full">
                                <option value="">Semua Status</option>
                                <option value="baru" {{ request('status') == 'baru' ? 'selected' : '' }}>Baru</option>
                                <option value="diproses" {{ request('status') == 'diproses' ? 'selected' : '' }}>
                                    Diproses</option>
                                <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai
                                </option>
                            </select>
                        </div>

                        <!-- Kategori Filter -->
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Kategori</span>
                            </label>
                            <select name="id_kategori" class="select select-bordered w-full">
                                <option value="">Semua Kategori</option>
                                @foreach ($kategori as $kat)
                                    <option value="{{ $kat->id_kategori }}"
                                        {{ request('id_kategori') == $kat->id_kategori ? 'selected' : '' }}>
                                        {{ $kat->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Tanggal Filter -->
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Tanggal</span>
                            </label>
                            <input type="date" name="tanggal" value="{{ request('tanggal') }}"
                                class="input input-bordered w-full">
                        </div>

                        <!-- Bulan Filter -->
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Bulan</span>
                            </label>
                            <input type="month" name="bulan" value="{{ request('bulan') }}"
                                class="input input-bordered w-full">
                        </div>

                        <!-- Filter Buttons -->
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text opacity-0">Action</span>
                            </label>
                            <div class="join w-full">
                                <button type="submit" class="btn btn-primary join-item flex-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                    Filter
                                </button>
                                @if (request()->hasAny(['status', 'id_kategori', 'tanggal', 'bulan']))
                                    <a href="{{ route('admin.aspirasi.index') }}" class="btn btn-ghost join-item">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Data Table Card -->
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="card-title">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                            Daftar Aspirasi
                        </h2>
                        @if ($aspirasi->total() > 0)
                            <div class="badge badge-neutral badge-lg">
                                Total: {{ $aspirasi->total() }} aspirasi
                            </div>
                        @endif
                    </div>

                    <div class="overflow-x-auto">
                        <table class="table table-zebra w-full">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Siswa</th>
                                    <th>Kelas</th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($aspirasi as $index => $item)
                                    <tr class="hover">
                                        <th>{{ $aspirasi->firstItem() + $index }}</th>
                                        <td>
                                            <div class="flex items-center gap-2">
                                                <svg class="w-4 h-4 text-base-content/60" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                                <span
                                                    class="font-medium">{{ $item->tanggal_aspirasi->format('d/m/Y') }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-2">
                                                <div class="avatar placeholder">
                                                    <div class="bg-primary text-primary-content w-8 rounded-full">
                                                        <span
                                                            class="text-xs">{{ strtoupper(substr($item->user->fullname, 0, 2)) }}</span>
                                                    </div>
                                                </div>
                                                <span>{{ $item->user->fullname }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="badge badge-outline badge-sm">{{ $item->user->kelas }}</div>
                                        </td>
                                        <td>
                                            <div class="max-w-xs">
                                                <p class="font-medium truncate" title="{{ $item->judul_aspirasi }}">
                                                    {{ Str::limit($item->judul_aspirasi, 40) }}
                                                </p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="badge badge-secondary gap-1">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                                    </path>
                                                </svg>
                                                {{ $item->kategori->nama_kategori }}
                                            </div>
                                        </td>
                                        <td>
                                            <div
                                                class="badge gap-1
                                                @if ($item->status == 'baru') badge-warning
                                                @elseif($item->status == 'diproses') badge-info
                                                @else badge-success @endif">
                                                @if ($item->status == 'baru')
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                @elseif($item->status == 'diproses')
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                                        </path>
                                                    </svg>
                                                @else
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                @endif
                                                {{ ucfirst($item->status) }}
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.aspirasi.show', $item->id) }}"
                                                class="btn btn-sm btn-primary gap-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                    </path>
                                                </svg>
                                                Detail
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center py-12">
                                            <div class="flex flex-col items-center gap-4">
                                                <svg class="w-20 h-20 text-base-content/20" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                    </path>
                                                </svg>
                                                <div>
                                                    <p class="text-base-content/70 text-lg font-semibold">Tidak ada
                                                        data aspirasi</p>
                                                    <p class="text-base-content/50 text-sm mt-1">Coba ubah filter atau
                                                        tunggu aspirasi baru masuk</p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if ($aspirasi->hasPages())
                        <div class="flex justify-center mt-6">
                            <div class="join">
                                {{-- Previous Page Link --}}
                                @if ($aspirasi->onFirstPage())
                                    <button class="join-item btn btn-disabled" disabled>«</button>
                                @else
                                    <a href="{{ $aspirasi->previousPageUrl() }}" class="join-item btn">«</a>
                                @endif

                                {{-- Pagination Elements --}}
                                @php
                                    $start = max($aspirasi->currentPage() - 2, 1);
                                    $end = min($aspirasi->currentPage() + 2, $aspirasi->lastPage());
                                @endphp

                                @if ($start > 1)
                                    <a href="{{ $aspirasi->url(1) }}" class="join-item btn">1</a>
                                    @if ($start > 2)
                                        <button class="join-item btn btn-disabled">...</button>
                                    @endif
                                @endif

                                @for ($page = $start; $page <= $end; $page++)
                                    @if ($page == $aspirasi->currentPage())
                                        <button class="join-item btn btn-active">{{ $page }}</button>
                                    @else
                                        <a href="{{ $aspirasi->url($page) }}"
                                            class="join-item btn">{{ $page }}</a>
                                    @endif
                                @endfor

                                @if ($end < $aspirasi->lastPage())
                                    @if ($end < $aspirasi->lastPage() - 1)
                                        <button class="join-item btn btn-disabled">...</button>
                                    @endif
                                    <a href="{{ $aspirasi->url($aspirasi->lastPage()) }}"
                                        class="join-item btn">{{ $aspirasi->lastPage() }}</a>
                                @endif

                                {{-- Next Page Link --}}
                                @if ($aspirasi->hasMorePages())
                                    <a href="{{ $aspirasi->nextPageUrl() }}" class="join-item btn">»</a>
                                @else
                                    <button class="join-item btn btn-disabled" disabled>»</button>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
