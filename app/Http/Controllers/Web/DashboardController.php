<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\Client;
use App\Models\Order;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $lowStock = Product::query()
            ->whereColumn('stock_actual', '<=', 'stock_bajo')   // usa 'stock_minimo' si tu tabla lo llama así
            ->orderBy('stock_actual')
            ->take(10)
            ->get(['sku','nombre','stock_actual','stock_bajo']);

        return view('dashboard', [
            'usersCount'    => User::count(),
            'productsCount' => Product::count(),
            'clientsCount'  => Client::count(),
            'ordersCount'   => Order::count(),
            'lowStock'      => $lowStock,
        ]);
    }
}
