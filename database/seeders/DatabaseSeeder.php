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

        $kategoriIds = [];

        $kategori = [
            'Fasilitas Kelas',
            'Toilet',
            'Perpustakaan',
            'Laboratorium',
            'Lapangan Olahraga',
            'Kantin',
            'Mushola',
            'Lainnya',
        ];

        foreach ($kategori as $kat) {
            $data = Kategori::create([
                'nama_kategori' => $kat,
            ]);

            $kategoriIds[] = $data->id;

        }

        Aspirasi::create([
            'id' => Str::uuid(),
            'id_user' => $siswa1Id,
            'id_kategori' => $kategoriIds[0],
            'judul_aspirasi' => 'Kerusakan Kursi di Kelas XII IPA 1',
            'isi_aspirasi' => 'Terdapat 5 kursi yang kakinya patah dan tidak bisa digunakan. Mohon segera diperbaiki karena mengganggu kenyamanan belajar.',
            'tanggal_aspirasi' => now(),
            'status' => 'baru',
        ]);

        Aspirasi::create([
            'id' => Str::uuid(),
            'id_user' => $siswa2Id,
            'id_kategori' => $kategoriIds[1],
            'judul_aspirasi' => 'Toilet Lantai 2 Tidak Berfungsi',
            'isi_aspirasi' => 'Flush toilet di lantai 2 rusak dan air tidak mengalir dengan baik. Mohon perbaikan.',
            'tanggal_aspirasi' => now()->subDays(2),
            'status' => 'diproses',
        ]);
    }
}
