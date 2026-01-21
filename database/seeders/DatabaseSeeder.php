<?php

namespace Database\Seeders;

use App\Models\Aspirasi;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminId = Str::uuid();
        $siswa1Id = Str::uuid();
        $siswa2Id = Str::uuid();

        User::create([
            'id' => $adminId,
            'username' => 'admin',
            'password' => Hash::make('password'),
            'fullname' => 'Administrator',
            'role' => 'admin',
            'kelas' => null,
        ]);

        User::create([
            'id' => $siswa1Id,
            'username' => 'siswa1',
            'password' => Hash::make('password'),
            'fullname' => 'Ahmad Fauzi',
            'role' => 'siswa',
            'kelas' => 'XII IPA 1',
        ]);

        User::create([
            'id' => $siswa2Id,
            'username' => 'siswa2',
            'password' => Hash::make('password'),
            'fullname' => 'Siti Nurhaliza',
            'role' => 'siswa',
            'kelas' => 'XI IPS 2',
        ]);

        $kategoriList = [
            'Fasilitas Kelas',
            'Toilet',
            'Perpustakaan',
            'Laboratorium',
            'Lapangan Olahraga',
            'Kantin',
            'Mushola',
            'Lainnya',
        ];

        foreach ($kategoriList as $kat) {
            Kategori::create([
                'id' => Str::uuid(),
                'nama_kategori' => $kat,
            ]);
        }

        $kategoriMap = Kategori::pluck('id', 'nama_kategori')->toArray();

        $aspirasiTemplate = [
            'Fasilitas Kelas' => [
                [
                    'judul' => 'Kursi dan Meja Banyak Rusak',
                    'isi' => 'Di kelas kami terdapat beberapa kursi dan meja yang sudah rusak dan tidak layak digunakan. Mohon segera diperbaiki agar kegiatan belajar lebih nyaman.',
                ],
                [
                    'judul' => 'Lampu Kelas Sering Mati',
                    'isi' => 'Lampu di kelas sering mati terutama saat pelajaran berlangsung. Hal ini membuat suasana kelas menjadi kurang kondusif.',
                ],
            ],
            'Toilet' => [
                [
                    'judul' => 'Toilet Kotor dan Bau',
                    'isi' => 'Toilet sekolah sering dalam keadaan kotor dan berbau. Mohon ada perhatian lebih terkait kebersihan toilet.',
                ],
                [
                    'judul' => 'Air Toilet Tidak Mengalir',
                    'isi' => 'Air di toilet sering tidak mengalir sehingga toilet tidak bisa digunakan dengan baik.',
                ],
            ],
            'Perpustakaan' => [
                [
                    'judul' => 'Buku Pelajaran Kurang Lengkap',
                    'isi' => 'Beberapa buku pelajaran terbaru belum tersedia di perpustakaan. Mohon dilakukan penambahan.',
                ],
                [
                    'judul' => 'Perpustakaan Terlalu Panas',
                    'isi' => 'Ruangan perpustakaan terasa panas dan kurang ventilasi sehingga kurang nyaman untuk membaca.',
                ],
            ],
            'Laboratorium' => [
                [
                    'judul' => 'Alat Praktikum Tidak Lengkap',
                    'isi' => 'Beberapa alat praktikum di laboratorium sudah rusak dan tidak lengkap.',
                ],
                [
                    'judul' => 'Lab Jarang Dibersihkan',
                    'isi' => 'Laboratorium jarang dibersihkan sehingga kurang nyaman digunakan saat praktikum.',
                ],
            ],
            'Lapangan Olahraga' => [
                [
                    'judul' => 'Lapangan Sering Becek',
                    'isi' => 'Saat hujan lapangan menjadi becek dan licin sehingga tidak bisa digunakan untuk olahraga.',
                ],
                [
                    'judul' => 'Gawang dan Ring Rusak',
                    'isi' => 'Beberapa fasilitas olahraga seperti gawang dan ring basket sudah rusak.',
                ],
            ],
            'Kantin' => [
                [
                    'judul' => 'Harga Makanan Terlalu Mahal',
                    'isi' => 'Harga makanan di kantin cukup mahal bagi siswa. Mohon ditinjau kembali.',
                ],
                [
                    'judul' => 'Kantin Kurang Bersih',
                    'isi' => 'Kantin sering terlihat kurang bersih terutama saat jam istirahat.',
                ],
            ],
            'Mushola' => [
                [
                    'judul' => 'Karpet Mushola Rusak',
                    'isi' => 'Beberapa karpet mushola sudah rusak dan tidak nyaman digunakan.',
                ],
                [
                    'judul' => 'Tempat Wudhu Kurang Air',
                    'isi' => 'Air di tempat wudhu sering kecil sehingga menyulitkan saat berwudhu.',
                ],
            ],
            'Lainnya' => [
                [
                    'judul' => 'Area Parkir Tidak Tertata',
                    'isi' => 'Area parkir sering berantakan dan kurang tertib.',
                ],
                [
                    'judul' => 'Tempat Sampah Kurang',
                    'isi' => 'Jumlah tempat sampah di lingkungan sekolah masih kurang.',
                ],
            ],
        ];

        $userIds = [$siswa1Id, $siswa2Id];
        $status = ['baru', 'diproses', 'selesai'];

        for ($i = 1; $i <= 1000; $i++) {
            $namaKategori = array_rand($aspirasiTemplate);
            $template = $aspirasiTemplate[$namaKategori][array_rand($aspirasiTemplate[$namaKategori])];

            Aspirasi::create([
                'id' => Str::uuid(),
                'id_user' => $userIds[array_rand($userIds)],
                'id_kategori' => $kategoriMap[$namaKategori],
                'judul_aspirasi' => $template['judul'],
                'isi_aspirasi' => $template['isi'],
                'tanggal_aspirasi' => now()->subDays(rand(0, 30)),
                'status' => $status[array_rand($status)],
            ]);
        }
    }
}
