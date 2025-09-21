@extends('layouts.backoffice')
@section('title', 'Usuarios')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4 mb-0">Usuarios</h1>
        <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">Nuevo usuario</a>
    </div>

    <x-data-table :headers="['RUT', 'Nombre', 'Apellido', 'Email', 'Acciones']" empty="No hay usuarios">
        @forelse($users as $u)
            <tr>
                <td>{{ $u->rut }}</td>
                <td>{{ $u->nombre }}</td>
                <td>{{ $u->apellido }}</td>
                <td>{{ $u->email }}</td>
                <td class="text-nowrap">

                    @can('view', $u)
                        @php $show = route('products.show', $u); @endphp
                    @else
                        @php $show = null; @endphp
                    @endcan
                    @can('update', $u)
                        @php $edit = route('products.edit', $u); @endphp
                    @else
                        @php $edit = null; @endphp
                    @endcan
                    @can('delete', $u)
                        @php $delete = route('products.destroy', $u); @endphp
                    @else
                        @php $delete = null; @endphp
                    @endcan

                    <x-table-actions :show="$show" :edit="$edit" :delete="$delete"
                        confirm="¿Eliminar {{ $u->sku }} - {{ $u->nombre }}?" />


                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center text-muted p-3">No hay usuarios</td>
            </tr>
        @endforelse
    </x-data-table>

    <div class="mt-3">
        {{ $users->links() }}
    </div>
@endsection
