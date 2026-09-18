<?php

namespace Database\Seeders;

use App\Models\KategoriArtikel;
use Illuminate\Database\Seeder;

class KategoriArtikelSeeder extends Seeder
{
    public function run(): void
    {
        KategoriArtikel::query()->delete();

        $kategori = [
            'Berita Sekolah',
            'Prestasi Siswa',
            'Kegiatan Sekolah',
            'Pengumuman',
            'Pendidikan',
        ];

        foreach ($kategori as $nama) {
            KategoriArtikel::create([
                'nama_kategori' => $nama,
            ]);
        }
    }
}