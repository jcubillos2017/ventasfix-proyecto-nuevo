@csrf
<div class="row">
    <div class="col-md-4">
        <x-form.input name="sku" label="SKU" :value="$product->sku ?? ''" required />
    </div>


    <div class="col-md-8">
        <x-form.input name="nombre" label="Nombre" :value="$product->nombre ?? ''" required />
    </div>
</div>

<div class="mb-3">
    <label class="form-label" for="desc_corta">Descripción corta</label>
    <input id="desc_corta" name="desc_corta" class="form-control @error('desc_corta') is-invalid @enderror"
        value="{{ old('desc_corta', $product->desc_corta ?? '') }}" required>
    @error('desc_corta')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror

</div>

<div class="mb-3">
    <label class="form-label" for="desc_larga">Descripción larga</label>
    <textarea id="desc_larga" name="desc_larga" rows="4"
        class="form-control @error('desc_larga') is-invalid @enderror" required>{{ old('desc_larga', $product->desc_larga ?? '') }}</textarea>
    @error('desc_larga')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<x-form.input name="imagen_url" label="URL Imagen" :value="$product->imagen_url ?? ''" required />

<div class="row">
    <div class="col-md-3">
        <x-form.input name="precio_neto" type="number" label="Precio Neto (centavos)" :value="$product->precio_neto ?? ''" min="0"
            required />
    </div>
    <div class="col-md-3">
        <x-form.input name="stock_actual" type="number" label="Stock actual" :value="$product->stock_actual ?? ''" min="0"
            required />
    </div>
    <div class="col-md-2">
        <x-form.input name="stock_minimo" type="number" label="Stock mínimo" :value="$product->stock_minimo ?? ''" min="0"
            required />
    </div>
    <div class="col-md-2">
        <x-form.input name="stock_bajo" type="number" label="Stock bajo" :value="$product->stock_bajo ?? ''" min="0" required />
    </div>
    <div class="col-md-2">
        <x-form.input name="stock_alto" type="number" label="Stock alto" :value="$product->stock_alto ?? ''" min="0" required />
    </div>
</div>
