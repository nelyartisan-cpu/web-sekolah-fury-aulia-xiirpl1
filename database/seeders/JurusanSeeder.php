<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jurusan;

class JurusanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama_jurusan' => 'Rekayasa Perangkat Lunak',
                'singkatan'    => 'RPL',
                'deskripsi'    => 'Jurusan yang mempelajari proses pengembangan perangkat lunak secara menyeluruh, mulai dari analisis kebutuhan, perancangan sistem, pemrograman (coding), pengujian, hingga pemeliharaan aplikasi. Siswa dibekali kemampuan logika pemrograman, basis data, pengembangan aplikasi web dan mobile, serta dasar-dasar rekayasa perangkat lunak yang siap diterapkan di dunia kerja maupun industri digital.',
                'gambar'       => 'logo-rpl.png'
            ],
            [
                'nama_jurusan' => 'Bisnis Daring dan Pemasaran',
                'singkatan'    => 'BDP',
                'deskripsi'    => 'Jurusan yang mempelajari strategi pemasaran produk dan jasa baik secara konvensional maupun digital (daring), meliputi riset pasar, promosi, branding, pengelolaan media sosial, hingga transaksi jual beli online (e-commerce). Siswa dibekali kemampuan berwirausaha dan mengelola bisnis di era digital secara profesional.',
                'gambar'       => 'logo-pemasaran.png'
            ],
            [
                'nama_jurusan' => 'Agriteknologi Pengolahan Hasil Pertanian',
                'singkatan'    => 'APHP',
                'deskripsi'    => 'Jurusan yang mempelajari teknik pengolahan bahan hasil pertanian menjadi produk pangan olahan yang memiliki nilai jual lebih tinggi, mencakup proses produksi, pengawasan mutu, pengemasan, hingga penerapan teknologi ramah lingkungan dalam industri pengolahan pangan.',
                'gambar'       => 'logo-aphp.png'
            ],
            [
                'nama_jurusan' => 'Teknik Kendaraan Ringan',
                'singkatan'    => 'TKR',
                'deskripsi'    => 'Jurusan yang mempelajari perawatan, perbaikan, dan perakitan komponen kendaraan ringan seperti mobil, meliputi sistem mesin, kelistrikan otomotif, sasis, hingga sistem pemindah tenaga, guna mencetak tenaga terampil di bidang otomotif yang siap kerja maupun berwirausaha.',
                'gambar'       => 'logo-tkro.png'
            ],
        ];

        foreach ($data as $row) {
            Jurusan::create($row);
        }
        }
    }
