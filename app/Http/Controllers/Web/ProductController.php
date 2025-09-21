<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        // Aplica la policy automáticamente a las acciones REST
        $this->authorizeResource(Product::class, 'product');
    }

    public function index(Request $request)
    {
        $q = trim($request->get('q', ''));
        $products = Product::query()
            ->when($q, fn($qb) => $qb->where(function($w) use ($q) {
                $w->where('sku','like',"%$q%")->orWhere('nombre','like',"%$q%");
                
            }))
            ->orderByDesc('id')
            ->paginate(15)
            ->withQueryString();

        return view('products.index', compact('products', 'q'));
    }

    public function create()
    {
        return view('products.create', ['product' => new Product()]);
    }
    //****************************************************************************************************** */
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();

        // Calcula precio_venta (con IVA)
        $ivaPct = (int) (config('app.iva_pct', env('IVA_PCT', 19)));
        $data['precio_venta'] = (int) round($data['precio_neto'] * (1 + $ivaPct / 100));

        Product::create($data);

        return redirect()->route('products.index')->with('status','Producto creado');
    }
    //****************************************************************************************************** */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
//****************************************************************************************************** */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }
    //****************************************************************************************************** */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();

        $ivaPct = (int) (config('app.iva_pct', env('IVA_PCT', 19)));
        $data['precio_venta'] = (int) round($data['precio_neto'] * (1 + $ivaPct / 100));


        $product->update($data);

        return redirect()->route('products.index')->with('status','Producto actualizado');
    }
//****************************************************************************************************** */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('status','Producto eliminado');
    }
}
