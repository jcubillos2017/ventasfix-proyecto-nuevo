<?php

namespace App\Services;

use App\Models\{Cart, CartItem, Product, Order, OrderItem, Client, User};
use Illuminate\Support\Facades\DB;

class CartService
{
    public function __construct(
        private PricingService $pricing,
        private InventoryService $inventory,
    ) {}

    public function getActiveCartFor(User $user, ?Client $client = null): Cart
    {
        return Cart::firstOrCreate([
            'user_id'=>$user->id,
            'status'=>'active',
            'client_id'=>optional($client)->id,
        ]);
    }

    public function addItem(Cart $cart, Product $product, int $cantidad): CartItem
    {
        return DB::transaction(function () use ($cart,$product,$cantidad) {
            $item = $cart->items()->firstOrNew(['product_id'=>$product->id]);
            $nuevaCantidad = max(($item->exists ? $item->cantidad : 0) + $cantidad, 1);
            $this->inventory->ensureStock($product, $cantidad);

            $precioNeto = $product->precio_neto;
            $calc = $this->pricing->priceItem($precioNeto, $nuevaCantidad, $item->descuento_neto ?? 0);

            $item->fill([
                'sku'=>$product->sku,
                'nombre'=>$product->nombre,
                'cantidad'=>$nuevaCantidad,
                'precio_neto'=>$precioNeto,
                'iva'=>$calc['iva'],
                'precio_bruto'=>$precioNeto + intdiv($precioNeto * 19,100),
                'total_neto'=>$calc['subtotalNeto'],
                'total_bruto'=>$calc['totalBruto'],
            ])->save();

            $this->inventory->reserve($product, $cantidad, $cart);

            $this->recalculateCartTotals($cart);
            return $item;
        });
    }

    public function updateQty(Cart $cart, CartItem $item, int $nuevaCantidad): CartItem
    {
        return DB::transaction(function () use ($cart,$item,$nuevaCantidad) {
            $delta = $nuevaCantidad - $item->cantidad;
            if ($delta > 0) $this->inventory->ensureStock($item->product, $delta);

            $calc = $this->pricing->priceItem($item->precio_neto, $nuevaCantidad, $item->descuento_neto);
            $item->update([
                'cantidad'=>$nuevaCantidad,
                'iva'=>$calc['iva'],
                'total_neto'=>$calc['subtotalNeto'],
                'total_bruto'=>$calc['totalBruto'],
            ]);

            if ($delta > 0) $this->inventory->reserve($item->product, $delta, $cart);
            if ($delta < 0) $this->inventory->release($item->product, abs($delta), $cart);

            $this->recalculateCartTotals($cart);
            return $item;
        });
    }

    public function removeItem(Cart $cart, CartItem $item): void
    {
        DB::transaction(function () use ($cart,$item) {
            $this->inventory->release($item->product, $item->cantidad, $cart);
            $item->delete();
            $this->recalculateCartTotals($cart);
        });
    }

    public function clear(Cart $cart): void
    {
        DB::transaction(function () use ($cart) {
            foreach ($cart->items as $it) {
                $this->inventory->release($it->product, $it->cantidad, $cart);
            }
            $cart->items()->delete();
            $this->recalculateCartTotals($cart);
        });
    }

    public function convertToOrder(Cart $cart, User $user, Client $client): Order
    {
        return DB::transaction(function () use ($cart,$user,$client) {
            $cart->update(['status'=>'converted','client_id'=>$client->id]);
            $totals = $this->pricing->summarize($cart->items);

            $order = Order::create([
                'cart_id'=>$cart->id,
                'user_id'=>$user->id,
                'client_id'=>$client->id,
                'status'=>'confirmed',
                'subtotal_neto'=>$totals['subtotal_neto'],
                'iva'=>$totals['iva'],
                'total_bruto'=>$totals['total_bruto'],
            ]);

            foreach ($cart->items as $it) {
                OrderItem::create([
                    'order_id'=>$order->id,
                    'product_id'=>$it->product_id,
                    'sku'=>$it->sku,
                    'nombre'=>$it->nombre,
                    'cantidad'=>$it->cantidad,
                    'precio_neto'=>$it->precio_neto,
                    'iva'=>$it->iva,
                    'precio_bruto'=>$it->precio_bruto,
                    'descuento_neto'=>$it->descuento_neto,
                    'total_neto'=>$it->total_neto,
                    'total_bruto'=>$it->total_bruto,
                ]);
            }

            // TODO: dispatch(new SyncOrderWithSoftland($order->id));
            return $order;
        });
    }

    private function recalculateCartTotals(Cart $cart): void
    {
        $totals = $this->pricing->summarize($cart->items);
        $cart->update(['totals_json'=>$totals]);
    }
}
