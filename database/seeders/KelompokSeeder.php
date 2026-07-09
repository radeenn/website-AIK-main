<?php

namespace Database\Seeders;

use App\Models\Kelompok;
use Illuminate\Database\Seeder;

class KelompokSeeder extends Seeder
{
    public function run(): void
    {
        Kelompok::query()->updateOrCreate(
            ['id' => 1],
            [
                'nama_kelompok' => "Pino Fandu Winata 241230066\nAngelira Devani 241230054\nRifa Wulandari 241230058\nDiana Maliha Muntaz 241230056",
                'prodi' => 'Sistem Informasi',
                'mata_kuliah' => 'AIK 4',
                'dosen' => 'Dedy Susanto, S.Pd.I., M.M.',
            ]
        );
    }
}
