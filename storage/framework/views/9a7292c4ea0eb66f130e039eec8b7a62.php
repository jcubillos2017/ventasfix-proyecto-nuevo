
<?php $__env->startSection('title', 'Editar Producto'); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex align-items-center mb-3">
        <h1 class="h4 mb-0">Editar Producto</h1>
        <a href="<?php echo e(route('products.index')); ?>" class="btn btn-outline-secondary btn-sm ms-auto">Volver</a>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('products.update', $product)); ?>">
                <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                <?php echo $__env->make('products.form', ['product' => $product], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <div class="mt-3 d-flex gap-2">
                    <button class="btn btn-primary">Actualizar</button>
                    <a href="<?php echo e(route('products.show', $product)); ?>" class="btn btn-outline-secondary">Ver</a>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body d-flex align-items-center">
            <img src="<?php echo e($product->imagen_url); ?>" alt="<?php echo e($product->nombre); ?>" class="img-thumbnail me-3"
                style="max-width:180px">
            <div class="text-muted">
                Vista previa de imagen
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backoffice', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ventasfix-proyecto-nuevo\resources\views/products/edit.blade.php ENDPATH**/ ?>