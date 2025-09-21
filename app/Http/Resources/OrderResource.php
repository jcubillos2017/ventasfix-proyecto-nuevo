<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'status'=>$this->status,
            'subtotal_neto'=>$this->subtotal_neto,
            'iva'=>$this->iva,
            'total_bruto'=>$this->total_bruto,
            'items'=> OrderItemResource::collection($this->whenLoaded('items')),
        ];
    }
}
