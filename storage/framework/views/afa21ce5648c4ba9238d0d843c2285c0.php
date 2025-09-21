<aside class="sidebar bg-light border-end" style="min-width: 240px;">
  <nav class="nav flex-column p-3">
    <a class="nav-link <?php echo e(request()->routeIs('dashboard') ? 'active' : ''); ?>" href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
    <a class="nav-link <?php echo e(request()->routeIs('cart.*') ? 'active' : ''); ?>" href="<?php echo e(route('cart.show')); ?>">Carro</a>
  </nav>
</aside>
<?php /**PATH C:\laragon\www\ventasfix-proyecto-nuevo\resources\views/partials/sidebar.blade.php ENDPATH**/ ?>