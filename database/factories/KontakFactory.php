<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KontakFactory extends Factory
{
    protected $model = \App\Models\Kontak::class;

    public function definition(): array
    {
        return [
            'nama' => fake()->name(),
            'email' => fake()->safeEmail(),
            'pesan' => fake()->paragraph(),
        ];
    }
}