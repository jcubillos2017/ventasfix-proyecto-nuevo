<?php

namespace App\Services;

use Illuminate\Support\Collection;

class PricingService
{
    private int $ivaPct;

    public function __construct()
    {
        $this->ivaPct = (int) env('IVA_PCT', 19);
    }

    public function priceItem(int $precioNeto, int $cantidad, int $descuentoNeto = 0): array
    {
        $subtotalNeto = max($precioNeto * $cantidad - $descuentoNeto, 0);
        $iva = intdiv($subtotalNeto * $this->ivaPct, 100);
        $totalBruto = $subtotalNeto + $iva;
        return ['subtotalNeto'=>$subtotalNeto,'iva'=>$iva,'totalBruto'=>$totalBruto];
    }

    public function summarize(Collection $items): array
    {
        $subtotal = $items->sum('total_neto');
        $iva = intdiv($subtotal * $this->ivaPct, 100);
        $total = $subtotal + $iva;
        return ['subtotal_neto'=>$subtotal,'iva'=>$iva,'total_bruto'=>$total];
    }
}
