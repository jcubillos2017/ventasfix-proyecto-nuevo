@extends('layouts.backoffice')
@section('title', 'Productos')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4 mb-0">Productos</h1>
        <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary">Nuevo producto</a>
    </div>

    <form method="GET" class="row g-2 mb-3">
        <div class="col-auto">
            <input type="text" name="q" class="form-control" placeholder="Buscar por SKU o Nombre"
                value="{{ request('q') }}">
        </div>
        <div class="col-auto">
            <button class="btn btn-outline-secondary">Buscar</button>
        </div>
    </form>

    <x-data-table :headers="['SKU', 'Nombre', 'Stock', 'Precio Neto', 'Precio Venta', 'Acciones']" empty="No hay productos">
        @forelse($products as $p)
            <tr>
                <td>{{ $p->sku }}</td>
                <td>{{ $p->nombre }}</td>
                <td>{{ $p->stock_actual }}</td>
                <td>${{ number_format($p->precio_neto, 0, ',', '.') }}</td>
                <td>${{ number_format($p->precio_venta, 0, ',', '.') }}</td>
                <td class="text-nowrap">
                    @can('view', $p)
                        @php $show = route('products.show', $p); @endphp
                    @else
                        @php $show = null; @endphp
                    @endcan
                    @can('update', $p)
                        @php $edit = route('products.edit', $p); @endphp
                    @else
                        @php $edit = null; @endphp
                    @endcan
                    @can('delete', $p)
                        @php $delete = route('products.destroy', $p); @endphp
                    @else
                        @php $delete = null; @endphp
                    @endcan
                    <x-table-actions :show="$show" :edit="$edit" :delete="$delete"
                        confirm="¿Eliminar el producto {{ $p->sku }} - {{ $p->nombre }}?" />
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center text-muted p-3">No hay productos</td>
            </tr>
        @endforelse
    </x-data-table>

    <div class="mt-3">
        {{ $products->links() }}
    </div>
@endsection
