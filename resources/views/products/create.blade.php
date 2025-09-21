@extends('layouts.backoffice')
@section('title','Nuevo producto')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 mb-0">Nuevo producto</h1>
    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Volver</a>
  </div>

  <form method="POST" action="{{ route('products.store') }}" novalidate>
    @csrf

    <div class="row g-3">
      <div class="col-md-4">
        <label class="form-label">SKU</label>
        <input type="text" name="sku" class="form-control @error('sku') is-invalid @enderror"
               value="{{ old('sku') }}" required maxlength="64">
        @error('sku') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="col-md-8">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
               value="{{ old('nombre') }}" required maxlength="150">
        @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="col-12">
        <label class="form-label">Descripción corta</label>
        <input type="text" name="desc_corta" class="form-control @error('desc_corta') is-invalid @enderror"
               value="{{ old('desc_corta') }}" required maxlength="255">
        @error('desc_corta') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="col-12">
        <label class="form-label">Descripción larga</label>
        <textarea name="desc_larga" rows="4"
                  class="form-control @error('desc_larga') is-invalid @enderror"
                  required>{{ old('desc_larga') }}</textarea>
        @error('desc_larga') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="col-12">
        <label class="form-label">URL de imagen</label>
        <input type="url" name="imagen_url" class="form-control @error('imagen_url') is-invalid @enderror"
               placeholder="https://..." value="{{ old('imagen_url') }}" required>
        @error('imagen_url') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="col-md-4">
        <label class="form-label">Precio neto (CLP)</label>
        <input type="number" name="precio_neto" class="form-control @error('precio_neto') is-invalid @enderror"
               value="{{ old('precio_neto') }}" min="0" step="1" required>
        @error('precio_neto') <div class="invalid-feedback">{{ $message }}</div> @enderror
        <div class="form-text">El precio de venta (con IVA) se calculará automáticamente.</div>
      </div>

      <div class="col-md-2">
        <label class="form-label">Stock actual</label>
        <input type="number" name="stock_actual" class="form-control @error('stock_actual') is-invalid @enderror"
               value="{{ old('stock_actual') }}" min="0" step="1" required>
        @error('stock_actual') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="col-md-2">
        <label class="form-label">Stock mínimo</label>
        <input type="number" name="stock_minimo" class="form-control @error('stock_minimo') is-invalid @enderror"
               value="{{ old('stock_minimo') }}" min="0" step="1" required>
        @error('stock_minimo') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="col-md-2">
        <label class="form-label">Stock bajo</label>
        <input type="number" name="stock_bajo" class="form-control @error('stock_bajo') is-invalid @enderror"
               value="{{ old('stock_bajo') }}" min="0" step="1" required>
        @error('stock_bajo') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="col-md-2">
        <label class="form-label">Stock alto</label>
        <input type="number" name="stock_alto" class="form-control @error('stock_alto') is-invalid @enderror"
               value="{{ old('stock_alto') }}" min="0" step="1" required>
        @error('stock_alto') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>
    </div>

    <div class="mt-4 d-flex gap-2">
      <button type="submit" class="btn btn-primary">Guardar</button>
      <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    </div>
  </form>
@endsection
