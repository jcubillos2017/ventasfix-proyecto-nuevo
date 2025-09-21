<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $__env->yieldContent('title','VentasFix'); ?></title>
  <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css','resources/js/app.js']); ?>
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <?php echo $__env->yieldPushContent('head'); ?>
</head>

<body class="layout-fixed sidebar-expand">
  <?php echo $__env->make('partials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
  <div class="wrapper d-flex">
    <?php echo $__env->make('partials.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <main class="content p-3 w-100">
      <?php echo $__env->make('partials.flash', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
       <?php echo $__env->yieldContent('content'); ?>
    </main>
  </div>
  <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\laragon\www\ventasfix-proyecto-nuevo\resources\views/layouts/backoffice.blade.php ENDPATH**/ ?>