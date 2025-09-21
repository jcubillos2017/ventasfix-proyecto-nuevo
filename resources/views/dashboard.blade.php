@extends('layouts.backoffice')
@section('title', 'Dashboard')

@section('content')
  <div class="row">
    <x-kpi-card title="Usuarios"  :value="$usersCount ?? 0" />
    <x-kpi-card title="Productos" :value="$productsCount ?? 0" />
    <x-kpi-card title="Clientes"  :value="$clientsCount ?? 0" />
    <x-kpi-card title="Pedidos"   :value="$ordersCount ?? 0" />
  </div>

  <div class="card mt-4">
    <div class="card-header d-flex align-items-center">
      <strong>Alerta de Stock Bajo</strong>
      <span class="badge bg-danger ms-2">{{ ($lowStock ?? collect())->count() }}</span>
    </div>

    <div class="card-body p-0">
      <x-data-table :headers="['SKU','Producto','Stock','Umbral Bajo']">
        @forelse (($lowStock ?? collect()) as $p)
          <tr>
            <td>{{ $p->sku }}</td>
            <td>{{ $p->nombre }}</td>
            <td><span class="badge bg-warning text-dark">{{ $p->stock_actual }}</span></td>
            <td>{{ $p->stock_bajo }}</td>
          </tr>
        @empty
          <tr>
            <td colspan="4" class="text-center p-3 text-muted">Sin alertas por ahora</td>
          </tr>
        @endforelse
      </x-data-table>
    </div>
  </div>
@endsection
