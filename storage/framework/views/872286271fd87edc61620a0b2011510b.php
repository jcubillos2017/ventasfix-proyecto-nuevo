<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
  <div class="row">
    <?php if (isset($component)) { $__componentOriginala4ae059936bc185e758290466e2179c1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala4ae059936bc185e758290466e2179c1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.kpi-card','data' => ['title' => 'Usuarios','value' => $usersCount ?? 0]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('kpi-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Usuarios','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($usersCount ?? 0)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala4ae059936bc185e758290466e2179c1)): ?>
<?php $attributes = $__attributesOriginala4ae059936bc185e758290466e2179c1; ?>
<?php unset($__attributesOriginala4ae059936bc185e758290466e2179c1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala4ae059936bc185e758290466e2179c1)): ?>
<?php $component = $__componentOriginala4ae059936bc185e758290466e2179c1; ?>
<?php unset($__componentOriginala4ae059936bc185e758290466e2179c1); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginala4ae059936bc185e758290466e2179c1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala4ae059936bc185e758290466e2179c1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.kpi-card','data' => ['title' => 'Productos','value' => $productsCount ?? 0]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('kpi-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Productos','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($productsCount ?? 0)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala4ae059936bc185e758290466e2179c1)): ?>
<?php $attributes = $__attributesOriginala4ae059936bc185e758290466e2179c1; ?>
<?php unset($__attributesOriginala4ae059936bc185e758290466e2179c1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala4ae059936bc185e758290466e2179c1)): ?>
<?php $component = $__componentOriginala4ae059936bc185e758290466e2179c1; ?>
<?php unset($__componentOriginala4ae059936bc185e758290466e2179c1); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginala4ae059936bc185e758290466e2179c1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala4ae059936bc185e758290466e2179c1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.kpi-card','data' => ['title' => 'Clientes','value' => $clientsCount ?? 0]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('kpi-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Clientes','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($clientsCount ?? 0)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala4ae059936bc185e758290466e2179c1)): ?>
<?php $attributes = $__attributesOriginala4ae059936bc185e758290466e2179c1; ?>
<?php unset($__attributesOriginala4ae059936bc185e758290466e2179c1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala4ae059936bc185e758290466e2179c1)): ?>
<?php $component = $__componentOriginala4ae059936bc185e758290466e2179c1; ?>
<?php unset($__componentOriginala4ae059936bc185e758290466e2179c1); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginala4ae059936bc185e758290466e2179c1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala4ae059936bc185e758290466e2179c1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.kpi-card','data' => ['title' => 'Pedidos','value' => $ordersCount ?? 0]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('kpi-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Pedidos','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($ordersCount ?? 0)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala4ae059936bc185e758290466e2179c1)): ?>
<?php $attributes = $__attributesOriginala4ae059936bc185e758290466e2179c1; ?>
<?php unset($__attributesOriginala4ae059936bc185e758290466e2179c1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala4ae059936bc185e758290466e2179c1)): ?>
<?php $component = $__componentOriginala4ae059936bc185e758290466e2179c1; ?>
<?php unset($__componentOriginala4ae059936bc185e758290466e2179c1); ?>
<?php endif; ?>
  </div>

  <div class="card mt-4">
    <div class="card-header d-flex align-items-center">
      <strong>Alerta de Stock Bajo</strong>
      <span class="badge bg-danger ms-2"><?php echo e(($lowStock ?? collect())->count()); ?></span>
    </div>

    <div class="card-body p-0">
      <?php if (isset($component)) { $__componentOriginalc8463834ba515134d5c98b88e1a9dc03 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8463834ba515134d5c98b88e1a9dc03 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.data-table','data' => ['headers' => ['SKU','Producto','Stock','Umbral Bajo']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('data-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['headers' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['SKU','Producto','Stock','Umbral Bajo'])]); ?>
        <?php $__empty_1 = true; $__currentLoopData = ($lowStock ?? collect()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <tr>
            <td><?php echo e($p->sku); ?></td>
            <td><?php echo e($p->nombre); ?></td>
            <td><span class="badge bg-warning text-dark"><?php echo e($p->stock_actual); ?></span></td>
            <td><?php echo e($p->stock_bajo); ?></td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <tr>
            <td colspan="4" class="text-center p-3 text-muted">Sin alertas por ahora</td>
          </tr>
        <?php endif; ?>
       <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc8463834ba515134d5c98b88e1a9dc03)): ?>
<?php $attributes = $__attributesOriginalc8463834ba515134d5c98b88e1a9dc03; ?>
<?php unset($__attributesOriginalc8463834ba515134d5c98b88e1a9dc03); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc8463834ba515134d5c98b88e1a9dc03)): ?>
<?php $component = $__componentOriginalc8463834ba515134d5c98b88e1a9dc03; ?>
<?php unset($__componentOriginalc8463834ba515134d5c98b88e1a9dc03); ?>
<?php endif; ?>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backoffice', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ventasfix-proyecto-nuevo\resources\views/dashboard.blade.php ENDPATH**/ ?>