<x-app-layout>
    <div class="py-6">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                <div class="stats shadow bg-base-100">
                    <div class="stat">
                        <div class="stat-title">Total Aspirasi</div>
                        <div class="stat-value text-primary">{{ $totalAspirasi }}</div>
                        <div class="stat-desc">Semua aspirasi Anda</div>
                    </div>
                </div>

                <div class="stats shadow bg-base-100">
                    <div class="stat">
                        <div class="stat-title">Baru</div>
                        <div class="stat-value text-warning">{{ $aspirasiBaru }}</div>
                        <div class="stat-desc">Menunggu review</div>
                    </div>
                </div>

                <div class="stats shadow bg-base-100">
                    <div class="stat">
                        <div class="stat-title">Diproses</div>
                        <div class="stat-value text-info">{{ $aspirasiDiproses }}</div>
                        <div class="stat-desc">Sedang ditangani</div>
                    </div>
                </div>

                <div class="stats shadow bg-base-100">
                    <div class="stat">
                        <div class="stat-title">Selesai</div>
                        <div class="stat-value text-success">{{ $aspirasiSelesai }}</div>
                        <div class="stat-desc">Telah diselesaikan</div>
                    </div>
                </div>
            </div>

            
            <div class="card bg-base-100 shadow-xl mb-6">
                <div class="card-body">
                    <h3 class="card-title">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        Quick Action
                    </h3>
                    <div class="card-actions">
                        <a href="{{ route('siswa.aspirasi.create') }}" class="btn btn-primary">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Buat Aspirasi Baru
                        </a>
                    </div>
                </div>
            </div>

            
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <h3 class="card-title">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Aspirasi Terbaru Saya
                    </h3>
                    
                    <div class="space-y-4">
                        @forelse($recentAspirasi as $aspirasi)
                            <div class="card bg-base-200 hover:bg-base-300 transition-colors duration-200">
                                <div class="card-body p-4">
                                    <div class="flex justify-between items-start">
                                        <div class="flex-1">
                                            <h4 class="card-title text-base">{{ $aspirasi->judul_aspirasi }}</h4>
                                            <p class="text-base-content/70 text-sm mt-1">
                                                {{ Str::limit($aspirasi->isi_aspirasi, 100) }}
                                            </p>
                                            
                                            
                                            <div class="flex flex-wrap items-center gap-4 mt-3">
                                                <div class="badge badge-outline">
                                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                    </svg>
                                                    {{ $aspirasi->tanggal_aspirasi->format('d M Y') }}
                                                </div>
                                                
                                                <div class="badge badge-secondary">
                                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                                    </svg>
                                                    {{ $aspirasi->kategori->nama_kategori }}
                                                </div>
                                                
                                                @if ($aspirasi->umpanBalik->count() > 0)
                                                    <div class="badge badge-info">
                                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                                        </svg>
                                                        {{ $aspirasi->umpanBalik->count() }} Umpan Balik
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <div class="flex flex-col items-end gap-2">
                                            
                                            <div class="badge 
                                                @if ($aspirasi->status == 'baru') badge-warning
                                                @elseif($aspirasi->status == 'diproses') badge-info
                                                @else badge-success @endif">
                                                {{ ucfirst($aspirasi->status) }}
                                            </div>
                                            
                                            
                                            <a href="{{ route('siswa.aspirasi.show', $aspirasi->id) }}" 
                                               class="btn btn-sm btn-primary btn-outline">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                                Detail
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-12">
                                <div class="mb-4">
                                    <svg class="w-16 h-16 mx-auto text-base-content/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <p class="text-base-content/70 mb-4">Belum ada aspirasi</p>
                                <a href="{{ route('siswa.aspirasi.create') }}" class="btn btn-primary">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Buat Aspirasi Pertama Anda!
                                </a>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
