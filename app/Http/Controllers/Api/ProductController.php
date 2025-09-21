<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        // Requiere tener ProductPolicy mapeada en AuthServiceProvider
        $this->authorizeResource(Product::class, 'product');
    }

    public function index(Request $request)
    {
        $q = trim($request->get('q', ''));
        $products = Product::query()
            ->when($q, function ($qb) use ($q) {
                $qb->where(function ($w) use ($q) {
                    $w->where('sku', 'like', "%{$q}%")
                      ->orWhere('nombre', 'like', "%{$q}%");
                });
            })
            ->orderByDesc('id')
            ->paginate(15)
            ->withQueryString();

        return ProductResource::collection($products);
    }

    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    public function store(StoreProductRequest $request)
    {
        // Ya validado por el Form Request
        $data = $request->validated();

        // Calcula precio_venta desde precio_neto e IVA
        $ivaPct = (int) (config('app.iva_pct', env('IVA_PCT', 19)));
        $data['precio_venta'] = (int) round($data['precio_neto'] * (1 + $ivaPct / 100));

        $product = Product::create($data);

        return (new ProductResource($product))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        // Ya validado por el Form Request
        $data = $request->validated();

        // Recalcula precio_venta si cambia precio_neto
        $ivaPct = (int) (config('app.iva_pct', env('IVA_PCT', 19)));
        $data['precio_venta'] = (int) round($data['precio_neto'] * (1 + $ivaPct / 100));

        $product->update($data);

        return new ProductResource($product);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(null, 204);
    }
}
