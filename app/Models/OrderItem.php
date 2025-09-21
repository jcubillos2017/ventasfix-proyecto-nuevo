<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id','product_id','sku','nombre','cantidad','precio_neto','iva','precio_bruto','descuento_neto','total_neto','total_bruto'
    ];
    public function order(){ return $this->belongsTo(Order::class); }
}
