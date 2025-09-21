<?php

namespace App\Services;

use App\Models\{Product, InventoryMovement};
use Illuminate\Database\Eloquent\Model;
use DomainException;

class InventoryService
{
    public function ensureStock(Product $p, int $cantidad): void
    {
        if ($p->stock_actual < $cantidad) {
            throw new DomainException('Stock insuficiente para SKU '.$p->sku);
        }
    }

    public function reserve(Product $p, int $cantidad, Model $ref): void
    {
        $this->ensureStock($p, $cantidad);
        $p->decrement('stock_actual', $cantidad);
        InventoryMovement::create([
            'product_id'=>$p->id,
            'type'=>'reservation',
            'quantity'=>$cantidad,
            'reference_type'=>class_basename($ref),
            'reference_id'=>$ref->id,
        ]);
    }

    public function release(Product $p, int $cantidad, Model $ref): void
    {
        $p->increment('stock_actual', $cantidad);
        InventoryMovement::create([
            'product_id'=>$p->id,
            'type'=>'release',
            'quantity'=>$cantidad,
            'reference_type'=>class_basename($ref),
            'reference_id'=>$ref->id,
        ]);
    }
}
