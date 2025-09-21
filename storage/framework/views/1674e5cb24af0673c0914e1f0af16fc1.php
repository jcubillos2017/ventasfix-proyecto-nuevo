<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
  'title' => null,
  'value' => null,
  'icon'  => null,
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
  'title' => null,
  'value' => null,
  'icon'  => null,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="col-12 col-sm-6 col-lg-3">
  <div class="card shadow-sm mb-3">
    <div class="card-body d-flex align-items-center">
      <?php if($icon): ?><i class="<?php echo e($icon); ?> me-3 fs-3"></i><?php endif; ?>
      <div>
        <div class="text-muted small"><?php echo e($title ?? '—'); ?></div>
        <div class="h4 mb-0"><?php echo e($value ?? '0'); ?></div>
      </div>
    </div>
  </div>
</div>
<?php /**PATH C:\laragon\www\ventasfix-proyecto-nuevo\resources\views/components/kpi-card.blade.php ENDPATH**/ ?>