<?php

namespace Database\Factories;

use App\Models\Anggota;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Anggota>
 */
class AnggotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       return [
            'nama' => fake('id_ID')->name(),
            'no_hp' => fake('id_ID')->phoneNumber(),
            'alamat' => fake('id_ID')->address(),
            'tanggal_daftar' => fake()->date('Y-m-d', 'now'), // 'now' memastikan tidak ada tanggal masa depan
        ];
    }
}
