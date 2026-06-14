<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $categories = ['Vandel', 'Prasasti', 'Kijangan'];
        $category = fake()->randomElement($categories);

        $imageMap = [
            'Vandel' => fake()->randomElement(['assets/vandelmarmer.png', 'assets/vandel-produk.png']),
            'Prasasti' => 'assets/batu-produk.png',
            'Kijangan' => 'assets/kijangan-produk.png',
        ];

        $namePrefixes = [
            'Vandel' => ['Vandel Marmer', 'Vandel Akrilik', 'Vandel Kaca', 'Vandel Kayu', 'Vandel Stainless'],
            'Prasasti' => ['Prasasti Marmer', 'Prasasti Granit', 'Prasasti Batu', 'Prasasti Kuningan'],
            'Kijangan' => ['Kijangan Bali', 'Kijangan Ukir', 'Kijangan Motif', 'Kijangan Premium'],
        ];

        return [
            'name' => fake()->randomElement($namePrefixes[$category]) . ' ' . fake()->numberBetween(100, 999),
            'description' => fake()->paragraph(3),
            'category' => $category,
            'price' => fake()->numberBetween(50000, 500000),
            'total_product' => fake()->numberBetween(1, 50),
            'img_path' => $imageMap[$category],
        ];
    }
}