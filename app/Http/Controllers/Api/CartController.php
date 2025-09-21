<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartAddItemRequest;
use App\Http\Resources\{CartResource, CartItemResource, OrderResource};
use App\Models\{Product, CartItem, Client, Cart};
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CartController extends Controller
{
    use AuthorizesRequests;
    public function __construct(private CartService $service) {}

    public function show(Request $request)
    {
        $cart = $this->service->getActiveCartFor($request->user());
        return new CartResource($cart->load('items'));
    }

    public function addItem(CartAddItemRequest $request)
    {
        $user = $request->user();
        $cart = $this->service->getActiveCartFor($user);
        $product = Product::findOrFail($request->integer('product_id'));
        $item = $this->service->addItem($cart, $product, $request->integer('cantidad'));
        return (new CartItemResource($item))->response()->setStatusCode(201);
    }

    public function updateQty(CartItem $item, Request $request)
    {
        $request->validate(['cantidad'=>['required','integer','min:1','max:10000']]);
        $this->authorize('update', $item->cart);
        $updated = $this->service->updateQty($item->cart, $item, $request->integer('cantidad'));
        return new CartItemResource($updated);
    }

    public function removeItem(CartItem $item)
    {
        $this->authorize('update', $item->cart);
        $this->service->removeItem($item->cart, $item);
        return response()->noContent();
    }

    public function clear(Request $request)
    {
        $cart = Cart::where('user_id',$request->user()->id)->where('status','active')->firstOrFail();
        $this->authorize('update', $cart);
        $this->service->clear($cart);
        return response()->noContent();
    }

    public function convert(Request $request)
    {
        $data = $request->validate(['client_id'=>['required','exists:clients,id']]);
        $cart = Cart::where('user_id',$request->user()->id)->where('status','active')->firstOrFail();
        $order = $this->service->convertToOrder($cart, $request->user(), Client::find($data['client_id']));
        return new OrderResource($order->load('items'));
    }
}
