<?php

namespace Database\Factories;

use App\Domain\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $categories = [
            'Eletrônicos',
            'Roupas',
            'Alimentos',
            'Móveis',
            'Brinquedos',
            'Livros',
            'Beleza',
            'Esportes',
            'Ferramentas',
            'Automotivo'
        ];

        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'quantity' => $this->faker->numberBetween(1, 100),
            'price' => $this->faker->randomFloat(2, 10, 500),
            'category' => $this->faker->randomElement($categories),
            'sku' => strtoupper(Str::random(8)) . $this->faker->unique()->numerify('###'),
        ];
    }
}
