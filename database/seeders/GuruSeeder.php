<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Guru;

class GuruSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama_guru' => 'Budi Santoso',
                'nip' => '198501012010011001',
                'foto' => null,
            ],

            [
                'nama_guru' => 'Siti Aminah',
                'nip' => '198602022011012002',
                'foto' => null,
            ],

            [
                'nama_guru' => 'Dedi Kurniawan',
                'nip' => '198703032012031003',
                'foto' => null,
            ],

            [
                'nama_guru' => 'Rina Marlina',
                'nip' => '198804042013042004',
                'foto' => null,
            ],

            [
                'nama_guru' => 'Agus Setiawan',
                'nip' => '198905052014051005',
                'foto' => null,
            ],
        ];

        foreach ($data as $guru) {
            Guru::updateOrCreate(
                [
                    'nip' => $guru['nip'],
                ],
                $guru
            );
        }
    }
}