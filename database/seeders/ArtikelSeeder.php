<?php

namespace Database\Seeders;

use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Database\Seeder;

class ArtikelSeeder extends Seeder
{
    public function run(): void
    {
        Artikel::query()->delete();

        $berita = KategoriArtikel::where(
            'nama_kategori',
            'Berita Sekolah'
        )->first();

        $prestasi = KategoriArtikel::where(
            'nama_kategori',
            'Prestasi Siswa'
        )->first();

        $kegiatan = KategoriArtikel::where(
            'nama_kategori',
            'Kegiatan Sekolah'
        )->first();

        $pengumuman = KategoriArtikel::where(
            'nama_kategori',
            'Pengumuman'
        )->first();

        Artikel::create([
            'kategori_artikel_id' => $berita?->id,
            'judul' => 'SMK Negeri 1 Cijati Terus Meningkatkan Prestasi Siswa',
            'isi' => 'SMK Negeri 1 Cijati terus berkomitmen dalam meningkatkan kualitas pendidikan dan prestasi siswa melalui berbagai kegiatan akademik maupun nonakademik.',
            'gambar' => null,
        ]);

        Artikel::create([
            'kategori_artikel_id' => $prestasi?->id,
            'judul' => 'Siswa SMK Negeri 1 Cijati Raih Prestasi',
            'isi' => 'Siswa SMK Negeri 1 Cijati berhasil meraih prestasi dalam berbagai kegiatan dan perlombaan. Prestasi ini menjadi motivasi untuk terus belajar dan berkembang.',
            'gambar' => null,
        ]);

        Artikel::create([
            'kategori_artikel_id' => $kegiatan?->id,
            'judul' => 'Kegiatan Sekolah SMK Negeri 1 Cijati',
            'isi' => 'Berbagai kegiatan sekolah dilaksanakan untuk mengembangkan kemampuan, kreativitas, kedisiplinan, dan karakter peserta didik.',
            'gambar' => null,
        ]);

        Artikel::create([
            'kategori_artikel_id' => $pengumuman?->id,
            'judul' => 'Pengumuman Sekolah',
            'isi' => 'Informasi dan pengumuman terbaru dari SMK Negeri 1 Cijati dapat dilihat melalui website resmi sekolah.',
            'gambar' => null,
        ]);
    }
}