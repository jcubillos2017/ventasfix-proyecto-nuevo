@extends('layouts.backoffice')
@section('title','Nuevo Cliente')

@section('content')
  <div class="d-flex align-items-center mb-3">
    <h1 class="h4 mb-0">Nuevo Cliente</h1>
    <a href="{{ route('clients.index') }}" class="btn btn-outline-secondary btn-sm ms-auto">Volver</a>
  </div>

  <div class="card">
    <div class="card-body">
      <form method="POST" action="{{ route('clients.store') }}">
        @include('clients.form', ['client' => $client])
        <div class="mt-3">
          <button class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
@endsection
