@extends('layouts.backoffice')
@section('title','Clientes')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 mb-0">Clientes</h1>
    <a href="{{ route('clients.create') }}" class="btn btn-sm btn-primary">Nuevo cliente</a>
  </div>

  <form method="GET" class="row g-2 mb-3">
    <div class="col-auto">
      <input type="text" name="q" class="form-control" placeholder="Buscar por RUT o Razón Social" value="{{ request('q') }}">
    </div>
    <div class="col-auto">
      <button class="btn btn-outline-secondary">Buscar</button>
    </div>
  </form>

  <x-data-table :headers="['RUT','Razón social','Rubro','Contacto','Email','Teléfono','Acciones']" empty="No hay clientes">
    @forelse($clients as $c)
      <tr>
        <td>{{ $c->rut_empresa }}</td>
        <td>{{ $c->razon_social }}</td>
        <td>{{ $c->rubro }}</td>
        <td>{{ $c->contacto_nombre }}</td>
        <td>{{ $c->contacto_email }}</td>
        <td>{{ $c->telefono }}</td>
        <td class="text-nowrap">

         @can('view', $c)   @php $show = route('products.show', $c); @endphp @else @php $show = null; @endphp @endcan
         @can('update', $c) @php $edit = route('products.edit', $c); @endphp @else @php $edit = null; @endphp @endcan
         @can('delete', $c) @php $delete = route('products.destroy', $c); @endphp @else @php $delete = null; @endphp @endcan

                     

          @php
            // Si tiene pedidos, no mostramos “Eliminar”, o delega a policy.
            $allowDelete = method_exists($c,'orders') ? ! $c->orders()->exists() : true;
            $delete = $allowDelete ? route('clients.destroy', $c) : null;
          @endphp

          <x-table-actions :show="$show" :edit="$edit" :delete="$delete"
            confirm="¿Eliminar el cliente {{ $c->razon_social }}?" />

          @if(!$allowDelete)
            <span class="badge bg-warning text-dark ms-2">Con pedidos</span>
          @endif
        </td>
      </tr>
    @empty
      <tr>
        <td colspan="7" class="text-center text-muted p-3">No hay clientes</td>
      </tr>
    @endforelse
  </x-data-table>

  <div class="mt-3">
    {{ $clients->links() }}
  </div>
@endsection
