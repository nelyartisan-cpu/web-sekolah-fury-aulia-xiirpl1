<?php

namespace Database\Factories;

use App\Models\Guru;
use Illuminate\Database\Eloquent\Factories\Factory;

class EkstrakurikulerFactory extends Factory
{
    protected $model = \App\Models\Ekstrakurikuler::class;

    public function definition(): array
    {
        $namaEskul = fake()->randomElement([
            'Pramuka',
            'Paskibra',
            'PMR',
            'Futsal',
            'Voli',
            'Karawitan',
            'Club Bahasa Jepang',
            'Jurnalistik',
        ]);

        return [
            'nama_eskul' => $namaEskul,
            'pembina' => fake()->name(),
            'deskripsi' => fake()->paragraph(),
            'logo' => null, 
            'guru_id' => Guru::factory(),
        ];
    }
}