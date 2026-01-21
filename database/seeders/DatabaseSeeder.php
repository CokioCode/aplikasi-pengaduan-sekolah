<?php

namespace Database\Seeders;

use App\Models\Aspirasi;
use App\Models\Kategori;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

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
            'fullname' => $faker->name(),
            'role' => 'siswa',
            'kelas' => 'XII IPA 1',
        ]);

        User::create([
            'id' => $siswa2Id,
            'username' => 'siswa2',
            'password' => Hash::make('password'),
            'fullname' => $faker->name(),
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

        $masalah = [
            'rusak', 'tidak berfungsi', 'kurang bersih', 'sering mati',
            'kurang nyaman', 'tidak layak digunakan', 'berbau', 'becek',
        ];

        $permintaan = [
            'Mohon segera diperbaiki.',
            'Mohon ditindaklanjuti.',
            'Mohon menjadi perhatian pihak sekolah.',
            'Kami berharap bisa segera diperbaiki.',
        ];

        $objekPerKategori = [
            'Fasilitas Kelas' => ['kursi', 'meja', 'lampu', 'kipas angin', 'papan tulis'],
            'Toilet' => ['toilet', 'air', 'flush', 'lantai', 'saluran air'],
            'Perpustakaan' => ['buku', 'ruangan', 'meja baca', 'rak buku'],
            'Laboratorium' => ['alat praktikum', 'meja lab', 'peralatan', 'ruangan'],
            'Lapangan Olahraga' => ['lapangan', 'ring basket', 'gawang', 'lantai lapangan'],
            'Kantin' => ['makanan', 'minuman', 'meja', 'kebersihan'],
            'Mushola' => ['karpet', 'tempat wudhu', 'pengeras suara', 'lantai'],
            'Lainnya' => ['parkiran', 'tempat sampah', 'lingkungan sekolah'],
        ];

        $userIds = [$siswa1Id, $siswa2Id];
        $status = ['baru', 'diproses', 'selesai'];

        for ($i = 1; $i <= 100; $i++) {
            $kategoriNama = $faker->randomElement(array_keys($objekPerKategori));
            $objek = $faker->randomElement($objekPerKategori[$kategoriNama]);
            $masalahText = $faker->randomElement($masalah);

            $judul = ucfirst($objek).' '.$masalahText;
            $isi = "Saya ingin menyampaikan bahwa {$objek} di sekolah saat ini {$masalahText}. "
                   .'Kondisi ini cukup mengganggu aktivitas siswa. '
                   .$faker->randomElement($permintaan);

            Aspirasi::create([
                'id' => Str::uuid(),
                'id_user' => $faker->randomElement($userIds),
                'id_kategori' => $kategoriMap[$kategoriNama],
                'judul_aspirasi' => $judul,
                'isi_aspirasi' => $isi,
                'tanggal_aspirasi' => $faker->dateTimeBetween('-30 days', 'now'),
                'status' => $faker->randomElement($status),
            ]);
        }
    }
}
