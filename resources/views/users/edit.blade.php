@extends('layouts.backoffice')
@section('title','Editar Usuario')

@section('content')
  <div class="d-flex align-items-center mb-3">
    <h1 class="h4 mb-0">Editar Usuario</h1>
    <a href="{{ route('users.index') }}" class="btn btn-outline-secondary btn-sm ms-auto">Volver</a>
  </div>

  @if ($errors->any())
    <div class="alert alert-danger">{{ $errors->first() }}</div>
  @endif
  @if (session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
  @endif

  <div class="card">
    <div class="card-body">
      <form method="POST" action="{{ route('users.update',$user) }}">
        @csrf @method('PUT')
        @include('users.form', ['user' => $user])
        <div class="mt-3 d-flex gap-2">
          <button class="btn btn-primary">Actualizar</button>
          <a href="{{ route('users.show',$user) }}" class="btn btn-outline-secondary">Ver</a>
        </div>
      </form>
    </div>
  </div>
@endsection
