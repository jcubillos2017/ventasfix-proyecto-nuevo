
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
  'headers' => [],           // ['Col A','Col B', ...] o [['text'=>'Col A','class'=>'w-25'], ...]
  'empty'   => null,         // Texto para estado vacío (opcional)
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
  'headers' => [],           // ['Col A','Col B', ...] o [['text'=>'Col A','class'=>'w-25'], ...]
  'empty'   => null,         // Texto para estado vacío (opcional)
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="table-responsive">
  <table <?php echo e($attributes->merge(['class' => 'table table-striped table-hover align-middle mb-0'])); ?>>
    <thead class="table-light">
      <tr>
        <?php $__currentLoopData = $headers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $h): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php
            $label = is_array($h) ? ($h['text'] ?? '') : $h;
            $thCls = is_array($h) ? ($h['class'] ?? '') : '';
          ?>
          <th scope="col" class="<?php echo e($thCls); ?>"><?php echo e($label); ?></th>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tr>
    </thead>

    <tbody>
      <?php if(trim($slot) === '' && $empty): ?>
        <tr>
          <td colspan="<?php echo e(max(1, count($headers))); ?>" class="text-center text-muted p-3">
            <?php echo e($empty); ?>

          </td>
        </tr>
      <?php else: ?>
        <?php echo e($slot); ?>

      <?php endif; ?>
    </tbody>
  </table>
</div>
<?php /**PATH C:\laragon\www\ventasfix-proyecto-nuevo\resources\views/components/data-table.blade.php ENDPATH**/ ?>