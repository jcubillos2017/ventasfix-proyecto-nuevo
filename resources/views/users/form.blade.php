@csrf
<div class="row">
  <div class="col-md-4">
    <x-form.input name="rut" label="RUT" :value="$user->rut ?? ''" required />
  </div>
  <div class="col-md-4">
    <x-form.input name="nombre" label="Nombre" :value="$user->nombre ?? ''" required />
  </div>
  <div class="col-md-4">
    <x-form.input name="apellido" label="Apellido" :value="$user->apellido ?? ''" required />
  </div>
</div>

<x-form.input name="email" type="email" label="Email (@ventasfix.cl)" :value="$user->email ?? ''" required />

<div class="row">
  <div class="col-md-6">
    <x-form.input name="password" type="password" label="Contraseña" />
    @isset($user->id)
      <small class="text-muted">Deja en blanco para mantener la actual.</small>
    @endisset
  </div>
  <div class="col-md-6">
    <x-form.input name="password_confirmation" type="password" label="Confirmar contraseña" />
  </div>
</div>
