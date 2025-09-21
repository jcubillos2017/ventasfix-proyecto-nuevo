<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class ClientFactory extends Factory
{
    public function definition(): array
    {
        return [
            'rut_empresa'           => fake()->unique()->bothify('76.###.###-#'),
            'rubro'                 => fake()->randomElement(['Retail','Construcción','Alimentos','Servicios']),
            'razon_social'          => 'Empresa ' . fake()->company(),
            'telefono'              => '+56 9 ' . fake()->randomNumber(8, true),
            'direccion'             => fake()->streetAddress().', '.fake()->city(),
            'contacto_nombre'       => fake()->name(),
            'contacto_email'        => fake()->unique()->safeEmail(),
        ];
    }
}
