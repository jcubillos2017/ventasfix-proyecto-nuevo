<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartItemResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'product_id'=>$this->product_id,
            'sku'=>$this->sku,
            'nombre'=>$this->nombre,
            'cantidad'=>$this->cantidad,
            'precio_neto'=>$this->precio_neto,
            'iva'=>$this->iva,
            'precio_bruto'=>$this->precio_bruto,
            'total_neto'=>$this->total_neto,
            'total_bruto'=>$this->total_bruto,
        ];
    }
}
