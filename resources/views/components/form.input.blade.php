@props(['name','label'=>null,'type'=>'text','value'=>null])
<div class="mb-3">
  @if($label)<label class="form-label" for="{{ $name }}">{{ $label }}</label>@endif
  <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}"
         value="{{ old($name, $value) }}"
         {{ $attributes->merge(['class'=>'form-control'.($errors->has($name)?' is-invalid':'')]) }}>
  @error($name)<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
