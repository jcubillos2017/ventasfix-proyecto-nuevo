@extends('layouts.backoffice')
@section('title','Editar Cliente')

@section('content')
  <div class="d-flex align-items-center mb-3">
    <h1 class="h4 mb-0">Editar Cliente</h1>
    <a href="{{ route('clients.index') }}" class="btn btn-outline-secondary btn-sm ms-auto">Volver</a>
  </div>

  <div class="card">
    <div class="card-body">
      <form method="POST" action="{{ route('clients.update',$client) }}">
        @csrf @method('PUT')
        @include('clients.form', ['client' => $client])
        <div class="mt-3 d-flex gap-2">
          <button class="btn btn-primary">Actualizar</button>
          <a href="{{ route('clients.show',$client) }}" class="btn btn-outline-secondary">Ver</a>
        </div>
      </form>
    </div>
  </div>
@endsection
