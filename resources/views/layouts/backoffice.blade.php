<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','VentasFix')</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @stack('head')
</head>

<body class="layout-fixed sidebar-expand">
  @include('partials.header')
  <div class="wrapper d-flex">
    @include('partials.sidebar')
    <main class="content p-3 w-100">
      @include('partials.flash')
       @yield('content')
    </main>
  </div>
  @stack('scripts')
</body>
</html>
