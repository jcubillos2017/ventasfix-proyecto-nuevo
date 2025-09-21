@props([
  'name',
  'label' => null,
  'type' => 'text',
  'value' => null,
  'id' => null,
  'min' => null,
  'max' => null,
  'step' => null,
  'placeholder' => null,
  // cualquier otra prop que quieras agregar
])

@php
  $id = $id ?: $name;
  $val = old($name, $value);
  $classes = 'form-control';
  if ($errors->has($name)) {
      $classes .= ' is-invalid';
  }
@endphp

<div class="mb-3">
  @if($label)
    <label for="{{ $id }}" class="form-label">{{ $label }}</label>
  @endif

  <input
    {{ $attributes->merge(['class' => $classes]) }}
    type="{{ $type }}"
    name="{{ $name }}"
    id="{{ $id }}"
    @if(!is_null($val)) value="{{ $val }}" @endif
    @if(!is_null($min)) min="{{ $min }}" @endif
    @if(!is_null($max)) max="{{ $max }}" @endif
    @if(!is_null($step)) step="{{ $step }}" @endif
    @if(!is_null($placeholder)) placeholder="{{ $placeholder }}" @endif
  >

  @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>
