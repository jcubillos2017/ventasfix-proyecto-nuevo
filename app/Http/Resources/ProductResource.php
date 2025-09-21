<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'sku'           => $this->sku,
            'nombre'        => $this->nombre,
            'desc_corta'    => $this->desc_corta,
            'desc_larga'    => $this->desc_larga,
            'imagen_url'    => $this->imagen_url,
            'precio_neto'   => $this->precio_neto,
            'precio_venta'  => $this->precio_venta,
            'stock_actual'  => $this->stock_actual,
            'stock_minimo'  => $this->stock_minimo,
            'stock_bajo'    => $this->stock_bajo,
            'stock_alto'    => $this->stock_alto,
            'created_at'    => $this->created_at,
        ];
    }
}
