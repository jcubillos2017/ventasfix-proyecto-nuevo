
<?php $__env->startSection('title', 'Usuarios'); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4 mb-0">Usuarios</h1>
        <a href="<?php echo e(route('users.create')); ?>" class="btn btn-sm btn-primary">Nuevo usuario</a>
    </div>

    <?php if (isset($component)) { $__componentOriginalc8463834ba515134d5c98b88e1a9dc03 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8463834ba515134d5c98b88e1a9dc03 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.data-table','data' => ['headers' => ['RUT', 'Nombre', 'Apellido', 'Email', 'Acciones'],'empty' => 'No hay usuarios']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('data-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['headers' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['RUT', 'Nombre', 'Apellido', 'Email', 'Acciones']),'empty' => 'No hay usuarios']); ?>
        <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($u->rut); ?></td>
                <td><?php echo e($u->nombre); ?></td>
                <td><?php echo e($u->apellido); ?></td>
                <td><?php echo e($u->email); ?></td>
                <td class="text-nowrap">

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $u)): ?>
                        <?php $show = route('products.show', $u); ?>
                    <?php else: ?>
                        <?php $show = null; ?>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $u)): ?>
                        <?php $edit = route('products.edit', $u); ?>
                    <?php else: ?>
                        <?php $edit = null; ?>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $u)): ?>
                        <?php $delete = route('products.destroy', $u); ?>
                    <?php else: ?>
                        <?php $delete = null; ?>
                    <?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginal35f57f4e82a16e7ad7641b9fb6c7f399 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal35f57f4e82a16e7ad7641b9fb6c7f399 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table-actions','data' => ['show' => $show,'edit' => $edit,'delete' => $delete,'confirm' => '¿Eliminar '.e($u->sku).' - '.e($u->nombre).'?']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('table-actions'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['show' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($show),'edit' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($edit),'delete' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($delete),'confirm' => '¿Eliminar '.e($u->sku).' - '.e($u->nombre).'?']); ?>
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
                <td colspan="5" class="text-center text-muted p-3">No hay usuarios</td>
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
        <?php echo e($users->links()); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backoffice', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ventasfix-proyecto-nuevo\resources\views/users/index.blade.php ENDPATH**/ ?>