<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KategoriArtikelFactory extends Factory
{
    protected $model = \App\Models\KategoriArtikel::class;

    public function definition(): array
    {
        return [
            'nama_kategori' => fake()->unique()->randomElement([
                'Berita',
                'Prestasi',
                'Pengumuman',
                'Kegiatan',
                'Artikel Umum',
                
            ]),
        ];
    }
}