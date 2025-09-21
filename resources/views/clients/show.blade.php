@extends('layouts.backoffice')
@section('title','Detalle Cliente')

@section('content')
  <div class="d-flex align-items-center mb-3">
    <h1 class="h4 mb-0">{{ $client->razon_social }}</h1>
    <a href="{{ route('clients.edit',$client) }}" class="btn btn-primary btn-sm ms-auto">Editar</a>
    <a href="{{ route('clients.index') }}" class="btn btn-outline-secondary btn-sm ms-2">Volver</a>
  </div>

  <div class="card">
    <div class="card-body">
      <dl class="row">
        <dt class="col-sm-3">RUT</dt><dd class="col-sm-9">{{ $client->rut_empresa }}</dd>
        <dt class="col-sm-3">Rubro</dt><dd class="col-sm-9">{{ $client->rubro }}</dd>
        <dt class="col-sm-3">Razón social</dt><dd class="col-sm-9">{{ $client->razon_social }}</dd>
        <dt class="col-sm-3">Teléfono</dt><dd class="col-sm-9">{{ $client->telefono }}</dd>
        <dt class="col-sm-3">Dirección</dt><dd class="col-sm-9">{{ $client->direccion }}</dd>
        <dt class="col-sm-3">Contacto</dt><dd class="col-sm-9">{{ $client->contacto_nombre }} — {{ $client->contacto_email }}</dd>
      </dl>
    </div>
  </div>
@endsection
