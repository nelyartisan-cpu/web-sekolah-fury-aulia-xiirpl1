<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\KategoriArtikel;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArtikelFactory extends Factory
{
    protected $model = \App\Models\Artikel::class;

    public function definition(): array
    {
        return [
            'judul' => fake()->sentence(6),
            'isi' => fake()->paragraphs(5, true),
            'gambar' => null, // atau fake()->imageUrl() kalau mau ada gambar dummy
            'user_id' => Admin::inRandomOrder()->first()?->id ?? Admin::factory(),
            'kategori_artikel_id' => KategoriArtikel::inRandomOrder()->first()?->id ?? KategoriArtikel::factory(),
        ];
    }
}