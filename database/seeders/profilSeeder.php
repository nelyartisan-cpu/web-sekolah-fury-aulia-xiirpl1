<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profil;

class ProfilSeeder extends Seeder
{
    public function run(): void
    {
        Profil::updateOrCreate(
            [
                'id' => 1,
            ],
            [
                'nama_sekolah' => 'SMK Negeri 1 Cijati',

                'alamat' => 'Jl. Raya Cijati, Kecamatan Cijati, Kabupaten Cianjur, Jawa Barat',

                'visi' => 'Menjadi sekolah kejuruan yang unggul dalam menghasilkan lulusan yang kompeten, kreatif, berkarakter, berwawasan lingkungan, dan mampu bersaing di dunia kerja maupun melanjutkan pendidikan ke jenjang yang lebih tinggi.',

                'misi' => '1. Menyelenggarakan pendidikan kejuruan yang berkualitas dan sesuai dengan perkembangan dunia kerja.
                
                            2. Meningkatkan kompetensi peserta didik sesuai dengan bidang keahlian masing-masing.

                            3. Membentuk peserta didik yang disiplin, bertanggung jawab, kreatif, dan berkarakter.

                            4. Mengembangkan potensi peserta didik melalui kegiatan akademik dan nonakademik.

                            5. Meningkatkan kerja sama dengan dunia usaha dan dunia industri.

                            6. Menciptakan lingkungan sekolah yang aman, nyaman, bersih, dan kondusif.

                            7. Membekali peserta didik dengan keterampilan dan wawasan untuk menghadapi perkembangan teknologi.',

                'sejarah' => 'SMK Negeri 1 Cijati merupakan salah satu satuan pendidikan menengah kejuruan yang berkomitmen dalam memberikan pendidikan dan keterampilan kepada generasi muda. Sekolah ini terus berupaya meningkatkan kualitas pembelajaran, fasilitas pendidikan, kompetensi tenaga pendidik, serta pengembangan potensi peserta didik.

                                Dalam perkembangannya, SMK Negeri 1 Cijati terus menyesuaikan program pendidikan dengan kebutuhan dunia kerja dan perkembangan teknologi. Berbagai kegiatan akademik dan ekstrakurikuler dikembangkan untuk mendukung pembentukan peserta didik yang kompeten, kreatif, mandiri, disiplin, dan memiliki karakter yang baik.

                                Dengan semangat untuk memberikan pendidikan yang berkualitas, SMK Negeri 1 Cijati berkomitmen untuk terus mencetak generasi unggul, kreatif, dan berkarakter.',

                'logo' => 'images/logo-smk.jpg',
            ]
        );
    }
}