<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Guru;

class EkstrakurikulerSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil data guru yang sudah ada
        $guru = Guru::orderBy('id')->get();

        // Jika belum ada guru, hentikan seeder
        if ($guru->isEmpty()) {
            $this->command->warn('Data guru belum tersedia. Seeder ekstrakurikuler tidak dijalankan.');
            return;
        }

        DB::table('ekstrakurikulers')->insert([
            [
                'nama_eskul' => 'Pramuka',
                'logo' => null,
                'pembina' => $guru[0]->nama_guru ?? 'Pembina Pramuka',
                'guru_id' => $guru[0]->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama_eskul' => 'Paskibra',
                'logo' => null,
                'pembina' => $guru[1]->nama_guru ?? 'Pembina Paskibra',
                'guru_id' => $guru[1]->id ?? $guru[0]->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama_eskul' => 'PMR',
                'logo' => null,
                'pembina' => $guru[2]->nama_guru ?? 'Pembina PMR',
                'guru_id' => $guru[2]->id ?? $guru[0]->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama_eskul' => 'Futsal',
                'logo' => null,
                'pembina' => $guru[3]->nama_guru ?? 'Pembina Futsal',
                'guru_id' => $guru[3]->id ?? $guru[0]->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama_eskul' => 'Basket',
                'logo' => null,
                'pembina' => $guru[4]->nama_guru ?? 'Pembina Basket',
                'guru_id' => $guru[4]->id ?? $guru[0]->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama_eskul' => 'Voli',
                'logo' => null,
                'pembina' => $guru[5]->nama_guru ?? 'Pembina Voli',
                'guru_id' => $guru[5]->id ?? $guru[0]->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama_eskul' => 'Rohis',
                'logo' => null,
                'pembina' => $guru[6]->nama_guru ?? 'Pembina Rohis',
                'guru_id' => $guru[6]->id ?? $guru[0]->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama_eskul' => 'Seni Musik',
                'logo' => null,
                'pembina' => $guru[7]->nama_guru ?? 'Pembina Seni Musik',
                'guru_id' => $guru[7]->id ?? $guru[0]->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama_eskul' => 'English Club',
                'logo' => null,
                'pembina' => $guru[8]->nama_guru ?? 'Pembina English Club',
                'guru_id' => $guru[8]->id ?? $guru[0]->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama_eskul' => 'IT Club',
                'logo' => null,
                'pembina' => $guru[9]->nama_guru ?? 'Pembina IT Club',
                'guru_id' => $guru[9]->id ?? $guru[0]->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $this->command->info('10 data ekstrakurikuler berhasil ditambahkan.');
    }
}