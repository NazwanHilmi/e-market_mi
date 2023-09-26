<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Produk;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode_barang' => "K".sprintf('%08d', fake()->unique()->numberBetween(1,99999999)),
            'nama_barang' => fake()->randomElement(['Bimoli', 'Mie Sedap Ayam', 'Indomie Goreng', 'Sabun Lifebouy']),
            'satuan' => fake()->randomElement(['pcs', 'item', 'lusin']),
            'harga_jual' => fake()->numberBetween(1000, 10000000000),
            'stok' => fake()->numberBetween(1, 1000),
            'produk_id' => fake()->randomElement(Produk::select('id')->get()),
            'user_id' => '1'            
        ];
    }
}
