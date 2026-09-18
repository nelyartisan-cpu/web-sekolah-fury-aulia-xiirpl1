<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed database aplikasi.
     */
    public function run(): void
    {
        $this->call([

            // ==========================================
            // 1. ADMIN
            // ==========================================
            AdminSeeder::class,

            // ==========================================
            // 2. JURUSAN
            // ==========================================
            JurusanSeeder::class,

            // ==========================================
            // 3. GURU
            // Guru harus dibuat sebelum ekstrakurikuler
            // ==========================================
            GuruSeeder::class,

            // ==========================================
            // 4. EKSTRAKURIKULER
            // Menggunakan guru_id dari tabel gurus
            // ==========================================
            EkstrakurikulerSeeder::class,

            // ==========================================
            // 5. KATEGORI ARTIKEL
            // Harus dibuat sebelum artikel
            // ==========================================
            KategoriArtikelSeeder::class,

            // ==========================================
            // 6. ARTIKEL
            // ==========================================
            ArtikelSeeder::class,

            // ==========================================
            // 7. PROFIL SEKOLAH
            // ==========================================
            ProfilSeeder::class,

        ]);
    }
}