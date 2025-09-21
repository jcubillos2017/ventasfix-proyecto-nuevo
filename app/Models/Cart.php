<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id','client_id','status','currency','totals_json','expires_at'];
    protected $casts = ['totals_json'=>'array','expires_at'=>'datetime'];
    public function items(){ 
        return $this->hasMany(CartItem::class); 
    }
    public function user(){ 
        return $this->belongsTo(User::class); 
    }
    public function client(){ 
        return $this->belongsTo(Client::class); 
    }
    public function refreshTotals(): self {
        $sumNeto  = (int) $this->items()->sum('total_neto');
        $sumBruto = (int) $this->items()->sum('total_bruto');
        $iva      = $sumBruto - $sumNeto;

        $this->totals_json = [
            'subtotal_neto' => $sumNeto,
            'iva'           => $iva,
            'total_bruto'   => $sumBruto,
        ];
        return $this;
    }
}
