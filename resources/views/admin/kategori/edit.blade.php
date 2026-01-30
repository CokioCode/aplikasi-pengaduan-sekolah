<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.kategori.index') }}" class="btn btn-ghost btn-sm btn-circle">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>
            <h2 class="font-semibold text-xl text-base-content">
                Edit Kategori
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <h3 class="card-title mb-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                        Form Edit Kategori
                    </h3>

                    <form method="POST" action="{{ route('admin.kategori.update', $kategori->id) }}" class="space-y-6">
                        @csrf
                        @method('PATCH')

                        <div class="form-control">
                            <label class="label" for="nama_kategori">
                                <span class="label-text font-semibold">
                                    Nama Kategori
                                    <span class="text-error">*</span>
                                </span>
                            </label>
                            <input type="text" id="nama_kategori" name="nama_kategori"
                                value="{{ old('nama_kategori', $kategori->nama_kategori) }}"
                                placeholder="Contoh: Fasilitas Kelas"
                                class="input input-bordered w-full @error('nama_kategori') input-error @enderror"
                                required autofocus>
                            @error('nama_kategori')
                                <label class="label">
                                    <span class="label-text-alt text-error">{{ $message }}</span>
                                </label>
                            @enderror
                        </div>

                        <div class="alert alert-info">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div>
                                <p class="font-semibold">Informasi Penting</p>
                                <p class="text-sm">
                                    Kategori ini saat ini digunakan oleh
                                    <span class="badge badge-primary badge-sm mx-1">
                                        {{ $kategori->aspirasi()->count() }}
                                    </span>
                                    aspirasi
                                </p>
                            </div>
                        </div>

                        @if ($kategori->aspirasi()->count() > 0)
                            <div class="alert alert-warning">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                    </path>
                                </svg>
                                <div>
                                    <p class="font-semibold">Perhatian!</p>
                                    <p class="text-sm">Mengubah nama kategori akan mempengaruhi semua aspirasi yang
                                        menggunakan kategori ini.</p>
                                </div>
                            </div>
                        @endif

                        <div class="divider"></div>
                        <div class="flex items-center justify-end gap-3">
                            <a href="{{ route('admin.kategori.index') }}" class="btn btn-ghost gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Batal
                            </a>
                            <button type="submit" class="btn btn-primary gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                Update Kategori
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card bg-base-200 shadow-xl mt-6">
                <div class="card-body">
                    <h4 class="font-semibold text-base flex items-center gap-2">
                        <svg class="w-5 h-5 text-info" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
                            </path>
                        </svg>
                        Tips
                    </h4>
                    <ul class="list-disc list-inside text-sm text-base-content/70 space-y-1 ml-7">
                        <li>Gunakan nama kategori yang jelas dan mudah dipahami</li>
                        <li>Hindari penggunaan singkatan yang tidak umum</li>
                        <li>Kategori yang baik memudahkan pencarian aspirasi</li>
                    </ul>
                </div>
            </div>

            <div class="stats shadow mt-6 w-full">
                <div class="stat">
                    <div class="stat-figure text-secondary">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <div class="stat-title">Dibuat pada</div>
                    <div class="stat-value text-lg">{{ $kategori->created_at->format('d M Y') }}</div>
                    <div class="stat-desc">{{ $kategori->created_at->diffForHumans() }}</div>
                </div>

                <div class="stat">
                    <div class="stat-figure text-primary">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                    </div>
                    <div class="stat-title">Terakhir diubah</div>
                    <div class="stat-value text-lg">{{ $kategori->updated_at->format('d M Y') }}</div>
                    <div class="stat-desc">{{ $kategori->updated_at->diffForHumans() }}</div>
                </div>

                <div class="stat">
                    <div class="stat-figure text-accent">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                    <div class="stat-title">Total Aspirasi</div>
                    <div class="stat-value text-lg text-primary">{{ $kategori->aspirasi()->count() }}</div>
                    <div class="stat-desc">Menggunakan kategori ini</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
