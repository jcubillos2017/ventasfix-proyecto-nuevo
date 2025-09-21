@extends('layouts.backoffice')
@section('title','Nuevo Usuario')

@section('content')
  <div class="d-flex align-items-center mb-3">
    <h1 class="h4 mb-0">Nuevo Usuario</h1>
    <a href="{{ route('users.index') }}" class="btn btn-outline-secondary btn-sm ms-auto">Volver</a>
  </div>

  <div class="card">
    <div class="card-body">
      <form method="POST" action="{{ route('users.store') }}">
        @include('users.form', ['user' => $user])
        <div class="mt-3">
          <button class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
@endsection
