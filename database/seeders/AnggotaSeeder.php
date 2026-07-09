<?php

namespace Database\Seeders;

use App\Models\Anggota;
use Illuminate\Database\Seeder;

class AnggotaSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            ['nama' => 'Pino Fandu Winata', 'nim' => '241230066', 'peran' => 'Project Manager'],
            ['nama' => 'Angelira Devani', 'nim' => '241230054', 'peran' => 'UI/UX Designer'],
            ['nama' => 'Rifa Wulandari', 'nim' => '241230058', 'peran' => 'Back-end Developer'],
            ['nama' => 'Diana Maliha Muntaz', 'nim' => '241230056', 'peran' => 'Front-end Developer'],
        ];

        foreach ($members as $member) {
            Anggota::query()->updateOrCreate(
                ['nim' => $member['nim']],
                $member
            );
        }
    }
}
