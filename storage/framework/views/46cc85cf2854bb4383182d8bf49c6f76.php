<header class="navbar navbar-expand navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo e(route('dashboard')); ?>">VentasFix</a>

    <ul class="navbar-nav ms-auto">
      
      <li class="nav-item">
        <a class="nav-link <?php echo e(request()->routeIs('cart.*') ? 'active' : ''); ?>" href="<?php echo e(route('cart.show')); ?>">
          Carro
        </a>
      </li>

      <?php if(auth()->guard()->check()): ?>
        <li class="nav-item"><span class="nav-link"><?php echo e(auth()->user()->name); ?></span></li>
        <li class="nav-item">
          <form method="POST" action="<?php echo e(route('logout')); ?>"><?php echo csrf_field(); ?>
            <button class="btn btn-sm btn-outline-light">Salir</button>
          </form>
        </li>
      <?php endif; ?>
    </ul>
  </div>
</header>
<?php /**PATH C:\laragon\www\ventasfix-proyecto-nuevo\resources\views/partials/header.blade.php ENDPATH**/ ?>