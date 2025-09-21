<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartItem extends Model
{
    use HasFactory;

    protected $table = 'cart_items';

    protected $fillable = [
        'cart_id', 'product_id', 'cantidad',
        // puedes permitir asignación masiva de estos si lo deseas:
        // 'sku','nombre','precio_neto','iva','precio_bruto','descuento_neto','total_neto','total_bruto','metadata'
    ];

    protected $casts = [
        'metadata' => 'array',
    ];

    public function cart()    { return $this->belongsTo(Cart::class); }
    public function product() { return $this->belongsTo(Product::class); }

    protected static function booted()
    {
        // Completar denormalizados al CREAR
        static::creating(function (CartItem $item) {
            $product = $item->product ?? Product::findOrFail($item->product_id);

            // Copias mínimas obligatorias según tu esquema
            $item->sku    = $product->sku;
            $item->nombre = $product->nombre;

            // precio unitario neto desde products (en centavos)
            $item->precio_neto = (int) ($item->precio_neto ?: ($product->precio_neto ?? 0));

            // si no te pasan descuento, deja 0
            if (is_null($item->descuento_neto)) {
                $item->descuento_neto = 0;
            }

            self::recalculate($item);
        });

        // Recalcular al GUARDAR (crear/actualizar)
        static::saving(function (CartItem $item) {
            // Asegura valores enteros
            $item->cantidad       = (int) $item->cantidad;
            $item->precio_neto    = (int) $item->precio_neto;
            $item->descuento_neto = (int) ($item->descuento_neto ?? 0);
            $item->cart?->refreshTotals()->save();
            self::recalculate($item);
        });
    }

    /**
     * Recalcula iva, precio_bruto (unitario), total_neto y total_bruto.
     * - precio_neto: unitario neto (centavos)
     * - iva: unitario (centavos)
     * - precio_bruto: unitario con IVA
     * - total_neto: (precio_neto * cantidad) - descuento_neto
     * - total_bruto: total_neto + IVA_total
     */
    protected static function recalculate(CartItem $item): void
    {
        $ivaPct = (int) (env('IVA_PCT', 19)); // por defecto 19%

        $precioNetoUnit = max(0, (int) $item->precio_neto);
        $cantidad       = max(1, (int) $item->cantidad);

        // IVA y bruto UNITARIOS
        $ivaUnit        = (int) round($precioNetoUnit * ($ivaPct / 100));
        $precioBrutoUnit= $precioNetoUnit + $ivaUnit;

        // Totales
        $subtotalNeto   = $precioNetoUnit * $cantidad;
        $descuento      = max(0, (int) ($item->descuento_neto ?? 0));
        $totalNeto      = max(0, $subtotalNeto - $descuento);

        $ivaTotal       = (int) round($totalNeto * ($ivaPct / 100));
        $totalBruto     = $totalNeto + $ivaTotal;

        // Asignar a columnas requeridas por tu tabla
        $item->iva           = $ivaUnit;        // unitario
        $item->precio_bruto  = $precioBrutoUnit; // unitario
        $item->total_neto    = $totalNeto;
        $item->total_bruto   = $totalBruto;
    }
}
