<header class="navbar navbar-expand navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('dashboard') }}">VentasFix</a>

    <ul class="navbar-nav ms-auto">
      {{-- ⬇️ AQUI va el enlace del carro --}}
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('cart.*') ? 'active' : '' }}" href="{{ route('cart.show') }}">
          Carro
        </a>
      </li>

      @auth
        <li class="nav-item"><span class="nav-link">{{ auth()->user()->name }}</span></li>
        <li class="nav-item">
          <form method="POST" action="{{ route('logout') }}">@csrf
            <button class="btn btn-sm btn-outline-light">Salir</button>
          </form>
        </li>
      @endauth
    </ul>
  </div>
</header>
