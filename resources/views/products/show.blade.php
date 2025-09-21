@extends('layouts.backoffice')
@section('title', 'Detalle Producto')


@section('content')
    <div class="d-flex align-items-center mb-3">
        <h1 class="h4 mb-0">{{ $product->sku }} — {{ $product->nombre }}</h1>

        <a href="{{ route('products.edit', $product) }}" class="btn btn-primary btn-sm ms-auto">Editar</a>
        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary btn-sm ms-2">Volver</a>


    </div>

    <div class="row g-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <p class="text-muted">{{ $product->desc_corta }}</p>
                    <p>{{ $product->desc_larga }}</p>
                    <div class="mt-3">
                        <strong>Precio neto:</strong> ${{ number_format($product->precio_neto / 100, 0, ',', '.') }}<br>
                        <strong>Precio venta:</strong> ${{ number_format($product->precio_venta / 100, 0, ',', '.') }}
                    </div>
                    <div class="mt-3">
                        <form method="POST" action="{{ route('cart.add') }}">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="cantidad" value="1">
                            <button class="btn btn-success">Añadir al carro</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <img src="{{ $product->imagen_url }}" alt="{{ $product->nombre }}" class="img-fluid rounded">
            <div class="mt-3">
                <span class="badge bg-secondary">Stock: {{ $product->stock_actual }}</span>
            </div>
        </div>
    </div>
@endsection
