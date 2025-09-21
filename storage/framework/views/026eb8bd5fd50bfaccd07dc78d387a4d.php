
<?php $__env->startSection('title','Clientes'); ?>

<?php $__env->startSection('content'); ?>
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 mb-0">Clientes</h1>
    <a href="<?php echo e(route('clients.create')); ?>" class="btn btn-sm btn-primary">Nuevo cliente</a>
  </div>

  <form method="GET" class="row g-2 mb-3">
    <div class="col-auto">
      <input type="text" name="q" class="form-control" placeholder="Buscar por RUT o Razón Social" value="<?php echo e(request('q')); ?>">
    </div>
    <div class="col-auto">
      <button class="btn btn-outline-secondary">Buscar</button>
    </div>
  </form>

  <?php if (isset($component)) { $__componentOriginalc8463834ba515134d5c98b88e1a9dc03 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8463834ba515134d5c98b88e1a9dc03 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.data-table','data' => ['headers' => ['RUT','Razón social','Rubro','Contacto','Email','Teléfono','Acciones'],'empty' => 'No hay clientes']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('data-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['headers' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['RUT','Razón social','Rubro','Contacto','Email','Teléfono','Acciones']),'empty' => 'No hay clientes']); ?>
    <?php $__empty_1 = true; $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <tr>
        <td><?php echo e($c->rut_empresa); ?></td>
        <td><?php echo e($c->razon_social); ?></td>
        <td><?php echo e($c->rubro); ?></td>
        <td><?php echo e($c->contacto_nombre); ?></td>
        <td><?php echo e($c->contacto_email); ?></td>
        <td><?php echo e($c->telefono); ?></td>
        <td class="text-nowrap">

         <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $c)): ?>   <?php $show = route('products.show', $c); ?> <?php else: ?> <?php $show = null; ?> <?php endif; ?>
         <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $c)): ?> <?php $edit = route('products.edit', $c); ?> <?php else: ?> <?php $edit = null; ?> <?php endif; ?>
         <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $c)): ?> <?php $delete = route('products.destroy', $c); ?> <?php else: ?> <?php $delete = null; ?> <?php endif; ?>

                     

          <?php
            // Si tiene pedidos, no mostramos “Eliminar”, o delega a policy.
            $allowDelete = method_exists($c,'orders') ? ! $c->orders()->exists() : true;
            $delete = $allowDelete ? route('clients.destroy', $c) : null;
          ?>

          <?php if (isset($component)) { $__componentOriginal35f57f4e82a16e7ad7641b9fb6c7f399 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal35f57f4e82a16e7ad7641b9fb6c7f399 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table-actions','data' => ['show' => $show,'edit' => $edit,'delete' => $delete,'confirm' => '¿Eliminar el cliente '.e($c->razon_social).'?']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('table-actions'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['show' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($show),'edit' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($edit),'delete' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($delete),'confirm' => '¿Eliminar el cliente '.e($c->razon_social).'?']); ?>
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

          <?php if(!$allowDelete): ?>
            <span class="badge bg-warning text-dark ms-2">Con pedidos</span>
          <?php endif; ?>
        </td>
      </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <tr>
        <td colspan="7" class="text-center text-muted p-3">No hay clientes</td>
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
    <?php echo e($clients->links()); ?>

  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backoffice', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ventasfix-proyecto-nuevo\resources\views/clients/index.blade.php ENDPATH**/ ?>