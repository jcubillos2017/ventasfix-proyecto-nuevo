
<?php if(session('status')): ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <?php echo e(session('status')); ?>

    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
<?php endif; ?>

<?php if(session('error')): ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?php echo e(session('error')); ?>

    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
<?php endif; ?>

<?php if($errors->any()): ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Ups:</strong>
    <ul class="mb-0">
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($e); ?></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
<?php endif; ?>
<?php /**PATH C:\laragon\www\ventasfix-proyecto-nuevo\resources\views/partials/flash.blade.php ENDPATH**/ ?>