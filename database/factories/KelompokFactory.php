<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KelompokFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama_kelompok' => 'Pino Fandu Winata 241230066', 'Angelira Devani 241230054' .fake()->numberBetween(1, 10),
            'prodi' => 'Sistem Informasi',
            'mata_kuliah' => 'AIK 4',
            'dosen' => fake()->name().', M.M.',
        ];
    }
}
