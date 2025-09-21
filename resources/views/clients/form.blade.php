@csrf
<div class="row">
  <div class="col-md-4">
    <x-form.input name="rut_empresa" label="RUT empresa" :value="$client->rut_empresa ?? ''" required />
  </div>
  <div class="col-md-8">
    <x-form.input name="razon_social" label="Razón social" :value="$client->razon_social ?? ''" required />
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <x-form.input name="rubro" label="Rubro" :value="$client->rubro ?? ''" required />
  </div>
  <div class="col-md-6">
    <x-form.input name="telefono" label="Teléfono" :value="$client->telefono ?? ''" required />
  </div>
</div>

<x-form.input name="direccion" label="Dirección" :value="$client->direccion ?? ''" required />

<div class="row">
  <div class="col-md-6">
    <x-form.input name="contacto_nombre" label="Nombre contacto" :value="$client->contacto_nombre ?? ''" required />
  </div>
  <div class="col-md-6">
    <x-form.input name="contacto_email" type="email" label="Email contacto" :value="$client->contacto_email ?? ''" required />
  </div>
</div>
