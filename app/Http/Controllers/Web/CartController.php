<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\{Product, Client};
use App\Services\CartService;
use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function __construct(private CartService $service) {}

    public function show(Request $request)
    {
        $cart = $this->service->getActiveCartFor($request->user());
        return view('cart.show', compact('cart'));
    }

    public function add(Request $request)
    {
        $data = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'cantidad' => ['required', 'integer', 'min:1']
        ]);
        // $cart = $this->service->getActiveCartFor($request->user());
        $cart = Cart::firstOrCreate(['user_id' => $request->user()->id]);
        if ($cart->status !== 'active') {
            $cart->status = 'active';
            $cart->save();
        }
        $product = Product::findOrFail($data['product_id']);
        $cart    = Cart::firstOrCreate(['user_id' => $request->user()->id]);

        $item = $cart->items()->firstOrCreate(['product_id'=>$product->id], ['cantidad'=>0]);

        if ($item->cantidad + $data['cantidad'] > $product->stock_actual) {
            return back()->withErrors(['Stock Insuficiente para este producto']);
        }

        $item->cantidad += (int) $data['cantidad'];
        $item->save();
        $this->service->addItem($cart, $product, $data['cantidad']);
        return back()->with('status', 'Producto agregado');
    }

    public function update(Request $request, int $itemId)
    {

        $data = $request->validate(['cantidad' => ['required', 'integer', 'min:1']]);
        $cart = $this->service->getActiveCartFor($request->user());
        $item = $cart->items()->findOrFail($itemId);
        $this->service->updateQty($cart, $item, $data['cantidad']);
        return back()->with('status', 'Cantidad actualizada');
    }

    public function remove(Request $request, int $itemId)
    {
        $cart = $this->service->getActiveCartFor($request->user());
        $item = $cart->items()->findOrFail($itemId);
        $this->service->removeItem($cart, $item);
        return back()->with('status', 'Item eliminado');
    }

    public function convert(Request $request)
    {
        $data = $request->validate(['client_id' => ['required', 'exists:clients,id']]);
        $cart = $this->service->getActiveCartFor($request->user());
        $client = Client::findOrFail($data['client_id']);
        $this->service->convertToOrder($cart, $request->user(), $client);
        return redirect()->route('dashboard')->with('status', 'Pedido confirmado');
    }
}
