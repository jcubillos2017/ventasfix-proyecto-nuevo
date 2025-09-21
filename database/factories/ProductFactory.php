<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    
    public function definition(): array
    {
        $precioNeto = fake()->numberBetween(5000, 80000); //pesos
        return [
            'sku' => strtoupper(fake()->bothify('VF-###??')),
            'nombre' => fake()->word(3,true),
            'desc_corta' => fake()->sentence(8),
            'desc_larga' => fake()->paragraph(),
            'imagen_url' => 'https://picsum.photos/seed/'.fake()->uuid. '/300/200',
            'precio_neto' => $precioNeto * 100,
            'precio_venta' => (int) round($precioNeto * 1.19) * 100,
            'stock_actual' => fake()->numberBetween(0, 80),
            'stock_minimo' => 10,
            'stock_bajo' => 20,
            'stock_alto' => 60,
        ];
    }
}