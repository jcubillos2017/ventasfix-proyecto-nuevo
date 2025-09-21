<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
  'show' => null,     // URL o route() para ver
  'edit' => null,     // URL o route() para editar
  'delete' => null,   // URL o route() para eliminar (action del form)
  'method' => 'DELETE',
  'confirm' => '¿Seguro que deseas eliminar este registro?',
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
  'show' => null,     // URL o route() para ver
  'edit' => null,     // URL o route() para editar
  'delete' => null,   // URL o route() para eliminar (action del form)
  'method' => 'DELETE',
  'confirm' => '¿Seguro que deseas eliminar este registro?',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="btn-group" role="group">
  <?php if($show): ?>
    <a href="<?php echo e($show); ?>" class="btn btn-sm btn-outline-secondary">Ver</a>
  <?php endif; ?>

  <?php if($edit): ?>
    <a href="<?php echo e($edit); ?>" class="btn btn-sm btn-outline-primary">Editar</a>
  <?php endif; ?>

  <?php if($delete): ?>
    <form action="<?php echo e($delete); ?>" method="POST" class="d-inline"
          onsubmit="return confirm(<?php echo \Illuminate\Support\Js::from($confirm)->toHtml() ?>);">
      <?php echo csrf_field(); ?>
      <?php echo method_field($method); ?>
      <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
    </form>
  <?php endif; ?>
</div>
<?php /**PATH C:\laragon\www\ventasfix-proyecto-nuevo\resources\views/components/table-actions.blade.php ENDPATH**/ ?>