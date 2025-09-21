@extends('layouts.backoffice')
@section('title', 'Carro')

@section('content')
    <h1 class="h4 mb-3">Carro</h1>

    @php
        $fmt = fn($cents) => '$' . number_format(($cents ?? 0) / 100, 0, ',', '.');
    @endphp

    <x-data-table :headers="['SKU', 'Nombre', 'Cantidad', 'Total', 'Acciones']">
        @forelse($cart->items as $item)
            <tr>
                <td>{{ $item->sku }}</td>
                <td>{{ $item->nombre }}</td>
                <td>
                    <form method="POST" action="{{ route('cart.update', $item->id) }}" class="d-flex gap-2">
                        @csrf @method('PATCH')
                        <input type="number" name="cantidad" value="{{ $item->cantidad }}" min="1"
                            class="form-control w-auto">
                        <button class="btn btn-sm btn-primary">Actualizar</button>
                    </form>
                </td>
                <td>{{ $fmt($ci->total_bruto) }}</td>

                <td>
                    <form method="POST" action="{{ route('cart.remove', $item->id) }}"
                        onsubmit="return confirm('¿Eliminar item?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center p-3 text-muted">El carro está vacío</td>
            </tr>
        @endforelse
    </x-data-table>


    @php($t = $cart->totals_json ?? [])
    <div class="mt-3">
        <strong>Subtotal:</strong> ${{ number_format(($t['subtotal_neto'] ?? 0) / 100, 0, ',', '.') }}
        <strong class="ms-3">IVA:</strong> ${{ number_format(($t['iva'] ?? 0) / 100, 0, ',', '.') }}
        <strong class="ms-3">Total:</strong> ${{ number_format(($t['total_bruto'] ?? 0) / 100, 0, ',', '.') }}
    </div>

    <form class="mt-3" method="POST" action="{{ route('cart.convert') }}">
        @csrf
        <div class="row g-2 align-items-end">
            <div class="col-auto">
                <label class="form-label">Cliente</label>
                <select name="client_id" class="form-select">
                    @foreach (\App\Models\Client::all() as $c)
                        <option value="{{ $c->id }}">{{ $c->razon_social }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto">
                <button class="btn btn-success">Confirmar pedido</button>
            </div>
        </div>
    </form>

    <form method="POST" action="{{ route('cart.add') }}" class="row g-2 mb-3">
        @csrf
        <div class="col-auto">
            <label class="form-label">Producto</label>
            <select name="product_id" class="form-select">
                @foreach (\App\Models\Product::orderBy('nombre')->limit(50)->get() as $p)
                    <option value="{{ $p->id }}">{{ $p->sku }} — {{ $p->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-auto">
            <label class="form-label">Cantidad</label>
            <input type="number" name="cantidad" value="1" min="1" class="form-control">
        </div>
        <div class="col-auto align-self-end">
            <button class="btn btn-primary">Agregar</button>
        </div>
    </form>

@endsection
