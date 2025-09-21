@extends('layouts.backoffice')
@section('title', 'Editar Producto')

@section('content')
    <div class="d-flex align-items-center mb-3">
        <h1 class="h4 mb-0">Editar Producto</h1>
        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary btn-sm ms-auto">Volver</a>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <form method="POST" action="{{ route('products.update', $product) }}">
                @csrf @method('PUT')
                @include('products.form', ['product' => $product])
                <div class="mt-3 d-flex gap-2">
                    <button class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('products.show', $product) }}" class="btn btn-outline-secondary">Ver</a>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body d-flex align-items-center">
            <img src="{{ $product->imagen_url }}" alt="{{ $product->nombre }}" class="img-thumbnail me-3"
                style="max-width:180px">
            <div class="text-muted">
                Vista previa de imagen
            </div>
        </div>
    </div>
@endsection
