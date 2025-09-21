@extends('layouts.backoffice')
@section('title','Detalle Usuario')

@section('content')
  <div class="d-flex align-items-center mb-3">
    <h1 class="h4 mb-0">{{ $user->nombre }} {{ $user->apellido }}</h1>
    <a href="{{ route('users.edit',$user) }}" class="btn btn-primary btn-sm ms-auto">Editar</a>
    <a href="{{ route('users.index') }}" class="btn btn-outline-secondary btn-sm ms-2">Volver</a>
  </div>

  <div class="card">
    <div class="card-body">
      <dl class="row">
        <dt class="col-sm-3">RUT</dt><dd class="col-sm-9">{{ $user->rut }}</dd>
        <dt class="col-sm-3">Email</dt><dd class="col-sm-9">{{ $user->email }}</dd>
        <dt class="col-sm-3">Nombre</dt><dd class="col-sm-9">{{ $user->nombre }}</dd>
        <dt class="col-sm-3">Apellido</dt><dd class="col-sm-9">{{ $user->apellido }}</dd>
      </dl>
    </div>
  </div>
@endsection
