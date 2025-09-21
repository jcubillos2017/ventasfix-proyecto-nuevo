<aside class="sidebar bg-light border-end" style="min-width: 240px;">
  <nav class="nav flex-column p-3">
    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
    <a class="nav-link {{ request()->routeIs('cart.*') ? 'active' : '' }}" href="{{ route('cart.show') }}">Carro</a>
  </nav>
</aside>
