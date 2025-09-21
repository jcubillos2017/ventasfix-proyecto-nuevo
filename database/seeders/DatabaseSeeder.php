<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\{User, Product, Client};

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->create([
            'name'=>'Admin VentasFix',
            'rut'=>'11.111.111-1',
            'nombre'=>'Admin',
            'apellido'=>'VentasFix',
            'email'=>'admin@ventasfix.cl',
            'password'=>Hash::make('Password123!')
        ]);

        for($i=1;$i<=20;$i++){
            Product::create([
                'sku'=>"SKU$i",
                'nombre'=>"Producto $i",
                'desc_corta'=>"Descripcion corta del producto $i",
                'desc_larga'=>"Descripcion larga del producto $i",
                'imagen_url'=>"https://picsum.photos/seed/$i/600/400",
                'precio_neto'=>rand(1000,5000),
                'precio_venta'=>0, // opcional, puede calcularse y mantenerse alineado
                'stock_actual'=>rand(10,100),
                'stock_minimo'=>5,
                'stock_bajo'=>10,
                'stock_alto'=>200,
            ]);
        }

        for($j=1;$j<=5;$j++){
            Client::create([
                'rut_empresa'=>"77.777.77$j-0",
                'rubro'=>"Rubro $j",
                'razon_social'=>"Cliente Empresa $j",
                'telefono'=>'+56 2 2' . rand(1000000,9999999),
                'direccion'=>"Calle Falsa $j",
                'contacto_nombre'=>"Contacto $j",
                'contacto_email'=>"contacto$j@empresa.com",
            ]);

              Product::factory(25)->create();
              Client::factory(8)->create();
        }
    }
}
