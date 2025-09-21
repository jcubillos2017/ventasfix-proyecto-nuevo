
<?php $__env->startSection('title', 'Detalle Producto'); ?>


<?php $__env->startSection('content'); ?>
    <div class="d-flex align-items-center mb-3">
        <h1 class="h4 mb-0"><?php echo e($product->sku); ?> — <?php echo e($product->nombre); ?></h1>

        <a href="<?php echo e(route('products.edit', $product)); ?>" class="btn btn-primary btn-sm ms-auto">Editar</a>
        <a href="<?php echo e(route('products.index')); ?>" class="btn btn-outline-secondary btn-sm ms-2">Volver</a>


    </div>

    <div class="row g-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <p class="text-muted"><?php echo e($product->desc_corta); ?></p>
                    <p><?php echo e($product->desc_larga); ?></p>
                    <div class="mt-3">
                        <strong>Precio neto:</strong> $<?php echo e(number_format($product->precio_neto / 100, 0, ',', '.')); ?><br>
                        <strong>Precio venta:</strong> $<?php echo e(number_format($product->precio_venta / 100, 0, ',', '.')); ?>

                    </div>
                    <div class="mt-3">
                        <form method="POST" action="<?php echo e(route('cart.add')); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                            <input type="hidden" name="cantidad" value="1">
                            <button class="btn btn-success">Añadir al carro</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <img src="<?php echo e($product->imagen_url); ?>" alt="<?php echo e($product->nombre); ?>" class="img-fluid rounded">
            <div class="mt-3">
                <span class="badge bg-secondary">Stock: <?php echo e($product->stock_actual); ?></span>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backoffice', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ventasfix-proyecto-nuevo\resources\views/products/show.blade.php ENDPATH**/ ?>