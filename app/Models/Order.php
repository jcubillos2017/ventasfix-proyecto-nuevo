<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'cart_id','user_id','client_id','status','subtotal_neto','iva','total_bruto','moneda','softland_doc_ref'
    ];
    public function items(){ return $this->hasMany(OrderItem::class); }
}
