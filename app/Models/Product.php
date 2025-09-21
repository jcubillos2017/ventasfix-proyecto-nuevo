<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'sku','nombre','desc_corta','desc_larga','imagen_url',
        'precio_neto','precio_venta',
        'stock_actual','stock_minimo','stock_bajo','stock_alto',
    ];
}
