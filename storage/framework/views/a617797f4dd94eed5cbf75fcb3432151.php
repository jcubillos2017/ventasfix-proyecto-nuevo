
<?php $__env->startSection('title', 'Productos'); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4 mb-0">Productos</h1>
        <a href="<?php echo e(route('products.create')); ?>" class="btn btn-sm btn-primary">Nuevo producto</a>
    </div>

    <form method="GET" class="row g-2 mb-3">
        <div class="col-auto">
            <input type="text" name="q" class="form-control" placeholder="Buscar por SKU o Nombre"
                value="<?php echo e(request('q')); ?>">
        </div>
        <div class="col-auto">
            <button class="btn btn-outline-secondary">Buscar</button>
        </div>
    </form>

    <?php if (isset($component)) { $__componentOriginalc8463834ba515134d5c98b88e1a9dc03 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8463834ba515134d5c98b88e1a9dc03 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.data-table','data' => ['headers' => ['SKU', 'Nombre', 'Stock', 'Precio Neto', 'Precio Venta', 'Acciones'],'empty' => 'No hay productos']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('data-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['headers' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['SKU', 'Nombre', 'Stock', 'Precio Neto', 'Precio Venta', 'Acciones']),'empty' => 'No hay productos']); ?>
        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($p->sku); ?></td>
                <td><?php echo e($p->nombre); ?></td>
                <td><?php echo e($p->stock_actual); ?></td>
                <td>$<?php echo e(number_format($p->precio_neto, 0, ',', '.')); ?></td>
                <td>$<?php echo e(number_format($p->precio_venta, 0, ',', '.')); ?></td>
                <td class="text-nowrap">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $p)): ?>
                        <?php $show = route('products.show', $p); ?>
                    <?php else: ?>
                        <?php $show = null; ?>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $p)): ?>
                        <?php $edit = route('products.edit', $p); ?>
                    <?php else: ?>
                        <?php $edit = null; ?>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $p)): ?>
                        <?php $delete = route('products.destroy', $p); ?>
                    <?php else: ?>
                        <?php $delete = null; ?>
                    <?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal35f57f4e82a16e7ad7641b9fb6c7f399 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal35f57f4e82a16e7ad7641b9fb6c7f399 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table-actions','data' => ['show' => $show,'edit' => $edit,'delete' => $delete,'confirm' => '¿Eliminar el producto '.e($p->sku).' - '.e($p->nombre).'?']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('table-actions'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['show' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($show),'edit' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($edit),'delete' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($delete),'confirm' => '¿Eliminar el producto '.e($p->sku).' - '.e($p->nombre).'?']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal35f57f4e82a16e7ad7641b9fb6c7f399)): ?>
<?php $attributes = $__attributesOriginal35f57f4e82a16e7ad7641b9fb6c7f399; ?>
<?php unset($__attributesOriginal35f57f4e82a16e7ad7641b9fb6c7f399); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal35f57f4e82a16e7ad7641b9fb6c7f399)): ?>
<?php $component = $__componentOriginal35f57f4e82a16e7ad7641b9fb6c7f399; ?>
<?php unset($__componentOriginal35f57f4e82a16e7ad7641b9fb6c7f399); ?>
<?php endif; ?>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="6" class="text-center text-muted p-3">No hay productos</td>
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

    <div class="mt-3">
        <?php echo e($products->links()); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backoffice', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ventasfix-proyecto-nuevo\resources\views/products/index.blade.php ENDPATH**/ ?>