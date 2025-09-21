<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
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
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
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
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
  $id = $id ?: $name;
  $val = old($name, $value);
  $classes = 'form-control';
  if ($errors->has($name)) {
      $classes .= ' is-invalid';
  }
?>

<div class="mb-3">
  <?php if($label): ?>
    <label for="<?php echo e($id); ?>" class="form-label"><?php echo e($label); ?></label>
  <?php endif; ?>

  <input
    <?php echo e($attributes->merge(['class' => $classes])); ?>

    type="<?php echo e($type); ?>"
    name="<?php echo e($name); ?>"
    id="<?php echo e($id); ?>"
    <?php if(!is_null($val)): ?> value="<?php echo e($val); ?>" <?php endif; ?>
    <?php if(!is_null($min)): ?> min="<?php echo e($min); ?>" <?php endif; ?>
    <?php if(!is_null($max)): ?> max="<?php echo e($max); ?>" <?php endif; ?>
    <?php if(!is_null($step)): ?> step="<?php echo e($step); ?>" <?php endif; ?>
    <?php if(!is_null($placeholder)): ?> placeholder="<?php echo e($placeholder); ?>" <?php endif; ?>
  >

  <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <div class="invalid-feedback"><?php echo e($message); ?></div>
  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>
<?php /**PATH C:\laragon\www\ventasfix-proyecto-nuevo\resources\views/components/form/input.blade.php ENDPATH**/ ?>