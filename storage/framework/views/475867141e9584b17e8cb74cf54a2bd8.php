
<?php $__env->startSection('title','Nuevo Cliente'); ?>

<?php $__env->startSection('content'); ?>
  <div class="d-flex align-items-center mb-3">
    <h1 class="h4 mb-0">Nuevo Cliente</h1>
    <a href="<?php echo e(route('clients.index')); ?>" class="btn btn-outline-secondary btn-sm ms-auto">Volver</a>
  </div>

  <div class="card">
    <div class="card-body">
      <form method="POST" action="<?php echo e(route('clients.store')); ?>">
        <?php echo $__env->make('clients.form', ['client' => $client], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <div class="mt-3">
          <button class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backoffice', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ventasfix-proyecto-nuevo\resources\views/clients/create.blade.php ENDPATH**/ ?>